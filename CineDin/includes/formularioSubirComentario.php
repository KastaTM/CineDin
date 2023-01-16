<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirComentario extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend>Inserta tu comentario </legend>
					Valoracion: 	
						<br><input type="radio" name="valoracion" value="1">★
						<br><input type="radio" name="valoracion" value="2">★★
						<br><input type="radio" name="valoracion" value="3">★★★
						<br><input type="radio" name="valoracion" value="4">★★★★
						<br><input type="radio" name="valoracion" value="5">★★★★★</br>
					Comentario:		<br><textarea name="comentario" maxlength="1000"></textarea></br>
					<br><input type="submit" name="enviar" value="Comentar"></br>
				</fieldset>';
 	} 

 	public function procesaFormularioComment($idPelicula, $idSerie){ 
        $errores = array();	
		$comentario = $_POST['comentario'];
		$hoy = date("Y-m-d");
		if(!isset($_POST['valoracion'])){
			$estrellas = 0;
		}
		else{
			$estrellas  = $_POST['valoracion'];
		}
		if(empty($comentario)){
			$errores[] = "El comentario no puede estar vacío";
		}
		if(count($errores) == 0){
			SAComentario::anadirComentarioSA($_SESSION["id"], $hoy, $comentario, $idPelicula, $idSerie, $estrellas);
			if($idSerie == NULL){
				return 'vistaPelicula.php?variable='. $idPelicula;
			}
			else if($idPelicula ==  NULL){
				return 'vistaSerie.php?variable='. $idSerie;
			}
		}
		else{
			return $errores;
		}
    }
	
}
?>