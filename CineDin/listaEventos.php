<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAEvento.php';
	require_once RAIZ_APP.'/includes/TO/TOEvento.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan - Eventos</title>
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
				$listaEventos = SAEvento::listarEventosSA();
				$numero = sizeof($listaEventos);
				if($listaEventos == null || $numero == 0){
					echo "No hay eventos en la base de datos";
				}
				else{
					echo"<tr>";	
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%4==0)echo"</tr><tr>";
						$evento = $listaEventos[$i];
						echo"<td>";
						echo"<div class= 'portada'>";						
						echo "<p><a href = 'vistaEventos.php?variable=" . $evento->getNombreEvento() ."'><img src = " . $evento->getPortadaEvento() . " class = 'portadaLista'></a></br></p>";
						echo "<p><a href = 'vistaEventos.php?variable=" . $evento->getNombreEvento() ."'>" . $evento->getNombreEvento() . "</a></p>";
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