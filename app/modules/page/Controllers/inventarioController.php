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
		$this->_view->contenido2 = $this->template->getContentseccion(10);

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

		$departamentosModel = new Administracion_Model_DbTable_Departamentos();
		$ciudadesModel = new Administracion_Model_DbTable_Ciudades();
		$sectoresModel = new Administracion_Model_DbTable_Sectores();
		$localidadesModel = new Administracion_Model_DbTable_Localidades();
		$tiposModel = new Administracion_Model_DbTable_Tipos();
		// $departamentosModel = new Administracion_Model_DbTable_Departamentos();


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
