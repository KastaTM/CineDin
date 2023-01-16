<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOEvento.php';


class DAOEvento extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaEventoDAO($nombreEvento) {
		$evento = new TOEvento($nombreEvento);
		$query = "SELECT * FROM eventos  WHERE Nombre = '$nombreEvento'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$evento->setNombreEvento($rs[0]["Nombre"]);
				$evento->setFechaEvento($rs[0]["Fecha"]);
				$evento->setDescripcionEvento($rs[0]["Descripcion"]);
				$evento->setLimitePersonasEvento($rs[0]["Limite"]);
				$evento->setPortadaEvento($rs[0]["Portada"]);
				return $evento;
			}
		}
		return null;
	}
	
	public function anadirEventoDAO($nombre,$fecha, $descripcion, $limite, $portada){
        $sql = "INSERT INTO eventos (Nombre, Fecha, Descripcion, Limite, Portada)
		VALUES ('$nombre', '$fecha', '$descripcion', '$limite', '$portada')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarEventoDAO($nombre){
        $sql = "DELETE From eventos WHERE Nombre= '$nombre'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarEventosDAO(){
		$query = "SELECT * FROM eventos";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>