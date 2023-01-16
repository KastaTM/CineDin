<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAPelicula.php';
	require_once RAIZ_APP.'/includes/TO/TOPelicula.php';
	require_once RAIZ_APP.'/includes/SA/SAComentario.php';
	require_once RAIZ_APP.'/includes/TO/TOComentario.php';
	require_once RAIZ_APP.'/includes/SA/SASerie.php';
	require_once RAIZ_APP.'/includes/TO/TOSerie.php';
	require_once RAIZ_APP.'/includes/SA/SAPregunta.php';
	require_once RAIZ_APP.'/includes/TO/TOPregunta.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>CineDin-Cidan</title>
</head>

<body>
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<table class='mejores'>
				<tr>
					<td>
						<h3 class = "titulosIndex">Película mejor valorada</h3>
					</td>
					<td>
						<h3 class = "titulosIndex">Película más comentada</h3>
					</td>
					<td>
						<h3 class = "titulosIndex">Serie mejor valorada</h3>
					</td>
					<td>
						<h3 class = "titulosIndex">Serie más comentada</h3>
					</td>
				</tr>
				<tr>
					<td>
					<?php
						$listaPeliculas = SAPelicula::listarPeliculasSA();
						$contPeliculas = sizeof($listaPeliculas);
						$mejorMedia = -1;
						$mejorPelicula = NULL;
						if($listaPeliculas == null || $contPeliculas == 0){
							echo "No hay mejor peli valorada";
						}
						else{
							for ($i = 0; $i < $contPeliculas; $i++) {
								$pelicula = $listaPeliculas[$i];
								$comentariosPelicula = SAComentario::listarComentariosSA($pelicula->getNombrePelicula());
								$cont = count($comentariosPelicula);
								if($cont > 0){
									$suma = 0;
									for($j = 0; $j < $cont; $j++){
										$suma += $comentariosPelicula[$j]->getValoracion();
									}
									$media = ($suma/$cont);
									if($media > $mejorMedia){
										$mejorMedia = $media;
										$mejorPelicula = $pelicula;
									}
								}
							}
							echo "<a href = 'vistaPelicula.php?variable=" . $mejorPelicula->getNombrePelicula() ."'><img src = " . $mejorPelicula->getPortadaPelicula() . " class = 'portadaVista'></a></br>";
							echo"Media: ". $mejorMedia . " ★";
						}
					?>
					</td>
					<td>
					<?php
						$listaPeliculas = SAPelicula::listarPeliculasSA();
						$contPeliculas = sizeof($listaPeliculas);
						$masComentarios = -1;
						$peliculaMasComentada = NULL;
						if($listaPeliculas == null || $contPeliculas == 0){
							echo "No hay mejor peli valorada";
						}
						else{
							for ($i = 0; $i < $contPeliculas; $i++) {
								$pelicula = $listaPeliculas[$i];
								$comentariosPelicula = SAComentario::listarComentariosSA($pelicula->getNombrePelicula());
								$numeroComentariosPelicula = sizeof($comentariosPelicula);
								if($numeroComentariosPelicula > 0){
									if($numeroComentariosPelicula > $masComentarios){
										$masComentarios = $numeroComentariosPelicula;
										$peliculaMasComentada = $pelicula;
									}
								}
							}
							echo "<a href = 'vistaPelicula.php?variable=" . $peliculaMasComentada->getNombrePelicula() ."'><img src = " . $peliculaMasComentada->getPortadaPelicula() . " class = 'portadaVista'></a></br>";
							echo "Comentarios: " . $masComentarios . ""; 
						}
					?>
					</td>
					<td>
					<?php
						$listaSeries = SASerie::listarSeriesSA();
						$contSeries = sizeof($listaSeries);
						$mejorMedia = -1;
						$mejorSerie = NULL;
						if($listaPeliculas == null || $contSeries == 0){
							echo "No hay mejor peli valorada";
						}
						else{
							for ($i = 0; $i < $contSeries; $i++) {
								$serie = $listaSeries[$i];
								$comentariosSerie = SAComentario::listarComentariosSA($serie->getNombreSerie());
								$cont = sizeof($comentariosSerie);
								if($cont > 0){
									$suma = 0;
									for($j = 0; $j < $cont; $j++){
										$suma += $comentariosSerie[$j]->getValoracion();
									}
									$media = ($suma/$cont);
									if($media > $mejorMedia){
										$mejorMedia = $media;
										$mejorSerie = $serie;
									}
								}
							}
							echo "<a href = 'vistaSerie.php?variable=" . $mejorSerie->getNombreSerie() ."'><img src = " . $mejorSerie->getPortadaSerie() . " class = 'portadaVista'></a></br>";
							echo"Media: ". $mejorMedia . " ★";
						}
					?>
					</td>
					<td>
					<?php
						$listaSeries = SASerie::listarSeriesSA();
						$contSeries = sizeof($listaSeries);
						$masComentarios = -1;
						$serieMasComentada = NULL;
						if($listaSeries == null || $contSeries == 0){
							echo "No hay mejor peli valorada";
						}
						else{
							for ($i = 0; $i < $contSeries; $i++) {
								$serie = $listaSeries[$i];
								$comentariosSerie = SAComentario::listarComentariosSA($serie->getNombreSerie());
								$numeroComentariosSerie = sizeof($comentariosSerie);
								if($numeroComentariosSerie > 0){
									if($numeroComentariosSerie > $masComentarios){
										$masComentarios = $numeroComentariosSerie;
										$serieMasComentada = $serie;
									}
								}
							}
							echo "<a href = 'vistaSerie.php?variable=" . $serieMasComentada->getNombreSerie() ."'><img src = " . $serieMasComentada->getPortadaSerie() . " class = 'portadaVista'></a></br>";
							echo "Comentarios: " . $masComentarios . ""; 
						}
					?>
					</td>
				</tr>
			</table>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>