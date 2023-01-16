<?php 

class TOPelicula {
	
		private $nombre;
		private $estreno;
		private $genero;
		private $duracion;
		private $director;
		private $actores;
		private $descripcion;
		private $portada;
		private $trailer;
	
		public function __construct($nombrePelicula){
			$this->nombre = $nombrePelicula;
		}
	
		public function setNombrePelicula($nombrePelicula){
			$this->nombre = $nombrePelicula;
		}
	
		public function setEstrenoPelicula($estrenoPelicula){
			$this->estreno = $estrenoPelicula;
		}
		
		public function setGeneroPelicula($generoPelicula){
			$this->genero = $generoPelicula;
		}
		
		public function setDuracionPelicula($duracionPelicula){
			$this->duracion = $duracionPelicula;
		}
		
		public function setDirectorPelicula($directorPelicula){
			$this->director = $directorPelicula;
		}
		
		public function setActoresPelicula($actoresPelicula){
			$this->actores = $actoresPelicula;
		}
		
		public function setDescripcionPelicula($descripcionPelicula){
			$this->descripcion = $descripcionPelicula;
		}
		
		public function setPortadaPelicula($portadaPelicula){
			$this->portada = $portadaPelicula;
		}
		
		public function setTrailerPelicula($trailerPelicula){
			$this->trailer = $trailerPelicula;
		}
		
		public function getNombrePelicula(){
			return $this->nombre;
		}
		
		public function getEstrenoPelicula(){
			return $this->estreno;
		}
		
		public function getGeneroPelicula(){
			return $this->genero;
		}
		
		public function getDuracionPelicula(){
			return $this->duracion;
		}
		
		public function getDirectorPelicula(){
			return $this->director;
		}
		
		public function getActoresPelicula(){
			return $this->actores;
		}
		
		public function getDescripcionPelicula(){
			return $this->descripcion;
		}
	
		public function getPortadaPelicula(){
			return $this->portada;
		}
		
		public function getTrailerPelicula(){
			return $this->trailer;
		}
}	
?>