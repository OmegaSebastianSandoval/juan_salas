<?php 

/**
*
*/

class Page_mainController extends Controllers_Abstract
{

	public $template;

	public function init()
	{
		$this->setLayout('page_page');
		$this->template = new Page_Model_Template_Template($this->_view);
		$infopageModel = new Page_Model_DbTable_Informacion();
		$publicidadModel = new Page_Model_DbTable_Publicidad();
		$contenidoModel = new Page_Model_DbTable_Contenido();

		$this->_view->botonactivo = $this->botonactivo;

		$this->_view->flotantes = $publicidadModel->getList(" publicidad_seccion='101' ","orden ASC");

		$this->_view->links = $publicidadModel->getList(" publicidad_seccion='102' AND publicidad_estado='1' ","orden ASC");
		

		$this->_view->infopage = $infopageModel->getById(1);
		$this->_view->nosotros = $contenidoModel->getList(" contenido_seccion='17' AND contenido_padre='0' AND contenido_estado='1'","orden ASC");
		$this->_view->servicios = $contenidoModel->getList(" contenido_seccion='18' AND contenido_padre='0' AND contenido_estado='1'","orden ASC");
		$this->_view->cuenta = $contenidoModel->getList(" contenido_seccion='19' AND contenido_padre='0'","orden ASC");
		$this->getLayout()->setData("metadescription",$this->_view->infopage->info_pagina_descripcion);
		$this->getLayout()->setData("metakeywords",$this->_view->infopage->info_pagina_tags);
		$adicionales = $this->_view->getRoutPHP('modules/page/Views/partials/adicionales.php');
		$this->getLayout()->setData("adicionales",$adicionales);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);
		$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
		$this->getLayout()->setData("footer",$footer);
		$flotantes = $this->_view->getRoutPHP('modules/page/Views/partials/flotantes.php');
		$this->getLayout()->setData("flotantes",$flotantes);
		
		$this->usuario();
	}


	public function usuario(){
		$userModel = new Core_Model_DbTable_User();
		$user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
		if($user->user_id == 1){
			$this->editarpage = 1;
		}
	}

} 