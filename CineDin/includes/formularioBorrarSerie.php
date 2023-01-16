<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioBorrarSerie extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       $resultado = '	<fieldset>
					<legend> Serie que quieres borrar </legend>
					Nombre:			<br><select name="nombre">';
		$resultado .= SASerie::desplegableSeries();
		$resultado .= '</select>
					<br><input type="submit" name="enviar" value="Borrar"></br>
					</fieldset>';
       return $resultado;
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre de la serie no puede estar vacío";
		}
		if(count($errores) == 0){
			 SASerie::borrarSerieSA($nombre);
			 return 'listaSeries.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>