<?php

require_once __DIR__.'/../DAO/DAOFavorito.php';


class SAFavorito {
	
	private static $daoFavorito;
	
	public static function buscaFavoritoSA($usuario,$idpelicula, $idserie) { 
		$daoFavorito = new DAOFavorito(); 
		return $daoFavorito->buscaFavoritoDAO($usuario,$idpelicula, $idserie);
	}
		
	public static function anadirFavoritoSA($usuario,$idpelicula, $idserie){ 
		$daoFavorito = new DAOFavorito();
		$estaApuntado = $daoFavorito->buscaFavoritoDAO($usuario,$idpelicula, $idserie);
		if ($estaApuntado) {
			return NULL; 
		}
		$daoFavorito->anadirFavoritoDAO($usuario,$idpelicula, $idserie);
		return $estaApuntado;
	}
	
	public static function eliminarFavoritoSA($usuario,$idpelicula, $idserie){ 
		$daoFavorito = new DAOFavorito();
		$estaApuntado = $daoFavorito->buscaFavoritoDAO($usuario,$idpelicula, $idserie);
		if ($estaApuntado) {
			$daoFavorito->eliminarFavoritoDAO($usuario,$idpelicula, $idserie);
		}
	}	
	
	public static function listarFavoritosPeliculaSA(){
		$daoFavorito = new DAOFavorito();
		$result = $daoFavorito->listarFavoritosPeliculaDAO($_SESSION["id"]);
		$eventos = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($eventos, $result[$i]);
			}
		}
		return $eventos;
	}
	
	public static function listarFavoritosSerieSA(){
		$daoFavorito = new DAOFavorito();
		$result = $daoFavorito->listarFavoritosSerieDAO($_SESSION["id"]);
		$eventos = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($eventos, $result[$i]);
			}
		}
		return $eventos;
	}
}
?>