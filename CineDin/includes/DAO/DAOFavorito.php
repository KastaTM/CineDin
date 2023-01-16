<?php

include_once('DAO.php');
require_once __DIR__.'/../TO/TOFavorito.php';


class DAOFavorito extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaFavoritoDAO($idUsuario, $idpelicula, $idserie) {
		if($idserie==NULL){
			$query = "SELECT * FROM favoritos  WHERE IdPelicula = '$idpelicula' AND IdUsuario = '$idUsuario'";
		}
		else{
			$query = "SELECT * FROM favoritos  WHERE IdSerie='$idserie' AND IdUsuario = '$idUsuario'";
		}
		
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			return true;
		}
		else return false;
	}
	
	public function anadirFavoritoDAO($usuario,$idpelicula, $idserie){
        if($idpelicula==NULL){
			$sql = "INSERT INTO favoritos (IdUsuario, IdSerie) VALUES ('$usuario','$idserie')";
		}else{
			$sql = "INSERT INTO favoritos (IdUsuario, IdPelicula) VALUES ('$usuario', '$idpelicula')";
		}
        $this->ejecutarModificacion($sql);
 	}
	
	public function eliminarFavoritoDAO($usuario,$idpelicula, $idserie){
		if($idserie==NULL){
			$sql = "DELETE FROM favoritos WHERE IdPelicula = '$idpelicula' AND IdUsuario = '$usuario'";
		}
		else{
			$sql = "DELETE FROM favoritos WHERE IdSerie = '$idserie' AND IdUsuario = '$usuario'";
		}
        $this->ejecutarModificacion($sql);
 	}	
	
	public function listarFavoritosPeliculaDAO($id){
		$query = "SELECT * FROM favoritos WHERE IdUsuario = '$id'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
				if($rs[$i]['IdPelicula'] != NULL){
					array_push( $array, $rs[$i]['IdPelicula']);
				}
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	public function listarFavoritosSerieDAO($id){
		$query = "SELECT * FROM favoritos WHERE IdUsuario = '$id'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
				if($rs[$i]['IdSerie'] != NULL){
					array_push( $array, $rs[$i]['IdSerie']);
				}
            }
			return $array;
		}
		else{
			return null;
		}
	}
}
?>