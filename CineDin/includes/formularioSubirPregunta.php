<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirPregunta extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos de la pregunta </legend>
					Pregunta:		<br><input type="text" name="pregunta"></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		
		$hoy = date("Y-m-d");
		$pregunta = $_POST['pregunta'];
		if(empty($pregunta)){
			$errores[] = "La pregunta no puede estar vacía";
		}	
		if(count($errores) == 0){
			SAPregunta::anadirPreguntaSA($pregunta,$hoy,0);
			return 'listaPreguntas.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>