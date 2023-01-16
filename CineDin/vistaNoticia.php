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
	<title>Noticias</title>
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
				if(isset($_GET['variable'])){
					$noticia = SANoticia::buscaNoticiaSA($_GET['variable']);
				}
				echo"<div class='vista'>";
				echo"<img src = " . $noticia->getPortadaNoticia() . " class = 'portadaVista'></br>";
				echo "<p>Titular:			". $noticia->getTitularNoticia() . "</br>";
				echo "Fecha de noticia:	" . $noticia->getFechaNoticia() ."</br></p>";
				echo "</div><p>" . $noticia->getDescripcionNoticia() . " </br></p>";
				echo"";
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