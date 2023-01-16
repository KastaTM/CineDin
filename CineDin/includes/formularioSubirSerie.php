<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirSerie extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos de la serie </legend>
					Nombre:			<br> <input type="text" name="nombre"></br> 
					Fecha Estreno:	<br><input type="date" name="estreno"></br> 
					Genero: 		<br> <input type="text" name="genero"></br> 
					Nª de Temporadas:  <br><input type="integer	" name="temporadas"></br>
					Director: 		<br><input type="text" name="director"></br>
					Actores:		<br><textarea name="actores" maxlength="2000"></textarea></br>
					Descipción:		<br><textarea name="descripción" maxlength="5000"></textarea></br>
					Trailer:		<br><input type="file" name="trailer"></br>
					Portada:		<br><input type="file" name="imagen"/><br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$portada = $_FILES['imagen']['name'];
		$ruta ="img/portadaSeries/";
		$portadaFileType = $ruta. strtolower(basename($portada));
		$tempname = $_FILES['imagen']['tmp_name'];
		$trailer = $_FILES['trailer']['name'];
		$rutatrailer ="img/trailers/";
		$trailerFileType = $rutatrailer. strtolower(basename($trailer));
		$tempnametrailer = $_FILES['trailer']['tmp_name'];

		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre de la serie no puede estar vacío";
		}
		$estreno = $_POST['estreno'];
		if(empty($estreno)){
			$errores[] = "El estreno de la serie no puede estar vacío";
		}
		$genero = $_POST['genero'];
		if(empty($genero)){
			$errores[] = "El género de la serie no puede estar vacío";
		}
		$temporadas = $_POST['temporadas'];
		if(empty($temporadas)){
			$errores[] = "El número de temporadas de la serie no puede estar vacío";
		}
		$director = $_POST['director'];
		if(empty($director)){
			$errores[] = "El director de la serie no puede estar vacío";
		}
		$actores = $_POST['actores'];
		if(empty($actores)){
			$errores[] = "Los actores de la serie no pueden estar vacío";
		}
		$descripcion = $_POST['descripción'];
		if(empty($descripcion)){
			$errores[] = "La descripción de la serie no puede estar vacía";
		}
		if($portada == NULL){
			$erroresFormulario[] = "La serie debe tener una portada";
		}
		if($trailer == NULL){
			$erroresFormulario[] = "La serie debe tener un trailer";
		}
		if(count($errores) === 0) {
			SASerie::anadirSerieSA($nombre,$estreno, $genero, $temporadas, $director, $actores, $descripcion, $portadaFileType, $trailerFileType);
			move_uploaded_file($tempname, $portadaFileType);
			move_uploaded_file($tempnametrailer, $trailerFileType);
			return 'listaSeries.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>