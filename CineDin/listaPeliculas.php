<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPelicula.php';
	require_once RAIZ_APP.'/includes/TO/TOPelicula.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan - Películas</title>
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
				echo "<table class='lista'>";
				$listaPeliculas = SAPelicula::listarPeliculasSA();
				$numero = sizeof($listaPeliculas);
				if($listaPeliculas == null || $numero == 0){
					echo "No hay películas en la base de datos";
				}
				else{
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$pelicula = $listaPeliculas[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaPelicula.php?variable=" . $pelicula->getNombrePelicula() ."'><img src = " . $pelicula->getPortadaPelicula() . " class = 'portadaLista'></a></br></p>"; 
						echo"<p>" . $pelicula->getNombrePelicula(). "</p>";
						echo"</div>";
						echo"</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
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