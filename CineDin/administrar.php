<?php
	require("includes/comun/session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Administrar</title>
</head>
<body>
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<div class = 'admin'>
				<h3 class = "titulosIndex">Películas</h3>
					<p><a class='boton_admin' href = 'subirPelicula.php'> Añadir Película </a>
					<a class='boton_admin' href = 'borrarPelicula.php'> Borrar Película </a></p></br>
				<h3 class = "titulosIndex">Series</h3>
					<p><a class='boton_admin' href = 'subirSerie.php'> Añadir Serie</a>
					<a class='boton_admin' href = 'borrarSerie.php'> Borrar Serie </a></p></br>
				<h3 class = "titulosIndex">Eventos</h3>
					<p><a class='boton_admin' href = 'subirEvento.php'> Añadir Evento </a>
					<a class='boton_admin' href = 'borrarEvento.php'> Borrar Evento </a></p></br>
				<h3 class = "titulosIndex">Noticias</h3>
					<p><a class='boton_admin' href = 'subirNoticia.php'> Añadir Noticia </a>
					<a class='boton_admin' href = 'borrarNoticia.php'> Borrar Noticia </a></p></br>
			</div>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>