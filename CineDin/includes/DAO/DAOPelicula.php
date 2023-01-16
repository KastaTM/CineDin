<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOPelicula.php';


class DAOPelicula extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaPeliculaDAO($nombrePelicula) {
		$pelicula = new TOPelicula($nombrePelicula);
		$query = "SELECT * FROM peliculas WHERE Nombre = '$nombrePelicula'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$pelicula->setNombrePelicula($rs[0]["Nombre"]);
				$pelicula->setEstrenoPelicula($rs[0]["Fecha"]);
				$pelicula->setGeneroPelicula($rs[0]["Genero"]);
				$pelicula->setDuracionPelicula($rs[0]["Duracion"]);
				$pelicula->setDirectorPelicula($rs[0]["Director"]);
				$pelicula->setActoresPelicula($rs[0]["Actores"]);
				$pelicula->setDescripcionPelicula($rs[0]["Descripcion"]);
				$pelicula->setPortadaPelicula($rs[0]["Portada"]);
				$pelicula->setTrailerPelicula($rs[0]["Trailer"]);
				return $pelicula;
			}
		}
		return null;
	}
	
	public function anadirPeliculaDAO($nombre,$estreno, $genero, $duracion, $director, $actores, $descripcion, $portada, $trailer){
        $sql = "INSERT INTO peliculas (Nombre, Fecha, Genero, Duracion, Director, Actores, Descripcion, Portada, Trailer)
		VALUES ('$nombre', '$estreno', '$genero', '$duracion', '$director', '$actores', '$descripcion', '$portada', '$trailer')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarPeliculaDAO($nombre){
        $sql = "DELETE From peliculas WHERE Nombre= '$nombre'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarPeliculasDAO(){
		$query = "SELECT * FROM peliculas";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	public function listarPeliculasEncontradasDAO($dato){
		$query = "SELECT * FROM peliculas WHERE Nombre LIKE '%$dato%'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
}
?>