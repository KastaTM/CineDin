<?php 

class TONoticia {
	
		private $titular;
		private $fecha;
		private $descripcion;
		private $portada;
	
		public function __construct($titularNoticia){
			$this->titular = $titularNoticia;
		}
	
		public function setTitularNoticia($titularNoticia){
			$this->titular = $titularNoticia;
		}
	
		public function setFechaNoticia($fechaNoticia){
			$this->fecha = $fechaNoticia;
		}
		
		public function setDescripcionNoticia($descripcionNoticia){
			$this->descripcion = $descripcionNoticia;
		}
		
		public function setPortadaNoticia($portadaNoticia){
			$this->portada = $portadaNoticia;
		}
		
		public function getTitularNoticia(){
			return $this->titular;
		}
	
		public function getFechaNoticia(){
			return $this->fecha;
		}
		
		public function getDescripcionNoticia(){
			return $this->descripcion;
		}
		
		public function getPortadaNoticia(){
			return $this->portada;
		}
		
}	
?>