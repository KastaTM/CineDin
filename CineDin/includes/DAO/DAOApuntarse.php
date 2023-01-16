<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOApuntarse.php';


class DAOApuntarse extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaApuntarseDAO($idUsuario, $nombreEvento) {
		$query = "SELECT * FROM apuntadosevento  WHERE IdEvento = '$nombreEvento' AND IdUsuario = '$idUsuario'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			return true;
		}
		else return false;
	}
	
	public function anadirApuntarseDAO($usuario,$evento){
        $sql = "INSERT INTO apuntadosevento (IdUsuario, IdEvento)
		VALUES ('$usuario', '$evento')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function eliminarApuntarseDAO($usuario,$evento){
        $sql = "DELETE FROM apuntadosevento WHERE IdEvento = '$evento' AND IdUsuario = '$usuario'";
        $this->ejecutarModificacion($sql);
 	}	
	
	public function listarEventosApuntadosDAO($id){
		$query = "SELECT * FROM apuntadosevento WHERE IdUsuario = '$id'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['IdEvento']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	public function listarUsuariosApuntadosDAO($evento){
		$query = "SELECT * FROM apuntadosevento WHERE IdEvento = '$evento'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['IdUsuario']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>