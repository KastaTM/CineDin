<?php

class TOApuntarse{
	
	private $idusuario;
	private $idevento;

	public function __construct(){}

	public function setIdUsuario($usuario){
		$this->idusuario = $usuario;
	}
	
	public function getIdUsuario(){
		return $this->idusuario;
	}
	
	public function setIdEvento($evento){
		$this->idevento = $evento;
	}
	public function getIdEvento(){
		return $this->idevento;
	}
	
}
?>