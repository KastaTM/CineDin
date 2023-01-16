<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TORespuesta.php';


class DAORespuesta extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaRespuestaDAO($idpregunta) {
		$respuestaDAO = new TORespuesta();
		$query = "SELECT * FROM respuestasforo WHERE IdRespuesta='$idpregunta'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				
				$respuestaDAO->setIdUsuario($rs[0]["IdUsuario"]);
				$respuestaDAO->setFecha($rs[0]["Fecha"]);
				$respuestaDAO->setRespuesta($rs[0]["Respuesta"]);
				$respuestaDAO->setTituloPregunta($rs[0]["TituloPregunta"]);
				return $respuestaDAO;
			}
		}
		return null;
	}
	
	public function anadirRespuestaDAO($nombreUsuario, $fecha, $respuesta, $pregunta){
        $sql = "INSERT INTO respuestasforo (IdUsuario, Fecha, Respuesta, TituloPregunta)
		VALUES ('$nombreUsuario', '$fecha', '$respuesta', '$pregunta')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarRespuestasDAO($pregunta){
		$query = "SELECT * FROM respuestasforo WHERE TituloPregunta = '$pregunta'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['IdRespuesta']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
}
?>