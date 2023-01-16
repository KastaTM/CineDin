<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOEvento.php';


class SAEvento {
	
	private static $daoEvento;
	
	public static function buscaEventoSA($nombreEvento) {
		$daoEvento = new DAOEvento();
		return $daoEvento->buscaEventoDAO($nombreEvento);
	}
	
	public static function anadirEventoSA($nombre,$fecha, $descripcion, $limite, $portada){
		$daoEvento = new DAOEvento();
		$existeEvento = $daoEvento->buscaEventoDAO($nombre);
		if ($existeEvento) {
			return NULL; 
		}
		$daoEvento->anadirEventoDAO($nombre, $fecha, $descripcion, $limite, $portada);
		return $existeEvento;
	}
	
	public static function borrarEventoSA($nombre){
		$daoEvento = new DAOEvento();
		$existeEvento = $daoEvento->buscaEventoDAO($nombre);
		if (!$existeEvento) {
			return NULL; 
		}
		$daoEvento->borrarEventoDAO($nombre);
		return $existeEvento;
	}
	
	public static function listarEventosSA(){
		$daoEvento = new DAOEvento();
		$result = $daoEvento->listarEventosDAO();
		$eventos = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($eventos, $daoEvento->buscaEventoDAO($result[$i]));
			}
		}
		return $eventos;
	}
	
	public static function desplegableEventos(){
		$daoEvento = new DAOEvento();
		$result = $daoEvento->listarEventosDAO();
		$lista = '';
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				$lista .= "<option> $result[$i] </option>";
			}
		}
		return $lista;
	}
}
?>