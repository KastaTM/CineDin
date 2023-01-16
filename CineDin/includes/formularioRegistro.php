<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';
require_once RAIZ_APP.'/includes/SA/SAUsuario.php';
require_once RAIZ_APP.'/includes/TO/TOUsuario.php';


class FormularioRegistro extends Form{

    public static function generaCamposFormulario($datosIniciales){
    	return '<fieldset>
					<legend> Datos del usuario </legend>
					<form method="post" action="procesarRegistro.php">
					Id Usuario:				<br><input type="text" name="id"></br>
					Nombre:					<br><input type="text" name="nombre"></br>
					Fecha de nacimiento:	<br><input type="date" name="nacimiento"></br>
					Correo electrónico:		<br><input type="text" name="email"></br>
					Contraseña:				<br><input type="password" name="contrasena"></br>
					Foto: 					<br><input type="file" name="imagen"/></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
	}

    public function procesaFormulario($datos){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$fn = $_POST['nacimiento'];
		$email = $_POST['email'];
		$contrasenia = $_POST['contrasena'];
		$contrasenia =  password_hash($contrasenia, PASSWORD_BCRYPT, array('cost' => 12) );
		$portada = $_FILES['imagen']['name'];
		$ruta ="img/fotosUsuarios/";
		$tempname = $_FILES['imagen']['tmp_name'];
		if($portada == NULL){
			$portada = "sinfoto.jpg";
		}
		$portadaFileType = $ruta. strtolower(basename($portada));
		SAUsuario::crea($id, $nombre, $contrasenia, $fn, $email, "normal", "Bronce", $portadaFileType);
		move_uploaded_file($tempname, $portadaFileType);
		return 'index.php';
    }
	
}
?>