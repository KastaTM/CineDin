<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPregunta.php';
	require_once RAIZ_APP.'/includes/TO/TOPregunta.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan - Preguntas</title>
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
				if(isset($_SESSION['id']) && isset($_SESSION['login'])){
					echo "<p><a class='boton_foro' href = 'subirPregunta.php'> Añadir Pregunta al Foro </a></p>";
				}
				echo "<table class = 'foroPreguntas'>";
				$listaPreguntas = SAPregunta::listarPreguntasSA();
				$numero = sizeof($listaPreguntas);
				if($listaPreguntas == null || $numero == 0){
					echo "No hay preguntas en la base de datos";
				}
				else{
					echo"<tr><td>Preguntas del foro</td>
						<td>Fecha inicio</td>
						<td>Número de respuestas</td></tr>";	
					for ($i = 0; $i < $numero; $i++) {
						$pregunta = $listaPreguntas[$i];		
						echo "<tr><td><a href = 'vistaForo.php?variable=" . $pregunta->getPregunta() ."'>" . $pregunta->getPregunta() . "</a></br></td>";
						echo "<td><p>". $pregunta->getFecha() ."<p></td>";
						echo "<td><p>". $pregunta->getParticipantes() ."<p></td></tr>";
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