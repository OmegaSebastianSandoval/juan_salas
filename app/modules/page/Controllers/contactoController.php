<?php

/**
 *
 */

class Page_contactoController extends Page_mainController
{

	public $botonactivo  = 9;
	protected $_csrf_section = "omega_contacto";

	public function init()
	{
  
  
	  // Inicia la sesión si no está ya iniciada
	  if (session_status() == PHP_SESSION_NONE) {
		session_start();
	  }
  
	  // Genera un token CSRF
	  if (empty($_SESSION['csrf_token'])) {
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	  }
	  parent::init();
	}

	public function indexAction()
	{
		$this->_csrf_section = "omega_index" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];

		
		$this->_view->banner = $this->template->banner(9);
		$this->_view->contenido = $this->template->getContentseccion(9);
		$publicidadModel = new Page_Model_DbTable_Publicidad();
		$this->_view->imagenContacto = $publicidadModel->getList("publicidad_seccion = '10' AND publicidad_estado ='1'")[0];
	}

	public function envarmensajeAction()
	{
  
	  //error_reporting(E_ALL);
  
	  // Inicia la sesión si no está ya iniciada
	  if (session_status() == PHP_SESSION_NONE) {
		session_start();
	  }
  
  
  
  
  
  
	  // Recibir los datos enviados en formato JSON
	  $input = file_get_contents('php://input');
	  $data = json_decode($input, true);
  
	  // Verificar si la decodificación fue exitosa y si se recibieron los datos esperados
	  $nombre = $this->sanitizarEntrada($data['name']);
	  $correo = $this->sanitizarEntrada($data['email']);
  
	  $city = $this->sanitizarEntrada($data['city']);
	  $enterprise = $this->sanitizarEntrada($data['enterprise']);
	  $phone = $this->sanitizarEntrada($data['phone']);
  
  
  
	  $message = $this->sanitizarEntrada($data['message']);
	  $subjet = $this->sanitizarEntrada($data['subjet']);
	  // $telefono = $this->sanitizarEntrada($data['telefono']);
	 
  
  
  
	  $g_recaptcha_response = $this->sanitizarEntrada($data['g-recaptcha-response']);
	  $hash = $this->sanitizarEntrada($data['hash']);
	  $csrf = $this->sanitizarEntrada($data['csrf']);
	  $csrf_section = $this->sanitizarEntrada($data['csrf_section']);
	  $csrf_token = $this->sanitizarEntrada($data['csrf_token']);
	  $hash2 = md5(date("Y-m-d"));
  
	  $data2["nombre"] = $nombre;
	  $data2["correo"] = $correo;
	  $data2["city"] = $city;
	  $data2["enterprise"] = $enterprise;
	  $data2["phone"] = $phone;
	  $data2["message"] = $message;
   
  
  
  
  
	  if (Session::getInstance()->get('csrf')[$csrf_section] != $csrf) {
		$res['error'] = "Token CSRF inválido";
		$res['status'] = "error";
		die(json_encode($res));
	  }
  
	  if (!isset($csrf_token) ||  $csrf_token !== $_SESSION['csrf_token']) {
		$res['error'] = "Token CSRF inválido";
		$res['status'] = "error";
		die(json_encode($res));
	  }
  
  
	  if (!$this->verifyCaptcha($g_recaptcha_response)) {
		$res['error'] = "Token CSRF inválido";
		$res['status'] = "error";
		die(json_encode($res));
	  }
  
	  if ($hash2 !== $hash) {
		$res['error'] = "Token CSRF inválido";
		$res['status'] = "error";
		die(json_encode($res));
	  }
  
  
	  if ($subjet == "") {
		if ($nombre != "" and $correo != "" and $city != ""  and $message != "" ) {
		  if (
			strpos($message, "@") === false &&
			strpos($nombre, "@") === false &&
			strpos($correo, "mail4u.life") === false &&
			strpos($correo, "zetetic.sbs") === false &&
			strpos($correo, "zetetic.sbs") === false &&
			strpos($message, "<a") === false &&
			strpos($message, "'") === false &&
			strpos($message, "/") === false &&
			strpos($message, "//") === false &&
			strpos($message, "http") === false &&
			strpos($message, "@") === false &&
			strpos($message, ".co") === false &&
  
			strpos($message, "!") === false &&
			strpos($message, "Hi ") === false &&
  
  
  
			strpos($message, "\'") === false &&
			strpos($message, "`") === false &&
			strpos($message, "\\") === false
  
		  ) {
			// No hay ning煤n enlace, script, ' o / o \ en $mensaje
			$mail = new Core_Model_Sendingemail($this->_view);
			$mail_response = $mail->sendMailFormulario($data2);
		  } else {
			$res['error'] = "Error de validación";
		  }
		} else {
		  $res['error'] = "Error campos";
		}
	  } else {
		$res['error'] = "Error honey";
	  }
  
  
	  if ($mail_response == 1) {
		$res['status'] = "success";
	  } else {
		$res['status'] = "error";
	  }
  
	  die(json_encode($res));
	}
  
	public function sanitizarEntrada($value)
	{
  
	  $currentValue = trim($value);
	  $currentValue = stripslashes($currentValue);
	  $currentValue = htmlspecialchars($currentValue, ENT_QUOTES, 'UTF-8');
	  $currentValue = strip_tags($currentValue);
	  $currentValue = preg_replace('/[\x00-\x1F\x7F]/u', '', $currentValue);
	  return $currentValue;
	}
  
	private function verifyCaptcha($response)
	{
	  $secretKey = '6LfFDZskAAAAAOvo1878Gv4vLz3CjacWqy08WqYP';
	  $url = 'https://www.google.com/recaptcha/api/siteverify';
	  $data = array(
		'secret' => $secretKey,
		'response' => $response
	  );
  
	  $options = array(
		'http' => array(
		  'header' => "Content-type: application/x-www-form-urlencoded\r\n",
		  'method' => 'POST',
		  'content' => http_build_query($data)
		)
	  );
  
	  $context = stream_context_create($options);
	  $result = file_get_contents($url, false, $context);
	  $response = json_decode($result);
  
	  return $response->success;
	}
}
