<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAORespuesta.php';


class SARespuesta {
	
	private static $daoRespuesta;
	
	public static function buscaRespuestaSA($pregunta) {
		$daoRespuesta = new DAORespuesta();
		return $daoRespuesta->buscaRespuestaDAO($pregunta);
	}
	
	public static function anadirRespuestaSA($nombreUsuario, $fecha, $respuesta, $pregunta){
		$daoRespuesta = new DAORespuesta();
		$existePregunta = $daoRespuesta->buscaRespuestaDAO($pregunta);
		if ($existePregunta) {
			return NULL; 
		}
		$daoRespuesta->anadirRespuestaDAO($nombreUsuario, $fecha, $respuesta, $pregunta);
		echo"1";
		return $existePregunta;
	}
	
	public static function listarRespuestasSA($pregunta){
		$daoRespuesta = new DAORespuesta();
		$result = $daoRespuesta->listarRespuestasDAO($pregunta);
		$respuestas = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($respuestas, $daoRespuesta->buscaRespuestaDAO($result[$i]));
			}
		}
		return $respuestas;
	}
	
}
?>