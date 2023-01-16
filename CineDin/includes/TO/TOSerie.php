<?php

class TOSerie{
	
	private $nombre;
	private $estreno;
	private $genero;
	private $temporadas;
	private $director;
	private $actores;
	private $descripcion;
	private $portada;
	private $trailer;

	public function __construct($nombreSerie){
		$this->nombre = $nombreSerie;
	}

	public function setNombreSerie($nombreSerie){
		$this->nombre = $nombreSerie;
	}
	public function getNombreSerie(){
		return $this->nombre;
	}

	public function setEstrenoSerie($estrenoSerie){
		$this->estreno = $estrenoSerie;
	}
	public function getEstrenoSerie(){
		return $this->estreno;
	}
	
	public function setGeneroSerie($generoSerie){
		$this->genero = $generoSerie;
	}
	public function getGeneroSerie(){
		return $this->genero;
	}
	
	public function setTemporadasSerie($temporadasSerie){
		$this->temporada = $temporadasSerie;
	}
	public function getTemporadasSerie(){
		return $this->temporada;
	}
	
	public function setDirectorSerie($directorSerie){
		$this->director = $directorSerie;
	}
	public function getDirectorSerie(){
		return $this->director;
	}
	
	public function setActoresSerie($actoresSerie){
		$this->actores = $actoresSerie;
	}
	public function getActoresSerie(){
		return $this->actores;
	}
	
	public function setDescripcionSerie($descripcionSerie){
		$this->descripcion = $descripcionSerie;
	}
	public function getDescripcionSerie(){
		return $this->descripcion;
	}
	
	public function setPortadaSerie($portadaSerie){
		$this->portada = $portadaSerie;
	}
	public function getPortadaSerie(){
		return $this->portada;
	}
	
	public function setTrailerSerie($trailerSerie){
		$this->trailer = $trailerSerie;
	}
	public function getTrailerSerie(){
		return $this->trailer;
	}
	
}
?>