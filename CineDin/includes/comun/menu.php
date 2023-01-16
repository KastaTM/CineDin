<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estiloTabla.css"/>
		<meta charset="utf-8">
		<title>Menu</title>
	</head>
	<body>
		<div id="menu">
			<table>
				<tr>
					<th><a href="index.php">Inicio</a></th>
					<th><a href="listaPeliculas.php">Películas</a></th>
					<th><a href="listaSeries.php">Series</a></th>
					<th><a href="listaEventos.php">Eventos</a></th>
					<th><a href="listaNoticias.php">Noticias</a></th>
					<th><a href="listaPreguntas.php">Foro</a></th>
					<?php
						if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
							if(isset($_SESSION["id"]) && ($_SESSION["admin"]==true)){
								echo "<th><a href='administrar.php'>Administrar</a></th>";
							}	
							$id = $_SESSION["id"];
							echo "<th><a href='vistaPerfil.php?variable=$id'>$id</a></th>";
							echo "<th><a href='logout.php'>Salir</a></th>";
						}
						else {
							echo "<th><a href='login.php'>Login</a></th>";
						}
					?>
					<th><form action="vistaResultados.php" method="get">
						<input type="text" id="searchterm" placeholder="Busca pelicula/serie" name = "search" required />
						<input type="submit" name="aceptar" value="Buscar">
					</form></th>
				</tr>
			</table>
		</div>
	</body>
</html>