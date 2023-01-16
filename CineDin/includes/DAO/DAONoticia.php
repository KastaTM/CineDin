<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TONoticia.php';


class DAONoticia extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaNoticiaDAO($titularNoticia) {
		$noticia = new TONoticia($titularNoticia);
		$query = "SELECT * FROM noticias  WHERE Titular = '$titularNoticia'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$noticia->setTitularNoticia($rs[0]["Titular"]);
				$noticia->setFechaNoticia($rs[0]["Fecha"]);
				$noticia->setDescripcionNoticia($rs[0]["Descripcion"]);
				$noticia->setPortadaNoticia($rs[0]["Portada"]);
				return $noticia;
			}
		}
		return null;
	}
	
	public function anadirNoticiaDAO($titular,$fecha, $descripcion, $portada){
        $sql = "INSERT INTO noticias (Titular, Fecha, Descripcion, Portada)
		VALUES ('$titular', '$fecha', '$descripcion', '$portada')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarNoticiaDAO($titular){
        $sql = "DELETE From noticias WHERE Titular= '$titular'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarNoticiasDAO(){
		$query = "SELECT * FROM noticias";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Titular']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>