<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPregunta.php';
	require_once RAIZ_APP.'/includes/TO/TOPregunta.php';
	require_once RAIZ_APP.'/includes/FormularioSubirPregunta.php';
	require_once RAIZ_APP.'/includes/SA/SARespuesta.php';
	require_once RAIZ_APP.'/includes/TO/TORespuesta.php';
	require_once RAIZ_APP.'/includes/FormularioSubirRespuesta.php';
	require_once RAIZ_APP.'/includes/SA/SAUsuario.php';
	require_once RAIZ_APP.'/includes/TO/TOUsuario.php';
	$opciones = array();
	$formulario = new FormularioSubirRespuesta("formAnadirRespuesta", $opciones);
	$htmlFormulario = $formulario->gestionaFormularioRespuesta($_GET['variable']);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Foro</title>
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
					$foro = SAPregunta::buscaPreguntaSA($_GET['variable']);
				}	
				echo "Pregunta:			". $foro->getPregunta() . "</br>";
				echo "Fecha de pregunta:	" . $foro->getFecha() ."</br>";
				
				if(isset($_SESSION['id']) && isset($_SESSION['login'])){
					echo $htmlFormulario ;
				}
				
				$listaComents = SARespuesta::listarRespuestasSA($_GET['variable']);
				$numero = sizeof($listaComents);
				if($listaComents == null || $numero == 0){
					echo "No hay respuestas</br>";
				}
				else{
					SAPregunta::actualizarParticipantesDAO($_GET['variable'],$numero);
					echo"<p>Respuestas: </p>";
					echo"<div>";
					echo"<div class='vistaComentarios'>";
					for ($i = 0; $i < $numero; $i++) {
						$coment = $listaComents[$i];
							
						$perfilUsuario = SAUsuario::buscaUsuarioSA($coment->getIdUsuario());
						echo"<div>";
						echo"<img src = " . $perfilUsuario->getFotoPerfil() . " class='fotoComentarios'>";
						echo "<p>" . $coment->getIdUsuario(). " ";
						if($perfilUsuario->getNivelUsuario() == 'Critico'){
							echo"<img class = 'imagen_nivel' src = img/critico.png>";
						}
						else if($perfilUsuario->getNivelUsuario() == 'Bronce'){
							echo"<img class = 'imagen_nivel' src = img/bronce.jpg>";
						}
						else if($perfilUsuario->getNivelUsuario() == 'Plata'){
							echo"<img class = 'imagen_nivel' src = img/plata.jpg>";
						}
						else if($perfilUsuario->getNivelUsuario() == 'Oro'){
							echo"<img class = 'imagen_nivel' src = img/oro.jpg>";
						}
						echo " " . $coment->getFecha();
						echo"</div>";
						echo "Respuesta: " . $coment->getRespuesta() ."</br>";
						echo "</p>";
					}
					echo"</div>";
					echo"</div>";
				}
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