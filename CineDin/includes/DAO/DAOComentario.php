<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOComentario.php';


class DAOComentario extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaComentarioDAO($Idcoment) {
		$coment = new TOComentario();
		$query = "SELECT * FROM comentarios WHERE IdComentario = '$Idcoment'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {				
				$coment->setIdUsuario($rs[0]["IdUsuario"]);
				$coment->setFecha($rs[0]["Fecha"]);
				$coment->setComentario($rs[0]["Comentario"]);
				$coment->setIdPelicula($rs[0]["IdPelicula"]);
				$coment->setIdSerie($rs[0]["IdSerie"]);
				$coment->setIdComent($rs[0]["IdComentario"]);
				$coment->setValoracion($rs[0]["Valoracion"]);
				return $coment;
			}
		}
		return null;
	}
	
	public function buscaComentarioUsuarioDAO($usuario, $peli, $serie){
		if($peli == NULL){
			$query = "SELECT * FROM comentarios WHERE IdUsuario = '$usuario' AND IdSerie = '$serie'";
		}
		else{
			$query = "SELECT * FROM comentarios WHERE IdUsuario = '$usuario' AND IdPelicula = '$peli'";
		}
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {				
				return true;
			}else return false;
		}
		return false;
	}
	
	public function anadirComentarioDAO($nombre,$fecha, $comentario, $peli, $serie, $valoracion){
		if($peli == NULL){
			$sql = "INSERT INTO comentarios (IdUsuario, Fecha, Comentario, IdSerie, Valoracion)
			VALUES ('$nombre', '$fecha', '$comentario', '$serie', '$valoracion')";
		}
		else{
			$sql = "INSERT INTO comentarios (IdUsuario, Fecha, Comentario, IdPelicula, Valoracion)
			VALUES ('$nombre', '$fecha', '$comentario', '$peli', '$valoracion')";
		}
        $this->ejecutarModificacion($sql);
 	}
	
	public function actualizarComentarioDAO($nombre,$fecha, $comentario, $peli, $serie, $valoracion){
		if($peli == NULL){
			$sql = "UPDATE comentarios SET Comentario = '$comentario'
			WHERE IdUsuario = '$nombre' AND IdSerie = '$serie'";
			$sql2 = "UPDATE comentarios SET Valoracion = '$valoracion'
			WHERE IdUsuario = '$nombre' AND IdSerie = '$serie'";
		}
		else{
			$sql = "UPDATE comentarios SET Comentario = '$comentario'
			WHERE IdUsuario = '$nombre' AND IdPelicula = '$peli'";
			$sql2 = "UPDATE comentarios SET Valoracion = '$valoracion'
			WHERE IdUsuario = '$nombre' AND IdPelicula = '$peli'";
		}
		
        $this->ejecutarModificacion($sql);
		$this->ejecutarModificacion($sql2);
	}
	
	public function listaComentariosDAO($nombrePelSer){
		$query = "SELECT * FROM comentarios WHERE (IdPelicula = '$nombrePelSer' OR IdSerie= '$nombrePelSer')";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['IdComentario']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>