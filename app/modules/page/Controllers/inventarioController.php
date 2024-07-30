<?php 

/**
*
*/

class Page_inventarioController extends Page_mainController
{

	public $botonactivo  = 2;

	public function indexAction()
	{
		$this->_view->banner = $this->template->banner(2);

		$this->_view->contenido = $this->template->getContentseccion(2);
        
	}

}

?>