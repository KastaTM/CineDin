<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOPregunta.php';


class DAOPregunta extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaPreguntaDAO($pregunta) {
		$preguntaDAO = new TOPregunta();
		$query = "SELECT * FROM preguntasforo WHERE TituloPregunta = '$pregunta'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$preguntaDAO->setPregunta($rs[0]["TituloPregunta"]);
				$preguntaDAO->setFecha($rs[0]["Fecha"]);
				$preguntaDAO->setParticipantes($rs[0]["Participantes"]);
				return $preguntaDAO;
			}
		}
		return null;
	}
	
	public function anadirPreguntaDAO($tituloPregunta, $fecha, $participantes){
        $sql = "INSERT INTO preguntasforo (TituloPregunta, fecha, participantes)
		VALUES ('$tituloPregunta', '$fecha', '$participantes')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function actualizarParticipantesDAO($tituloPregunta,$participantes){
		$sql = "UPDATE preguntasforo SET Participantes='$participantes' WHERE TituloPregunta='$tituloPregunta'";
        $this->ejecutarModificacion($sql);
	}
	
	public function listarPreguntasDAO(){
		$query = "SELECT * FROM preguntasforo";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['TituloPregunta']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
}
?>