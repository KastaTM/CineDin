<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAONoticia.php';


class SANoticia {
	
	private static $daoNoticia;
	
	public static function buscaNoticiaSA($nombreEvento) {
		$daoNoticia = new DAONoticia();
		return $daoNoticia->buscaNoticiaDAO($nombreEvento);
	}
	
	public static function anadirNoticiaSA($nombre,$fecha, $descripcion, $limite){
		$daoNoticia = new DAONoticia();
		$existeNoticia = $daoNoticia->buscaNoticiaDAO($nombre);
		if ($existeNoticia) {
			return NULL; 
		}
		$daoNoticia->anadirNoticiaDAO($nombre, $fecha, $descripcion, $limite);
		return $existeNoticia;
	}
	
	public static function borrarNoticiaSA($nombre){
		$daoNoticia = new DAONoticia();
		$existeNoticia = $daoNoticia->buscaNoticiaDAO($nombre);
		if (!$existeNoticia) {
			return NULL; 
		}
		$daoNoticia->borrarNoticiaDAO($nombre);
		return $existeNoticia;
	}
	
	public static function listarNoticiasSA(){
		$daoNoticia = new DAONoticia();
		$result = $daoNoticia->listarNoticiasDAO();
		$noticias = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($noticias, $daoNoticia->buscaNoticiaDAO($result[$i]));
			}
		}
		return $noticias;
	}
	
	public static function desplegableNoticias(){
		$daoNoticia = new DAONoticia();
		$result = $daoNoticia->listarNoticiasDAO();
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