<?php 

class TOPregunta {
	
		private $pregunta;
		private $fecha;
		private $participantes;
	
		public function __construct(){
			
		}
	
		public function setPregunta($pregunta){
			$this->pregunta = $pregunta;
		}
	
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		
		public function setParticipantes($participantes){
			$this->participantes = $participantes;
		}
		
		public function getPregunta(){
			return $this->pregunta;
		}
	
		public function getFecha(){
			return $this->fecha;
		}
		
		public function getParticipantes(){
			return $this->participantes;
		}
}	
?>