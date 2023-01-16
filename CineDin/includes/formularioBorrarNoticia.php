<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioBorrarNoticia extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       $resultado = '	<fieldset>
					<legend> Noticia que quieres borrar </legend>
					Nombre:			<br><select name="nombre">';
		$resultado .= SANoticia::desplegableNoticias();
		$resultado .= '</select>
					<br><input type="submit" name="enviar" value="Borrar"></br>
					</fieldset>';
       return $resultado;
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$nombre = $_POST['titular'];
		if(empty($nombre)){
			$errores[] = "El titular de la noticia no puede estar vacío";
		}
		if(count($errores) == 0){
			 SANoticia::borrarNoticiaSA($nombre);
			 return 'listaNoticias.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>