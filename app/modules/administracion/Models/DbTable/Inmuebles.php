<?php

/**
 * clase que genera la insercion y edicion  de inmueble en la base de datos
 */
class Administracion_Model_DbTable_Inmuebles extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'inmuebles';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un inmueble y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data)
	{
		$tipo = $data['tipo'];
		$ref = $data['ref'];
		$area = $data['area'];
		$NombreVendedor = $data['NombreVendedor'];
		$departamento = $data['departamento'];
		$ciudad = $data['ciudad'];
		$sector = $data['sector'];
		$localidad = $data['localidad'];
		$descripcion = $data['descripcion'];
		$venta = $data['venta'];
		$alquiler = $data['alquiler'];
		$administracion = $data['administracion'];
		$descripcionE = $data['descripcionE'];
		$titulo = $data['titulo'];
		$banos = $data['banos'];
		$Alcobas = $data['Alcobas'];
		$parqueaderos = $data['parqueaderos'];
		$direccion = $data['direccion'];
		$duena = $data['duena'];
		$telefonod = $data['telefonod'];
		$estrato = $data['estrato'];
		$tiempoconstruido = $data['tiempoconstruido'];
		$ndepiso = $data['ndepiso'];
		$tipoinstalacion = $data['tipoinstalacion'];
		$vigilancia = $data['vigilancia'];
		$caracteristicasadicionales = $data['caracteristicasadicionales'];
		$ocultar = $data['ocultar'];
		$query = "INSERT INTO inmuebles( tipo, ref, area, NombreVendedor, departamento, ciudad, sector, localidad, descripcion, venta, alquiler, administracion, descripcionE, titulo, banos, Alcobas, parqueaderos, direccion, duena, telefonod, estrato, tiempoconstruido, ndepiso, tipoinstalacion, vigilancia, caracteristicasadicionales, ocultar) VALUES ( '$tipo', '$ref', '$area', '$NombreVendedor', '$departamento', '$ciudad', '$sector', '$localidad', '$descripcion', '$venta', '$alquiler', '$administracion', '$descripcionE', '$titulo', '$banos', '$Alcobas', '$parqueaderos', '$direccion', '$duena', '$telefonod', '$estrato', '$tiempoconstruido', '$ndepiso', '$tipoinstalacion', '$vigilancia', '$caracteristicasadicionales', '$ocultar')";
		$res = $this->_conn->query($query);
		return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un inmueble  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data, $id)
	{

		$tipo = $data['tipo'];
		$ref = $data['ref'];
		$area = $data['area'];
		$NombreVendedor = $data['NombreVendedor'];
		$departamento = $data['departamento'];
		$ciudad = $data['ciudad'];
		$sector = $data['sector'];
		$localidad = $data['localidad'];
		$descripcion = $data['descripcion'];
		$venta = $data['venta'];
		$alquiler = $data['alquiler'];
		$administracion = $data['administracion'];
		$descripcionE = $data['descripcionE'];
		$titulo = $data['titulo'];
		$banos = $data['banos'];
		$Alcobas = $data['Alcobas'];
		$parqueaderos = $data['parqueaderos'];
		$direccion = $data['direccion'];
		$duena = $data['duena'];
		$telefonod = $data['telefonod'];
		$estrato = $data['estrato'];
		$tiempoconstruido = $data['tiempoconstruido'];
		$ndepiso = $data['ndepiso'];
		$tipoinstalacion = $data['tipoinstalacion'];
		$vigilancia = $data['vigilancia'];
		$caracteristicasadicionales = $data['caracteristicasadicionales'];
		$ocultar = $data['ocultar'];
		$query = "UPDATE inmuebles SET  tipo = '$tipo', ref = '$ref', area = '$area', NombreVendedor = '$NombreVendedor', departamento = '$departamento', ciudad = '$ciudad', sector = '$sector', localidad = '$localidad', descripcion = '$descripcion', venta = '$venta', alquiler = '$alquiler', administracion = '$administracion', descripcionE = '$descripcionE', titulo = '$titulo', banos = '$banos', Alcobas = '$Alcobas', parqueaderos = '$parqueaderos', direccion = '$direccion', duena = '$duena', telefonod = '$telefonod', estrato = '$estrato', tiempoconstruido = '$tiempoconstruido', ndepiso = '$ndepiso', tipoinstalacion = '$tipoinstalacion', vigilancia = '$vigilancia', caracteristicasadicionales = '$caracteristicasadicionales', ocultar = '$ocultar' WHERE id = '" . $id . "'";
		$res = $this->_conn->query($query);
	}



	public function getListInventario($filters = '', $order = '')
	{
		$filter = '';
		if ($filters != '') {
			$filter = ' WHERE ' . $filters;
		}
		$orders = "";
		if ($order != '') {
			$orders = ' ORDER BY ' . $order;
		}
		 $select = 'SELECT inmuebles.*, departamentos.nombre AS departamento1, ciudades.nombre AS ciudad1, sectores.nombre AS sector1, localidades.nombre AS localidad1, tipos.nombre AS tipo1 FROM ((((inmuebles LEFT JOIN departamentos ON departamentos.id = inmuebles.departamento) LEFT JOIN ciudades ON ciudades.id = inmuebles.ciudad) LEFT JOIN sectores ON sectores.id = inmuebles.sector) LEFT JOIN localidades ON localidades.id = inmuebles.localidad) LEFT JOIN tipos ON tipos.id = inmuebles.tipo  ' . $filter . ' ' . $orders;
		$res = $this->_conn->query($select)->fetchAsObject();
		return $res;
	}
	public function getListInventarioPages($filters = '', $order = '', $page, $amount)
	{
		$filter = '';
		if ($filters != '') {
			$filter = ' WHERE ' . $filters;
		}
		$orders = "";
		if ($order != '') {
			$orders = ' ORDER BY ' . $order;
		}
		 $select = 'SELECT inmuebles.*, departamentos.nombre AS departamento1, ciudades.nombre AS ciudad1, sectores.nombre AS sector1, localidades.nombre AS localidad1, tipos.nombre AS tipo1 FROM ((((inmuebles LEFT JOIN departamentos ON departamentos.id = inmuebles.departamento) LEFT JOIN ciudades ON ciudades.id = inmuebles.ciudad) LEFT JOIN sectores ON sectores.id = inmuebles.sector) LEFT JOIN localidades ON localidades.id = inmuebles.localidad) LEFT JOIN tipos ON tipos.id = inmuebles.tipo  ' . $filter . ' ' . $orders . ' LIMIT ' . $page . ' , ' . $amount;
		$res = $this->_conn->query($select)->fetchAsObject();
		return $res;
	}

	
	public function getInmuebleById($id)
	{
		/* echo $qyer='SELECT inmuebles.*, departamentos.nombre AS departamento1, ciudades.nombre AS ciudad1, sectores.nombre AS sector1, localidades.nombre AS localidad1, tipos.nombre AS tipo1 FROM ((((inmuebles LEFT JOIN departamentos ON departamentos.id = inmuebles.departamento) LEFT JOIN ciudades ON ciudades.id = inmuebles.ciudad) LEFT JOIN sectores ON sectores.id = inmuebles.sector) LEFT JOIN localidades ON localidades.id = inmuebles.localidad) LEFT JOIN tipos ON tipos.id = inmuebles.tipo WHERE inmuebles.id ="'.$id.'"'; */
	   $res = $this->_conn->query('SELECT inmuebles.*, departamentos.nombre AS departamento1, ciudades.nombre AS ciudad1, sectores.nombre AS sector1, localidades.nombre AS localidad1, tipos.nombre AS tipo1 FROM ((((inmuebles LEFT JOIN departamentos ON departamentos.id = inmuebles.departamento) LEFT JOIN ciudades ON ciudades.id = inmuebles.ciudad) LEFT JOIN sectores ON sectores.id = inmuebles.sector) LEFT JOIN localidades ON localidades.id = inmuebles.localidad) LEFT JOIN tipos ON tipos.id = inmuebles.tipo WHERE inmuebles.id ="'.$id.'"')->fetchAsObject();
	  if (isset($res[0])) {
		return $res[0];
	  }
	  return false;
	}
}
