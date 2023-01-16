<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOSerie.php';


class SASerie {
	
	private static $daoSerie;
	
	public static function buscaSerieSA($nombreUsuario) {
		$daoSerie = new DAOSerie();
		return $daoSerie->buscaSerieDAO($nombreUsuario);
	}
		
	public static function anadirSerieSA($nombre,$estreno, $genero, $temporadas, $director, $actores, $descripcion, $portada, $trailer){
		$daoSerie = new DAOSerie();
		$existeSerie = $daoSerie->buscaSerieDAO($nombre);
		if ($existeSerie) {
			return NULL; 
		}
		$daoSerie->anadirSerieDAO($nombre,$estreno, $genero, $temporadas, $director, $actores, $descripcion, $portada, $trailer);
		return $existeSerie;
	}
		
	public static function borrarSerieSA($nombre){
		$daoSerie = new DAOSerie();
		$existeSerie = $daoSerie->buscaSerieDAO($nombre);
		if (!$existeSerie) {
			return NULL; 
		}
		$daoSerie->borrarSerieDAO($nombre);
		return $existeSerie;
	}
		
	public static function listarSeriesSA(){
		$daoSerie = new DAOSerie();
		$result = $daoSerie->listarSeriesDAO();
		$series = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($series, $daoSerie->buscaSerieDAO($result[$i]));
			}
		}
		return $series;
	}
	
	public static function busquedaSeries($dato){
		$daoSerie = new DAOSerie();
		$result = $daoSerie->listarSeriesEncontradasDAO($dato);
		$series = array();
		if ($result != NULL){
			for ($i = 0; $i < count($result); $i++){
				array_push($series, $daoSerie->buscaSerieDAO($result[$i]));
			}
		}
		return $series;
	}
		
	public static function desplegableSeries(){
		$daoSerie = new DAOSerie();
		$result = $daoSerie->listarSeriesDAO();
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