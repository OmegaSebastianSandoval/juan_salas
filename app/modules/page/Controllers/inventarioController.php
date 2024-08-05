<?php

/**
 *
 */

class Page_inventarioController extends Page_mainController
{

	public $botonactivo  = 2;

	protected $_csrf_section = "omega_inventario";

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
		$this->_view->banner = $this->template->banner(2);
		$this->_view->contenido = $this->template->getContentseccion(2); //
		$contenidoModel =  new Page_Model_DbTable_Contenido();
		$contenidoInventario = $contenidoModel->getList("contenido_seccion ='2' AND contenido_estado = '1'", "")[0];
		$this->_view->contenidoInventario = $contenidoInventario;


		// print_r($contenidoInventario);
		// $this->_view->contenido2 = $this->template->getContentseccion(10);

		$this->_view->tipos = $this->getTipo();
		$this->_view->departamentos = $this->getDepartamento();
		$this->_view->ciudades = $this->getCiudad();
		$this->_view->sectores = $this->getSector();
		$this->_view->localidades = $this->getLocalidad();
	}
	public function filtrarAction()
	{

		$this->_view->departamento = $departamento = $this->_getSanitizedParam("departamento");
		$this->_view->ciudad = $ciudad = $this->_getSanitizedParam("ciudad");
		$this->_view->sector = $sector = $this->_getSanitizedParam("sector");
		$this->_view->localidad = 	$localidad = $this->_getSanitizedParam("localidad");
		$this->_view->tipo = 	$tipo = $this->_getSanitizedParam("tipo");
		$this->_view->area = $area = $this->_getSanitizedParam("area");
		$this->_view->compra = $compra = $this->_getSanitizedParam("compra");
		$this->_view->arriendo = 	$arriendo = $this->_getSanitizedParam("arriendo");

		$this->_view->PV = 	$PV = $this->_getSanitizedParam("PV");
		$this->_view->PA = 	$PA = $this->_getSanitizedParam("PA");
		$this->_view->hab = $hab = $this->_getSanitizedParam("hab");
		$this->_view->codigo = $codigo = $this->_getSanitizedParam("codigo");

		$this->_view->orden = 	$orden = $this->_getSanitizedParam("orden");
		$this->_view->orden2 = 	$orden2 = $this->_getSanitizedParam("orden2");



		$departamentosModel = new Administracion_Model_DbTable_Departamentos();
		$ciudadesModel = new Administracion_Model_DbTable_Ciudades();
		$sectoresModel = new Administracion_Model_DbTable_Sectores();
		$localidadesModel = new Administracion_Model_DbTable_Localidades();
		$tiposModel = new Administracion_Model_DbTable_Tipos();
		$inmueblesModel = new Administracion_Model_DbTable_Inmuebles();
		$fotosModel = new Administracion_Model_DbTable_Fotos();



		$this->_view->departamentoInfo = $departamentoInfo = $departamentosModel->getById($departamento);
		$this->_view->ciudadInfo = $ciudadInfo = $ciudadesModel->getById($ciudad);

		$this->_view->sectorInfo = $sectorInfo = $sectoresModel->getById($sector);
		$this->_view->localidadInfo = $localidadInfo = $localidadesModel->getById($localidad);
		$this->_view->tipoInfo = $tipoInfo = $tiposModel->getById($tipo);
		// $departamentoInfo = $departamentosModel->getById($area);

		$this->_view->tipos = $this->getTipo();
		$this->_view->departamentos = $this->getDepartamento();
		$this->_view->ciudades = $this->getCiudad();
		$this->_view->sectores = $this->getSector();
		$this->_view->localidades = $this->getLocalidad();




		//FILTROS
		$f1 = "";
		if ($departamento != '') {
			$dep = $departamento;
			$f1 = " AND inmuebles.departamento = '$departamento' ";
		}
		$f2 = "";
		if ($ciudad != '') {
			$ciu = $ciudad;
			$f2 = " AND inmuebles.ciudad = '$ciudad' ";
		}
		$f3 = "";
		if ($sector != '') {
			$sec = $sector;
			$f3 = " AND inmuebles.sector = '$sector' ";
		}
		$f4 = "";
		if ($localidad != '') {
			$loc = $localidad;
			$f4 = " AND inmuebles.localidad = '$localidad' ";
		}
		$f5 = "";
		if ($tipo != '') {

			$f5 = " AND inmuebles.tipo = '$tipo' ";
		}
		$f6 = "";
		if ($area != '' && $area != 'all') {

			$aux = explode("-", $area);
			$area1 = $aux[0];
			$area2 = $aux[1];
			$f6 = " AND (inmuebles.area >= $area1 AND inmuebles.area <= $area2) ";
		}


		$f7 = "";
		if ($compra != '') {
			$f7 = " AND (inmuebles.venta > 0) ";
		}
		$f8 = "";
		if ($arriendo != '') {
			$f8 = " AND (inmuebles.alquiler > 0) ";
		}
		$f9 = "";
		if ($PA != '') {
			$precio = $PA;
			$aux = explode("-", $precio);
			$precio1 = $aux[0] * 1000000;
			$precio2 = $aux[1] * 1000000;
			$f9 = " AND (inmuebles.alquiler >= '$precio1' AND inmuebles.alquiler <= '$precio2') ";
		}
		$f10 = "";
		if ($PV != '') {
			$precio = $PV;
			$aux = explode("-", $precio);
			$precio1 = $aux[0] * 1000000;
			$precio2 = $aux[1] * 1000000;
			$f10 = " AND (inmuebles.venta >= '$precio1' AND inmuebles.venta <= '$precio2') ";
		}
		$f11 = "";
		if ($hab != '') {
			// $hab = $_GET['hab'];
			$f11 = " AND inmuebles.Alcobas = '$hab' ";
		}
		$f12 = "";
		if ($codigo != '') {
			// $codigo = $_GET['codigo'];
			$f12 = " AND inmuebles.ref LIKE '%$codigo%' ";
		}


		if ($orden != '') {
			if ($orden == 1) {
				$orden = "  Alcobas ";
			}
			if ($orden == 2) {
				$orden = "  alquiler ";
			}
			if ($orden == 3) {
				$orden = "  venta ";
			}
			if ($orden == 4) {
				$orden = "  area ";
			}
		} else {
			$orden = "";
		}

		if ($orden2 != '') {
			if ($orden2 == 1) {
				$orden2  = " ASC ";
			}
			if ($orden2 == 2) {
				$orden2  = " DESC ";
			}
		} else {
			$orden2 = "";
		}



		$maxRows_rsResultado = 3;
		$pageNum_rsResultado = 0;
		if (isset($_GET['pageNum_rsResultado'])) {
			$pageNum_rsResultado = $_GET['pageNum_rsResultado'];
		}
		$startRow_rsResultado = $pageNum_rsResultado * $maxRows_rsResultado;

		$list =  $inmueblesModel->getListInventario("ocultar = 0 $f1 $f2 $f3 $f4 $f5 $f6 $f7 $f8 $f9 $f10 $f11 $f12 ", "$orden$orden2");

		$amount = 3;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
			$start = 0;
			$page = 1;
		} else {
			$start = ($page - 1) * $amount;
		}

		$this->_view->register_number = count($list);
		$this->_view->pages = $page;
		$this->_view->totalpages = ceil(count($list) / $amount);
		$this->_view->page = $page;
		$inmueblesList =  $inmueblesModel->getListInventarioPages("ocultar = 0 $f1 $f2 $f3 $f4 $f5 $f6 $f7 $f8 $f9 $f10 $f11 $f12 ", "$orden$orden2", $start, $amount);

		if (is_countable($inmueblesList) && count($inmueblesList) >= 1) {
			foreach ($inmueblesList as $inmueble) {
				$inmueble->imagen = $fotosModel->getList("inmueble='$inmueble->id'", "")[0]->foto;
			}
		}
		$this->_view->inmueblesList = $inmueblesList;
		// print_r($inmueblesList);
	}


	public function inmuebleAction()
	{

		$this->_view->id = $id = $this->_getSanitizedParam("id");

		$inmueblesModel = new Administracion_Model_DbTable_Inmuebles();
		$fotosModel = new Administracion_Model_DbTable_Fotos();

		$inmueble =  $inmueblesModel->getInmuebleById($id);
		$fotos = $fotosModel->getList("inmueble = '$inmueble->id'", "");

		$this->_view->fotos = $fotos;
		$this->_view->inmueble = $inmueble;
		$this->_csrf_section = "omega_index" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
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
		$phone = $this->sanitizarEntrada($data['phone']);
		$message = $this->sanitizarEntrada($data['message']);
		$ref = $this->sanitizarEntrada($data['ref']);

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
		$data2["telefono"] = $phone;
		$data2["message"] = $message;
		$data2["ref"] = $ref;





		if (Session::getInstance()->get('csrf')[$csrf_section] != $csrf) {
			$res['error'] = "Token CSRF inválido 1";
			$res['status'] = "error";
			die(json_encode($res));
		}

		if (!isset($csrf_token) ||  $csrf_token !== $_SESSION['csrf_token']) {
			$res['error'] = "Token CSRF inválido 2";
			$res['status'] = "error";
			die(json_encode($res));
		}


		if (!$this->verifyCaptcha($g_recaptcha_response)) {
			$res['error'] = "Token CSRF inválido 3";
			$res['status'] = "error";
			die(json_encode($res));
		}

		if ($hash2 !== $hash) {
			$res['error'] = "Token CSRF inválido 4";
			$res['status'] = "error";
			die(json_encode($res));
		}


		if ($subjet == "") {
			if ($nombre != "" and $correo != ""  and $message != "" and $phone != "" and $ref != "") {
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
					$mail_response = $mail->sendMailInventario($data2);
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
	/**
	 * Genera los valores del campo tipo.
	 *
	 * @return array cadena con los valores del campo tipo.
	 */
	private function getTipo()
	{
		$modelData = new Administracion_Model_DbTable_Dependtipos();
		$data = $modelData->getList("", "nombre ASC");
		return $data;
	}


	/**
	 * Genera los valores del campo departamento.
	 *
	 * @return array cadena con los valores del campo departamento.
	 */
	private function getDepartamento()
	{
		$modelData = new Administracion_Model_DbTable_Dependdepartamentos();
		$data = $modelData->getList("", "nombre ASC");

		return $data;
	}


	/**
	 * Genera los valores del campo ciudad.
	 *
	 * @return array cadena con los valores del campo ciudad.
	 */
	private function getCiudad()
	{
		$modelData = new Administracion_Model_DbTable_Dependciudades();
		$data = $modelData->getList("", "nombre ASC");

		return $data;
	}


	/**
	 * Genera los valores del campo sector.
	 *
	 * @return array cadena con los valores del campo sector.
	 */
	private function getSector()
	{
		$modelData = new Administracion_Model_DbTable_Dependsectores();
		$data = $modelData->getList("", "nombre ASC");

		return $data;
	}


	/**
	 * Genera los valores del campo localidad.
	 *
	 * @return array cadena con los valores del campo localidad.
	 */
	private function getLocalidad()
	{
		$modelData = new Administracion_Model_DbTable_Dependlocalidades();
		$data = $modelData->getList("", "nombre ASC");

		return $data;
	}
}
