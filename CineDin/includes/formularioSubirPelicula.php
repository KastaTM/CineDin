<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirPelicula extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos de la película </legend>
					Nombre:			<br><input type="text" name="nombre"></br>
					Fecha Estreno:	<br><input type="date" name="estreno"></br>
					Genero:			<br><input type="text" name="genero"></br>
					Duración:		<br><input type="text" name="duracion"></br>
					Director:		<br><input type="text" name="director"></br>
					Actores:		<br><textarea name="actores" maxlength="2000"></textarea></br>
					Descripción: 	<br><textarea name="descripción" maxlength="5000"></textarea></br>
					Trailer:		<br><input type="file" name="trailer"></br>
					Portada:		<br><input type="file" name="imagen"/></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$portada = $_FILES['imagen']['name'];
		$ruta ="img/portadaPeliculas/";
		$portadaFileType = $ruta. strtolower(basename($portada));
		$tempname = $_FILES['imagen']['tmp_name'];
		$trailer = $_FILES['trailer']['name'];
		$rutatrailer ="img/trailers/";
		$trailerFileType = $rutatrailer. strtolower(basename($trailer));
		$tempnametrailer = $_FILES['trailer']['tmp_name'];
		
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre de la película no puede estar vacío";
		}
		$estreno = $_POST['estreno'];
		if(empty($estreno)){
			$errores[] = "El estreno de la película no puede estar vacío";
		} 
		$genero = $_POST['genero'];
		if(empty($genero)){
			$errores[] = "El género de la película no puede estar vacío";
		}
		$duracion = $_POST['duracion'];
		if(empty($duracion)){
			$errores[] = "La duración de de la película no puede estar vacía";
		}
		$director = $_POST['director'];
		if(empty($director)){
			$errores[] = "El director de la película no puede estar vacío";
		}
		$actores = $_POST['actores'];
		if(empty($actores)){
			$errores[] = "Los actores de la película no puede estar vacío";
		}
		$descripcion = $_POST['descripción'];
		if(empty($descripcion)){
			$errores[] = "La descripción de la película no puede estar vacío";
		}				
		if($portada == NULL){
			$erroresFormulario[] = "La película debe tener una portada";
		}
		if($trailer == NULL){
			$erroresFormulario[] = "La película debe tener un trailer";
		}
		if(count($errores) == 0){
			SAPelicula::anadirPeliculaSA($nombre,$estreno, $genero, $duracion, $director, $actores, $descripcion, $portadaFileType, $trailerFileType);
			move_uploaded_file($tempname, $portadaFileType);
			move_uploaded_file($tempnametrailer, $trailerFileType);
			return 'listaPeliculas.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>