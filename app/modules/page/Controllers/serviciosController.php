<?php 

/**
*
*/

class Page_serviciosController extends Page_mainController
{

	public $botonactivo  = 4;

	public function indexAction()
	{
		$this->_view->banner = $this->template->banner(4);

		$this->_view->contenido = $this->template->getContentseccion(4);
        
	}

}

?>