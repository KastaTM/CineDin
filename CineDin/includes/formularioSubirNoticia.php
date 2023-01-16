<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirNoticia extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos de la noticia </legend>
					Titular:		<br><input type="text" name="titular"></br>
					Fecha Noticia:	<br><input type="date" name="fecha"></br>
					Descripción:	<br><textarea name="descripcion" maxlength="2000"></textarea></br>
					Portada:		<br><input type="file" name="imagen"/></br>	
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$portada = $_FILES['imagen']['name'];
		$ruta ="img/portadaNoticias/";
		$portadaFileType = $ruta. strtolower(basename($portada));
		$tempname = $_FILES['imagen']['tmp_name'];
		
		$titular = $_POST['titular'];
		if(empty($titular)){
			$errores[] = "El titular de la noticia no puede estar vacío";
		}
		$fecha = $_POST['fecha'];
		if(empty($fecha)){
			$errores[] = "La fecha de la noticia no puede estar vacía";
		} 
		$descripcion = $_POST['descripcion'];
		if(empty($descripcion)){
			$errores[] = "La descripción de la noticia no puede estar vacía";
		}
		if($portada == NULL){
			$erroresFormulario[] = "La noticia debe tener una portada";
		}		
		if(count($errores) == 0){
			SANoticia::anadirNoticiaSA($titular,$fecha, $descripcion, $portadaFileType);
			move_uploaded_file($tempname, $portadaFileType);
			return 'listaNoticias.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>