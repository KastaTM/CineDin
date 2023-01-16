<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';
require_once RAIZ_APP.'/includes/SA/SAApuntarse.php';


class FormularioApuntarseEvento extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					Apuntarse al evento<br>
					<input type="checkbox" name="condi" value="ok">Si<br>
					<input type="submit" name="enviar" value="Enviar">
				</fieldset>';
 	} 

 	public function procesaFormulario($idEvento){
		SAApuntarse::anadirApuntarseSA($_SESSION["id"], $idEvento);
		return 'vistaEventos.php?variable=' . $idEvento;
    }
	
}
?>