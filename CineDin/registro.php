<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/FormularioRegistro.php';
	$opciones = array();
	$formulario = new FormularioRegistro("formRegistro", $opciones);
	$htmlFormulario = $formulario->gestiona();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo-basico.css"/>
		<link rel="stylesheet" type="text/css" href="css/form.css"/>
		<link rel="shortcut icon" href="img/favicon.ico">
		<meta charset="utf-8">
		<title> Registro </title>
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
			</div>
			<footer>
				<?php
					include("includes/comun/pie.php");
				?>
			</footer>
		</div>
	</body>
</html>