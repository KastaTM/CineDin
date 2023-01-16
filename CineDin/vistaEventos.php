<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAEvento.php';
	require_once RAIZ_APP.'/includes/SA/SAApuntarse.php';
	require_once RAIZ_APP.'/includes/TO/TOEvento.php';
	require_once RAIZ_APP.'/includes/FormularioApuntarseEvento.php';
	require_once RAIZ_APP.'/includes/FormularioDesapuntarseEvento.php';
	if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
		$apuntado = SAApuntarse::buscaApuntarseSA($_SESSION["id"],$_GET['variable']);
		if(!$apuntado){
			$opciones = array();
			$formularioA = new FormularioApuntarseEvento("formApuntarseEvento", $opciones);
			$htmlFormularioA = $formularioA->gestionaFormularioApuntarseEvento($_GET['variable'], false);
		}
		else{
			$opciones = array();
			$formularioB = new FormularioDesapuntarseEvento("formDesapuntarseEvento", $opciones);
			$htmlFormularioB = $formularioB->gestionaFormularioApuntarseEvento($_GET['variable'], true);
		}
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Eventos</title>
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
					$evento = SAEvento::buscaEventoSA($_GET['variable']);				
				}
				echo"<div class='vista'>";
				echo"<img src = " . $evento->getPortadaEvento() . " class = 'portadaVista'></br>";
				echo "<p>Nombre evento: ". $evento->getNombreEvento() . "</br>";
				echo "Fecha evento:". $evento->getFechaEvento() . "</br>";
				echo "Descripción evento". $evento->getDescripcionEvento() . "</br>";
				echo "Límite personas:". $evento->getLimitePersonasEvento() . "</br></p>";
				echo "</div>";
				$listaApuntados = SAApuntarse::listarUsuariosApuntadosSA($_GET['variable']);
				$numero = sizeof($listaApuntados);
				
				if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
					$apuntado = SAApuntarse::buscaApuntarseSA($_SESSION["id"],$_GET['variable']);
					if(!$apuntado && $numero < $evento->getLimitePersonasEvento()){
						echo $htmlFormularioA;					
					}
					else if($apuntado){					
						echo $htmlFormularioB;
					}
				}
					
				if($listaApuntados == null || $numero == 0){
					echo "No hay personas apuntadas al evento</br>";
				}
				else{
					echo"Personas apuntadas</br>";					
					for ($i = 0; $i < $numero; $i++) {
						$nombre = $listaApuntados[$i];		
						echo "$nombre</br>";
					}
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