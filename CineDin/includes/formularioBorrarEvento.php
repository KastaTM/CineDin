<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioBorrarEvento extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       $resultado = '	<fieldset>
					<legend> Evento que quieres borrar </legend>
					Nombre:			<br><select name="nombre">';
		$resultado .= SAEvento::desplegableEventos();
		$resultado .= '</select>
					<br><input type="submit" name="enviar" value="Borrar"></br>
					</fieldset>';
       return $resultado;
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre del evento no puede estar vacío";
		}
		if(count($errores) == 0){
			 SAEvento::borrarEventoSA($nombre);
			 return 'listaEventos.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>