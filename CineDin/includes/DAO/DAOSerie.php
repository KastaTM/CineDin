<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOSerie.php';


class DAOSerie extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaSerieDAO($nombreSerie) {
		$serie = new TOSerie($nombreSerie);
		$query = "SELECT * FROM series  WHERE Nombre = '$nombreSerie'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$serie->setNombreSerie($rs[0]["Nombre"]);
				$serie->setEstrenoSerie($rs[0]["Fecha"]);
				$serie->setGeneroSerie($rs[0]["Genero"]);
				$serie->setTemporadasSerie($rs[0]["Temporadas"]);
				$serie->setDirectorSerie($rs[0]["Director"]);
				$serie->setActoresSerie($rs[0]["Actores"]);
				$serie->setDescripcionSerie($rs[0]["Descripcion"]);
				$serie->setPortadaSerie($rs[0]["Portada"]);
				$serie->setTrailerSerie($rs[0]["Trailer"]);
				return $serie;
			}
		}
		return null;
	}
	
	public function anadirSerieDAO($nombre,$estreno, $genero, $temporadas, $director, $actores, $descripcion, $portada, $trailer){
        $sql = "INSERT INTO series (Nombre, Fecha, Genero, Temporadas, Director, Actores, Descripcion, Portada, Trailer)
		VALUES ('$nombre', '$estreno', '$genero', '$temporadas', '$director', '$actores', '$descripcion', '$portada', '$trailer')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarSerieDAO($nombre){
        $sql = "DELETE From series WHERE Nombre= '$nombre'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarSeriesDAO(){
		$query = "SELECT * FROM series";
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
	
	public function listarSeriesEncontradasDAO($dato){
		$query = "SELECT * FROM series WHERE Nombre LIKE '%$dato%'";
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