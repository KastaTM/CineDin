<?php

require_once __DIR__.'/formulario.php';
require_once __DIR__.'/SA/SAFavorito.php';


class FormularioEliminarFavorito extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					Eliminar Favorito<br>
					<input type="checkbox" name="condi" value="ok">Si<br>
					<input type="submit" name="enviar" value="Eliminar">
				</fieldset>';
 	} 

 	public function procesaFormularioFavorito($idPelicula,$idSerie){
		SAFavorito::eliminarFavoritoSA($_SESSION["id"], $idPelicula,$idSerie);
		
		if($idPelicula == NULL){
			return 'vistaSerie.php?variable='. $idSerie;
		}
		else{
			return 'vistaPelicula.php?variable='. $idPelicula;
		}
    }
	
}
?>