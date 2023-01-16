<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOPelicula.php';


class SAPelicula {
	
	private static $daoPelicula;
	
	public static function buscaPeliculaSA($nombreUsuario) {
		$daoPelicula = new DAOPelicula();
		return $daoPelicula->buscaPeliculaDAO($nombreUsuario);
	}
		
	public static function anadirPeliculaSA($nombre,$estreno, $genero, $duracion, $director, $actores, $descripcion, $portada, $trailer){
		$daoPelicula = new DAOPelicula();
		$existePeli = $daoPelicula->buscaPeliculaDAO($nombre);
		if ($existePeli) {
			return NULL; 
		}
		$daoPelicula->anadirPeliculaDAO($nombre,$estreno, $genero, $duracion, $director, $actores, $descripcion, $portada, $trailer);
		return $existePeli;
	}
		
	public static function borrarPeliculaSA($nombre){
		$daoPelicula = new DAOPelicula();
		$existePeli = $daoPelicula->buscaPeliculaDAO($nombre);
		if (!$existePeli) {
			return NULL; 
		}
		$daoPelicula->borrarPeliculaDAO($nombre);
		return $existePeli;
	}
		
	public static function listarPeliculasSA(){
		$daoPelicula = new DAOPelicula();
		$result = $daoPelicula->listarPeliculasDAO();
		$peliculas = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($peliculas, $daoPelicula->buscaPeliculaDAO($result[$i]));
			}
		}
		return $peliculas;
	}
	
	public static function busquedaPeliculas($dato){
		$daoPelicula = new DAOPelicula();
		$result = $daoPelicula->listarPeliculasEncontradasDAO($dato);
		$peliculas = array();
		if ($result != NULL){
			for ($i = 0; $i < count($result); $i++){
				array_push($peliculas, $daoPelicula->buscaPeliculaDAO($result[$i]));
			}
		}
		return $peliculas;
	}
	
	public static function desplegablePeliculas(){
		$daoPelicula = new DAOPelicula();
		$result = $daoPelicula->listarPeliculasDAO();
		$lista = "";
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				$lista .= "<option> $result[$i] </option>";
			}
		}
		return $lista;
	}

}
?>