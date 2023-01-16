<?php 

class TOEvento {
	
		private $nombre;
		private $fecha;
		private $descripcion;
		private $limite;
		private $portada;
	
		public function __construct($nombreEvento){
			$this->nombre = $nombreEvento;
		}
	
		public function setNombreEvento($nombreEvento){
			$this->nombre = $nombreEvento;
		}
	
		public function setFechaEvento($fechaEvento){
			$this->fecha = $fechaEvento;
		}
		
		public function setDescripcionEvento($descripcionEvento){
			$this->descripcion = $descripcionEvento;
		}
		
		public function setLimitePersonasEvento($limitePersonasEvento){
			$this->limite = $limitePersonasEvento;
		}
		
		public function setPortadaEvento($portadaEvento){
			$this->portada = $portadaEvento;
		}
		
		public function getNombreEvento(){
			return $this->nombre;
		}
	
		public function getFechaEvento(){
			return $this->fecha;
		}
		
		public function getDescripcionEvento(){
			return $this->descripcion;
		}
		
		public function getLimitePersonasEvento(){
			return $this->limite;
		}
		
		public function getPortadaEvento(){
			return $this->portada;
		}
		
}	
?>