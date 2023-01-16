<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPelicula.php';
	require_once RAIZ_APP.'/includes/TO/TOPelicula.php';
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
	$htmlFormulario = $formulario->gestionaFormularioComentario($_GET['variable'], NULL);
	if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
		$favorito = SAFavorito::buscaFavoritoSA($_SESSION["id"],$_GET['variable'],NULL);
	}
	if(!$favorito){
		$opcionesFav = array();
		$formularioA = new FormularioAnadirFavorito("formAnadirFavorito", $opcionesFav);
		$htmlFormularioA = $formularioA->gestionaFormularioFavorito($_GET['variable'],NULL,false);
	}
	else{
		$opcionesNoFav = array();
		$formularioA = new FormularioEliminarFavorito("formEliminarFavorito", $opcionesNoFav);
		$htmlFormularioA = $formularioA->gestionaFormularioFavorito($_GET['variable'],NULL,true);
	}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Películas</title>
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
					$pelicula = SAPelicula::buscaPeliculaSA($_GET['variable']);
				}
				
				echo "<div class='vista'>";
				echo "<img src = " . $pelicula->getPortadaPelicula() . " class = 'portadaVista'></br>";
				echo "<p>Película:			". $pelicula->getNombrePelicula() . "</br>";
				echo "Fecha de estreno:	" . $pelicula->getEstrenoPelicula() ."</br>";
				echo "Género:			" . $pelicula->getGeneroPelicula() . "</br>";
				echo "Duración:			" . $pelicula->getDuracionPelicula() . " min </br>";
				echo "Director:			" . $pelicula->getDirectorPelicula() . "</br>";
				echo "Actores:			" . $pelicula->getActoresPelicula() . "</br>";
				echo "Descripción:		" . $pelicula->getDescripcionPelicula() . " </br></p>";
				echo "<div class= 'tituloTrailer'>Trailer</div>";
				echo "<video class='trailer' src= ". $pelicula->getTrailerPelicula() . " controls='controls'></video>";
				echo "</div>";
			
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
							echo " Valoracion: ";
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