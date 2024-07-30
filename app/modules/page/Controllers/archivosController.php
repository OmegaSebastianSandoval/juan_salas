<?php

/**
 *
 */

class Page_archivosController extends Page_mainController
{

	public $botonactivo  = 6;

	public function indexAction()
	{
		$this->_view->banner = $this->template->banner(6);
		$this->_view->contenido = $this->template->getContentseccion(6);
	}
}
