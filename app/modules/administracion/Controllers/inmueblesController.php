<?php
/**
* Controlador de Inmuebles que permite la  creacion, edicion  y eliminacion de los inmueble del Sistema
*/
class Administracion_inmueblesController extends Administracion_mainController
{

	public $botonpanel = 11;

	/**
	 * $mainModel  instancia del modelo de  base de datos inmueble
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_inmuebles";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador inmuebles .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Inmuebles();
		$this->namefilter = "parametersfilterinmuebles";
		$this->route = "/administracion/inmuebles";
		$this->namepages ="pages_inmuebles";
		$this->namepageactual ="page_actual_inmuebles";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  inmueble con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de inmueble";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->list_tipo = $this->getTipo();
		$this->_view->list_departamento = $this->getDepartamento();
		$this->_view->list_ciudad = $this->getCiudad();
		$this->_view->list_sector = $this->getSector();
		$this->_view->list_localidad = $this->getLocalidad();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  inmueble  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_inmuebles_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_tipo = $this->getTipo();
		$this->_view->list_departamento = $this->getDepartamento();
		$this->_view->list_ciudad = $this->getCiudad();
		$this->_view->list_sector = $this->getSector();
		$this->_view->list_localidad = $this->getLocalidad();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar inmueble";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear inmueble";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear inmueble";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un inmueble  y redirecciona al listado de inmueble.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);
			
			$data['id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR INMUEBLE';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un inmueble  y redirecciona al listado de inmueble.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->id) {
				$data = $this->getData();
					$this->mainModel->update($data,$id);
			}
			$data['id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR INMUEBLE';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un inmueble  y redirecciona al listado de inmueble.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR INMUEBLE';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Inmuebles.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		if($this->_getSanitizedParam("tipo") == '' ) {
			$data['tipo'] = '0';
		} else {
			$data['tipo'] = $this->_getSanitizedParam("tipo");
		}
		$data['ref'] = $this->_getSanitizedParam("ref");
		$data['area'] = $this->_getSanitizedParam("area");
		$data['NombreVendedor'] = $this->_getSanitizedParam("NombreVendedor");
		if($this->_getSanitizedParam("departamento") == '' ) {
			$data['departamento'] = '0';
		} else {
			$data['departamento'] = $this->_getSanitizedParam("departamento");
		}
		if($this->_getSanitizedParam("ciudad") == '' ) {
			$data['ciudad'] = '0';
		} else {
			$data['ciudad'] = $this->_getSanitizedParam("ciudad");
		}
		if($this->_getSanitizedParam("sector") == '' ) {
			$data['sector'] = '0';
		} else {
			$data['sector'] = $this->_getSanitizedParam("sector");
		}
		if($this->_getSanitizedParam("localidad") == '' ) {
			$data['localidad'] = '0';
		} else {
			$data['localidad'] = $this->_getSanitizedParam("localidad");
		}
		$data['descripcion'] = $this->_getSanitizedParamHtml("descripcion");
		if($this->_getSanitizedParam("venta") == '' ) {
			$data['venta'] = '0';
		} else {
			$data['venta'] = $this->_getSanitizedParam("venta");
		}
		if($this->_getSanitizedParam("alquiler") == '' ) {
			$data['alquiler'] = '0';
		} else {
			$data['alquiler'] = $this->_getSanitizedParam("alquiler");
		}
		if($this->_getSanitizedParam("administracion") == '' ) {
			$data['administracion'] = '0';
		} else {
			$data['administracion'] = $this->_getSanitizedParam("administracion");
		}
		$data['descripcionE'] = $this->_getSanitizedParamHtml("descripcionE");
		$data['titulo'] = $this->_getSanitizedParam("titulo");
		if($this->_getSanitizedParam("banos") == '' ) {
			$data['banos'] = '0';
		} else {
			$data['banos'] = $this->_getSanitizedParam("banos");
		}
		if($this->_getSanitizedParam("Alcobas") == '' ) {
			$data['Alcobas'] = '0';
		} else {
			$data['Alcobas'] = $this->_getSanitizedParam("Alcobas");
		}
		if($this->_getSanitizedParam("parqueaderos") == '' ) {
			$data['parqueaderos'] = '0';
		} else {
			$data['parqueaderos'] = $this->_getSanitizedParam("parqueaderos");
		}
		$data['direccion'] = $this->_getSanitizedParam("direccion");
		$data['duena'] = $this->_getSanitizedParam("duena");
		$data['telefonod'] = $this->_getSanitizedParam("telefonod");
		$data['estrato'] = $this->_getSanitizedParam("estrato");
		$data['tiempoconstruido'] = $this->_getSanitizedParam("tiempoconstruido");
		$data['ndepiso'] = $this->_getSanitizedParam("ndepiso");
		$data['tipoinstalacion'] = $this->_getSanitizedParam("tipoinstalacion");
		$data['vigilancia'] = $this->_getSanitizedParam("vigilancia");
		$data['caracteristicasadicionales'] = $this->_getSanitizedParamHtml("caracteristicasadicionales");
		if($this->_getSanitizedParam("ocultar") == '' ) {
			$data['ocultar'] = '0';
		} else {
			$data['ocultar'] = $this->_getSanitizedParam("ocultar");
		}
		return $data;
	}

	/**
     * Genera los valores del campo tipo.
     *
     * @return array cadena con los valores del campo tipo.
     */
	private function getTipo()
	{
		$modelData = new Administracion_Model_DbTable_Dependtipos();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->id] = $value->nombre;
		}
		return $array;
	}


	/**
     * Genera los valores del campo departamento.
     *
     * @return array cadena con los valores del campo departamento.
     */
	private function getDepartamento()
	{
		$modelData = new Administracion_Model_DbTable_Dependdepartamentos();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->id] = $value->nombre;
		}
		return $array;
	}


	/**
     * Genera los valores del campo ciudad.
     *
     * @return array cadena con los valores del campo ciudad.
     */
	private function getCiudad()
	{
		$modelData = new Administracion_Model_DbTable_Dependciudades();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->id] = $value->nombre;
		}
		return $array;
	}


	/**
     * Genera los valores del campo sector.
     *
     * @return array cadena con los valores del campo sector.
     */
	private function getSector()
	{
		$modelData = new Administracion_Model_DbTable_Dependsectores();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->id] = $value->nombre;
		}
		return $array;
	}


	/**
     * Genera los valores del campo localidad.
     *
     * @return array cadena con los valores del campo localidad.
     */
	private function getLocalidad()
	{
		$modelData = new Administracion_Model_DbTable_Dependlocalidades();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->id] = $value->nombre;
		}
		return $array;
	}

	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " 1 = 1 ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->tipo != '') {
                $filtros = $filtros." AND tipo LIKE '%".$filters->tipo."%'";
            }
            if ($filters->ref != '') {
                $filtros = $filtros." AND ref LIKE '%".$filters->ref."%'";
            }
            if ($filters->area != '') {
                $filtros = $filtros." AND area LIKE '%".$filters->area."%'";
            }
            if ($filters->departamento != '') {
                $filtros = $filtros." AND departamento LIKE '%".$filters->departamento."%'";
            }
            if ($filters->ciudad != '') {
                $filtros = $filtros." AND ciudad LIKE '%".$filters->ciudad."%'";
            }
            if ($filters->sector != '') {
                $filtros = $filtros." AND sector LIKE '%".$filters->sector."%'";
            }
            if ($filters->localidad != '') {
                $filtros = $filtros." AND localidad LIKE '%".$filters->localidad."%'";
            }
            if ($filters->titulo != '') {
                $filtros = $filtros." AND titulo LIKE '%".$filters->titulo."%'";
            }
            if ($filters->estrato != '') {
                $filtros = $filtros." AND estrato LIKE '%".$filters->estrato."%'";
            }
            if ($filters->tiempoconstruido != '') {
                $filtros = $filtros." AND tiempoconstruido LIKE '%".$filters->tiempoconstruido."%'";
            }
            if ($filters->ndepiso != '') {
                $filtros = $filtros." AND ndepiso LIKE '%".$filters->ndepiso."%'";
            }
		}
        return $filtros;
    }

    /**
     * Recibe y asigna los filtros de este controlador
     *
     * @return void
     */
    protected function filters()
    {
        if ($this->getRequest()->isPost()== true) {
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
					$parramsfilter['tipo'] =  $this->_getSanitizedParam("tipo");
					$parramsfilter['ref'] =  $this->_getSanitizedParam("ref");
					$parramsfilter['area'] =  $this->_getSanitizedParam("area");
					$parramsfilter['departamento'] =  $this->_getSanitizedParam("departamento");
					$parramsfilter['ciudad'] =  $this->_getSanitizedParam("ciudad");
					$parramsfilter['sector'] =  $this->_getSanitizedParam("sector");
					$parramsfilter['localidad'] =  $this->_getSanitizedParam("localidad");
					$parramsfilter['titulo'] =  $this->_getSanitizedParam("titulo");
					$parramsfilter['estrato'] =  $this->_getSanitizedParam("estrato");
					$parramsfilter['tiempoconstruido'] =  $this->_getSanitizedParam("tiempoconstruido");
					$parramsfilter['ndepiso'] =  $this->_getSanitizedParam("ndepiso");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}