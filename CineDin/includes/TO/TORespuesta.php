<?php 

class TORespuesta {
	
		private $fecha;
		private $idUsuario;
		private $respuesta;
		private $tituloPregunta;
	
		public function __construct(){
			
		}
	
		public function setRespuesta($respuesta){
			$this->respuesta = $respuesta;
		}
	
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		
		public function setTituloPregunta($pregunta){
			$this->tituloPregunta = $pregunta;
		}
		
		public function getRespuesta(){
			return $this->respuesta;
		}
	
		public function getFecha(){
			return $this->fecha;
		}
		
		public function getIdUsuario(){
			return $this->idUsuario;
		}
		
		public function getTituloPregunta(){
			return $this->tituloPregunta;
		}
}	
?>