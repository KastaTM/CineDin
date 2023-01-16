<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SANoticia.php';
	require_once RAIZ_APP.'/includes/TO/TONoticia.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan - Noticias</title>
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
				$listaNoticias = SANoticia::listarNoticiasSA();
				$numero = sizeof($listaNoticias);
				if($listaNoticias == null || $numero == 0){
					echo "No hay noticias en la base de datos";
				}
				else{
					echo"<tr>";	
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%3==0)echo"</tr><tr>";
						$noticia = $listaNoticias[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaNoticia.php?variable=" . $noticia->getTitularNoticia() ."'><img src = " . $noticia->getPortadaNoticia() . " class = 'portadaLista'></a></br></p>";
						echo"<p>" . $noticia->getTitularNoticia(). "</p>";
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