<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOPregunta.php';


class SAPregunta {
	
	private static $daoPregunta;
	
	public static function buscaPreguntaSA($pregunta) {
		$daoPregunta = new DAOPregunta();
		return $daoPregunta->buscaPreguntaDAO($pregunta);
	}
	
	public static function anadirPreguntaSA($tituloPregunta,$fecha, $participantes){
		$daoPregunta = new DAOPregunta();
		$existePregunta = $daoPregunta->buscaPreguntaDAO($tituloPregunta);
		if ($existePregunta) {
			return NULL; 
		}
		$daoPregunta->anadirPreguntaDAO($tituloPregunta, $fecha, $participantes);
		return $existePregunta;
	}
	
	public static function actualizarParticipantesDAO($tituloPregunta,$participantes){
		$daoPregunta = new DAOPregunta();
		$existePregunta = $daoPregunta->buscaPreguntaDAO($tituloPregunta);
		if ($existePregunta != NULL) {
			$daoPregunta->actualizarParticipantesDAO($tituloPregunta, $participantes); 
		}
	}
	
	public static function listarPreguntasSA(){
		$daoPregunta = new DAOPregunta();
		$result = $daoPregunta->listarPreguntasDAO();
		$preguntas = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($preguntas, $daoPregunta->buscaPreguntaDAO($result[$i]));
			}
		}
		return $preguntas;
	}
	
}
?>