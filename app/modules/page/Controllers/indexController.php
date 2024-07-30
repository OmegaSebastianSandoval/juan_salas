<?php

/**
 *
 */

class Page_indexController extends Page_mainController
{

	public $botonactivo  = 1;

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
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$inmuebleModel = new Administracion_Model_DbTable_Inmuebles();
		$fotosModel = new Administracion_Model_DbTable_Fotos();


		$this->_view->bannerprincipal = $this->template->bannerPrincipal(1);

		$this->_view->contenido = $this->template->getContentseccion(1);

		$this->_view->preguntas = $contenidoModel->getList("contenido_seccion = '8' AND contenido_padre != '0' AND contenido_estado='1'", "orden ASC");
		$inmuebles = $inmuebleModel->getList("ocultar = '0'", "id DESC LIMIT 4");
		foreach ($inmuebles as $inmueble) {
			$inmueble->imagen = $fotosModel->getList("inmueble='$inmueble->id'", "")[0]->foto;
		
		}
		 $this->_view->inmuebles = $inmuebles;

		// print_r($this->_view->inmuebles);


	}
}
