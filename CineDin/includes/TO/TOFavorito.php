<?php

class TOFavorito{
	
	private $idusuario;
	private $idpelicula;
	private $idserie;

	public function __construct(){}

	public function setIdUsuario($usuario){
		$this->idusuario = $usuario;
	}
	public function getIdUsuario(){
		return $this->idusuario;
	}
	
	public function setIdPelicula($pelicula){
		$this->idpelicula = $pelicula;
	}
	public function getIdZapatilla(){
		return $this->idpelicula;
	}
	
	public function setIdSerie($serie){
		$this->idserie = $serie;
	}
	public function getIdSerie(){
		return $this->idserie;
	}
}
?>