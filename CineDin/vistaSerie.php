<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SASerie.php';
	require_once RAIZ_APP.'/includes/TO/TOSerie.php';
	require_once RAIZ_APP.'/includes/SA/SAUsuario.php';
	require_once RAIZ_APP.'/includes/TO/TOUsuario.php';
	require_once RAIZ_APP.'/includes/SA/SAComentario.php';
	require_once RAIZ_APP.'/includes/TO/TOComentario.php';
	require_once RAIZ_APP.'/includes/SA/SAFavorito.php';
	require_once RAIZ_APP.'/includes/TO/TOFavorito.php';
	require_once RAIZ_APP.'/includes/FormularioSubirComentario.php';
	require_once RAIZ_APP.'/includes/FormularioAnadirFavorito.php';
	require_once RAIZ_APP.'/includes/FormularioEliminarFavorito.php';
	
	$opciones = array();
	$favorito = NULL;
	$formulario = new FormularioSubirComentario("formAnadirComentario", $opciones);
	$htmlFormulario = $formulario->gestionaFormularioComentario(NULL, $_GET['variable']);
	if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
		$favorito = SAFavorito::buscaFavoritoSA($_SESSION["id"],NULL,$_GET['variable']);
	}
	if(!$favorito){
		$opcionesFav = array();
		$formularioA = new FormularioAnadirFavorito("formAnadirFavorito", $opcionesFav);
		$htmlFormularioA = $formularioA->gestionaFormularioFavorito(NULL,$_GET['variable'],false);
	}
	else{
		$opcionesNoFav = array();
		$formularioA = new FormularioEliminarFavorito("formEliminarFavorito", $opcionesNoFav);
		$htmlFormularioA = $formularioA->gestionaFormularioFavorito(NULL,$_GET['variable'],true);
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css"/>
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Series</title>
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
					$serie = SASerie::buscaSerieSA($_GET['variable']);
				}

				echo"<div class='vista'>";				
				echo"<img src = " . $serie->getPortadaSerie() . " class = 'portadaVista'></br>";
				echo "<p>Serie: 			". $serie->getNombreSerie() . "</br>";
				echo "Fecha de estreno:	" . $serie->getEstrenoSerie() ."</br>";
				echo "Género: 			" . $serie->getGeneroSerie() . "</br>";
				echo "Temporadas:		" . $serie->getTemporadasSerie() . "</br>";
				echo "Director:			" . $serie->getDirectorSerie() . "</br>";
				echo "Actores:			" . $serie->getActoresSerie() . "</br>";
				echo "Descripción:		" . $serie->getDescripcionSerie() . " </br></p>";
				echo "<div class= 'tituloTrailer'>Trailer</div>";
				echo"<video class='trailer' src= ". $serie->getTrailerSerie() . " controls='controls'></video>";
				echo"</div>";
					
				if(isset($_SESSION['id']) && isset($_SESSION['login'])){
					echo $htmlFormulario;
					echo $htmlFormularioA;
				}
				

				$listaComents = SAComentario::listarComentariosSA($_GET['variable']);
				$numero = sizeof($listaComents);
				if($listaComents == null || $numero == 0){
					echo "No hay valoraciones</br>";
				}
				else{
					$suma = 0;
					for ($i = 0; $i < $numero; $i++) {
						$coment = $listaComents[$i];
						$star = $coment->getValoracion();
						$suma = $suma + $star;
					}
					$media = $suma/$numero;
					echo"<p>Valoracion media: ". $media. "/5";
					echo "</p>";
				}
				

				$listaComents = SAComentario::listarComentariosSA($_GET['variable']);
				$numero = sizeof($listaComents);
				if($listaComents == null || $numero == 0){
					echo "No hay comentarios</br>";
				}
				else{
					echo"<p>Comentarios</p>";
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
						echo " " . $coment->getFecha() . " ";
						$star = $coment->getValoracion();
						echo "Valoracion: ";
						for($j = 0; $j < $star; $j++){
							echo "★";
						}
						echo"</div>";
						echo "Comentario: " . $coment->getComentario() ."</br>";
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