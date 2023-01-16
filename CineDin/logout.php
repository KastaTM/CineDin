<?php
	session_start();
	unset($_SESSION["id"]);
	unset($_SESSION["login"]);
	unset($_SESSION["admin"]);
	$_SESSION["login"] = false;	
	$_SESSION["admin"] = false;	
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<meta charset="utf-8">
		<title>Logout</title>
	</head>
	<body>
		<div id="contenedor">
			<div class = "header">
				<?php
					require("includes/comun/cabecera.php");
				?>
			</div>
			<div id="contenido">
				<?php
					echo "<h2> Ha cerrado la sesion, vuelva pronto</h2>";
				?>
			</div>
			<footer>
				<?php
					include("includes/comun/pie.php");
				?>
			</footer>
		</div>
	</body>
</html>