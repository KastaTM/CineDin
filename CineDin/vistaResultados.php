<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPelicula.php';
	require_once RAIZ_APP.'/includes/TO/TOPelicula.php';
	require_once RAIZ_APP.'/includes/SA/SASerie.php';
	require_once RAIZ_APP.'/includes/TO/TOSerie.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Resultados</title>
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
				$dato = $_GET['search'];
				$peliculasBuscadas = SAPelicula::busquedaPeliculas($dato);
				$seriesBuscadas = SASerie::busquedaSeries($dato);
				$numero = sizeof($peliculasBuscadas) + sizeof($seriesBuscadas);
				if ($numero == 0){
					echo "No hay películas ni series con ese nombre en la base de datos";
				}else{
					echo"<tr>";
					$contador = 0;
					for ($i = 0; $i < sizeof($peliculasBuscadas); $i++) {
						if($contador !=0 && $contador%5==0)echo"</tr><tr>";
						$pelicula = $peliculasBuscadas[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaPelicula.php?variable=" . $pelicula->getNombrePelicula() ."'><img src = " . $pelicula->getPortadaPelicula() . " class = 'portadaLista'></a></br></p>";
						$contador++;
						echo"</div>";
						echo"</td>";
					}
					for ($i = 0; $i < sizeof($seriesBuscadas); $i++) {
						if($contador !=0 && $contador%5==0)echo"</tr><tr>";
						$serie = $seriesBuscadas[$i];
						echo"<td>";
						echo"<div class= 'pelicula'>";
						echo "<p><a href = 'vistaSerie.php?variable=" . $serie->getNombreSerie() ."'><img src = " . $serie->getPortadaSerie() . " class = 'portadaLista'></a></p>"; 
						$contador++;
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