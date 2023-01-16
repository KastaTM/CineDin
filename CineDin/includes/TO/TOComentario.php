<?php

class TOComentario{
	
		private $id;
		private $nombre;
		private $fecha;
		private $comentario;
		private $idPeli;
		private $idSerie;
		private $valoracion;

		public function __construct(){}
		
		public function setIdComent($idUser){
			$this->id = $idUser;
		}

		public function setIdUsuario($usuario){
			$this->nombre = $usuario;
		}
		public function getIdUsuario(){
			return $this->nombre;
		}

		public function setIdSerie($serie){
			$this->idPeli = $serie;
		}
		public function getIdSerie(){
			return $this->idPeli;
		}
		
		public function setIdPelicula($peli){
			$this->idPeli = $peli;
		}
		public function getIdPeli(){
			return $this->idPeli;
		}
		
		public function setFecha($fech){
			$this->fecha = $fech;
		}
		public function getFecha(){
			return $this->fecha;
		}
		
		public function setComentario($comenta){
			$this->comentario = $comenta;
		}
		public function getComentario(){
			return $this->comentario;
		}
		
		public function setValoracion($valoracion){
			$this->valoracion = $valoracion;
		}
	
		public function getValoracion(){
			return $this->valoracion;
		}
		
}
?>