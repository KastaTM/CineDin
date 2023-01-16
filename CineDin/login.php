<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAUsuario.php';
	require_once RAIZ_APP.'/includes/TO/TOUsuario.php';
	require_once RAIZ_APP.'/includes/FormularioLogin.php';
	$opciones = array();
	$formulario = new FormularioLogin("formLogin", $opciones);
	$htmlFormulario = $formulario->gestiona();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo-basico.css"/>
		<link rel="stylesheet" type="text/css" href="css/form.css"/>
		<link rel="shortcut icon" href="img/favicon.ico">
		<meta charset="utf-8">
		<title>Login</title>
	</head>
	<body>
		<div id="contenedor">
			<div class = "header">
				<?php
					require("includes/comun/cabecera.php");
				?>
			</div>
			<div id="contenido">
				<?= $htmlFormulario ?>
				<p><a class = 'boton' href = 'registro.php'> Registrarse </a></p>
			</div>			
			<footer>
				<?php
					include("includes/comun/pie.php");
				?>
			</footer>
		</div> 
	</body>
</html>