<?php

require_once __DIR__.'/formulario.php';
require_once __DIR__.'/SA/SAFavorito.php';


class FormularioAnadirFavorito extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					Añadir a Favoritos<br>
					<input type="checkbox" name="condi" value="ok">Si<br>
					<input type="submit" name="enviar" value="Añadir">
				</fieldset>';
 	} 

 	public function procesaFormularioFavorito($idPelicula,$idSerie){
		SAFavorito::anadirFavoritoSA($_SESSION["id"], $idPelicula,$idSerie);
		
		if($idPelicula == NULL){
			return 'vistaSerie.php?variable='. $idSerie;
		}
		else{
			return 'vistaPelicula.php?variable='. $idPelicula;
		}
    }
	
}
?>