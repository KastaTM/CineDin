<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOApuntarse.php';


class SAApuntarse {
	
	private static $daoApuntarse;
	
	public static function buscaApuntarseSA($usuario,$evento) {
		$daoApuntado = new DAOApuntarse(); 
		return $daoApuntado->buscaApuntarseDAO($usuario,$evento);
	}
		
	public static function anadirApuntarseSA($usuario,$evento){ 
		$daoApuntarse = new DAOApuntarse();
		$estaApuntado = $daoApuntarse->buscaApuntarseDAO($usuario,$evento);
		if ($estaApuntado) {
			return NULL; 
		}
		$daoApuntarse->anadirApuntarseDAO($usuario,$evento);
		return $estaApuntado;
	}
	
	public static function eliminarApuntarseSA($usuario,$evento){ 
		$daoApuntarse = new DAOApuntarse();
		$estaApuntado = $daoApuntarse->buscaApuntarseDAO($usuario,$evento);
		if ($estaApuntado) {
			$daoApuntarse->eliminarApuntarseDAO($usuario,$evento);
		}
	}	
	
	public static function listarEventosApuntadosSA(){
	$daoApuntado = new DAOApuntarse();
	$result = $daoApuntado->listarEventosApuntadosDAO($_SESSION["id"]);
	$eventos = array();
	if($result != NULL){
		for($i = 0; $i < count($result); $i++ ){
			array_push($eventos, $result[$i]);
		}
	}
	return $eventos;
	}
	
	public static function listarUsuariosApuntadosSA($evento){
	$daoApuntado = new DAOApuntarse();
	$result = $daoApuntado->listarUsuariosApuntadosDAO($evento);
	$usuarios = array();
	if($result != NULL){
		for($i = 0; $i < count($result); $i++ ){
			array_push($usuarios,$result[$i]);
		}
	}
	return $usuarios;
	}
}
?>