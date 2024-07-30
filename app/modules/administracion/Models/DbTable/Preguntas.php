<?php 
/**
* clase que genera la insercion y edicion  de Preguntas en la base de datos
*/
class Administracion_Model_DbTable_Preguntas extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'preguntas';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'preguntas_id';

	/**
	 * insert recibe la informacion de un Preguntas y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$preguntas_pregunta = $data['preguntas_pregunta'];
		$preguntas_estado = $data['preguntas_estado'];
		$preguntas_fecha = $data['preguntas_fecha'];
		$preguntas_respuestas = $data['preguntas_respuestas'];
		$preguntas_fecha_respuesta = date("Y-m-d H:i:s");
		$query = "INSERT INTO preguntas( preguntas_pregunta, preguntas_estado, preguntas_fecha, preguntas_respuestas, preguntas_fecha_respuesta) VALUES ( '$preguntas_pregunta', '$preguntas_estado', '$preguntas_fecha', '$preguntas_respuestas', '$preguntas_fecha_respuesta')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Preguntas  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$preguntas_pregunta = $data['preguntas_pregunta'];
		$preguntas_estado = $data['preguntas_estado'];
		$preguntas_fecha = $data['preguntas_fecha'];
		$preguntas_respuestas = $data['preguntas_respuestas'];
		$preguntas_fecha_respuesta = $data['preguntas_fecha_respuesta'];
		$query = "UPDATE preguntas SET  preguntas_pregunta = '$preguntas_pregunta', preguntas_estado = '$preguntas_estado', preguntas_fecha = '$preguntas_fecha', preguntas_respuestas = '$preguntas_respuestas', preguntas_fecha_respuesta = '$preguntas_fecha_respuesta' WHERE preguntas_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}