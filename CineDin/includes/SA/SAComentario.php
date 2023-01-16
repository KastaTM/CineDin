<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOComentario.php';


class SAComentario {
	
	private static $daoComentario;
		
	public static function anadirComentarioSA($nombre,$fecha, $comentario, $peli, $serie, $valoracion){
		$daoComentario = new DAOComentario();
		if($daoComentario->buscaComentarioUsuarioDAO($nombre,$peli,$serie)){
			$daoComentario->actualizarComentarioDAO($nombre,$fecha, $comentario, $peli, $serie, $valoracion);
		}
		else{
			$daoComentario->anadirComentarioDAO($nombre,$fecha, $comentario, $peli, $serie, $valoracion);
		}
		return true;
	}
		
	public static function listarComentariosSA($idPeliSerie){
		$daoComentario = new DAOComentario();
		$result = $daoComentario->listaComentariosDAO($idPeliSerie);
		$coments = array();
		if ($result != NULL){
			for ($i = 0; $i < count($result); $i++){
				array_push($coments, $daoComentario->buscaComentarioDAO($result[$i]));			
			}
		}
		return $coments;
	}
	
}
?>