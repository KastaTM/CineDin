<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirRespuesta extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend>Respuesta: </legend>
					Comentario:		<br><textarea name="comentario" maxlength="1000"></textarea></br>
					<br><input type="submit" name="enviar" value="Comentar"></br>
				</fieldset>';
 	} 

 	public function procesaFormularioRespuesta($tituloPregunta){ 
        $errores = array();	
		$comentario = $_POST['comentario'];
		$hoy = date("Y-m-d");
		if(empty($comentario)){
			$errores[] = "El comentario no puede estar vacío";
		}
		echo"$tituloPregunta";
		if(count($errores) == 0){
			SARespuesta::anadirRespuestaSA($_SESSION["id"], $hoy, $comentario, $tituloPregunta);
			
			return 'vistaForo.php?variable='. $tituloPregunta;
		}
		else{
			return $errores;
		}
    }
	
}
?>