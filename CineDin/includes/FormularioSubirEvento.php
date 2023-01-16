<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirEvento extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos del evento </legend>
					Nombre:			<br><input type="text" name="nombre"></br>
					Fecha Evento:	<br><input type="date" name="fecha"></br>
					Descripción: 	<br><input type="text" name="descripcion"></br>
					Limite:			<br><input type="text" name="limite"/></br>
					Portada:		<br><input type="file" name="imagen"/></br>	
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$portada = $_FILES['imagen']['name'];
		$ruta ="img/portadaEventos/";
		$portadaFileType = $ruta. strtolower(basename($portada));
		$tempname = $_FILES['imagen']['tmp_name'];
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre del evento no puede estar vacío";
		}
		$fecha = $_POST['fecha'];
		if(empty($fecha)){
			$errores[] = "La fecha del evento no puede estar vacío";
		} 
		$descripcion = $_POST['descripcion'];
		if(empty($descripcion)){
			$errores[] = "La descripcion del evento no puede estar vacío";
		}
		$limite = $_POST['limite'];
		if(empty($limite)){
			$errores[] = "El limite del evento no puede estar vacía";
		}
		if($portada == NULL){
			$erroresFormulario[] = "El evento debe tener una portada";
		}
		if(count($errores) == 0){
			SAEvento::anadirEventoSA($nombre,$fecha, $descripcion, $limite,  $portadaFileType);
			move_uploaded_file($tempname, $portadaFileType);
			return 'listaEventos.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>