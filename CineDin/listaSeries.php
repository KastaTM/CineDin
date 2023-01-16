<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SASerie.php';
	require_once RAIZ_APP.'/includes/TO/TOSerie.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan - Series</title>
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
				$listaSeries = SASerie::listarSeriesSA();
				$numero = sizeof($listaSeries);
				if($listaSeries == null || $numero == 0){
					echo "No hay series en la base de datos";
				}
				else{
					echo"<tr>";	
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$serie = $listaSeries[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaSerie.php?variable=" . $serie->getNombreSerie() ."'><img src = " . $serie->getPortadaSerie() . " class = 'portadaLista'></a></br></p>"; 
						echo"<p>" . $serie->getNombreSerie(). "</p>";
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