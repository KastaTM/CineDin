<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioLogin extends Form{

 	public static function generaCamposFormulario($datosIniciales){
		return '<fieldset>
					<legend> Datos del usuario </legend>
					<form method="post" action="procesarLogin.php">
					Nombre: 		<br><input type="text" name="nombre"></br>
					Contraseña:		<br><input type="password" name="contrasena"></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	}

 	public function procesaFormulario($datos){
        $username = htmlspecialchars(trim(strip_tags($_POST["nombre"])));
		$password = htmlspecialchars(trim(strip_tags($_POST["contrasena"])));
		$logueado = SAUsuario::login($username, $password);
		if($logueado != null){
			$_SESSION["id"] = $username;
			$_SESSION["login"] = true;
		}
		else{
			$_SESSION["login"] = false;	
		}
		return 'index.php';
    }
	
}
?>