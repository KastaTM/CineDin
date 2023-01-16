<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAUsuario.php';
	require_once RAIZ_APP.'/includes/TO/TOUsuario.php';
	require_once RAIZ_APP.'/includes/SA/SAApuntarse.php';
	require_once RAIZ_APP.'/includes/TO/TOApuntarse.php';
	require_once RAIZ_APP.'/includes/SA/SAFavorito.php';
	require_once RAIZ_APP.'/includes/TO/TOFavorito.php';
	require_once RAIZ_APP.'/includes/SA/SASerie.php';
	require_once RAIZ_APP.'/includes/TO/TOSerie.php';
	require_once RAIZ_APP.'/includes/SA/SAPelicula.php';
	require_once RAIZ_APP.'/includes/TO/TOPelicula.php';
	require_once RAIZ_APP.'/includes/SA/SAEvento.php';
	require_once RAIZ_APP.'/includes/TO/TOEvento.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Perfil</title>
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
				if (isset($_GET['variable'])){
					$perfilUsuario = SAUsuario::buscaUsuarioSA($_GET['variable']);
				}

				echo"<div class='vista'>";
				echo"<img src = " . $perfilUsuario->getFotoPerfil() . " class = 'portadaVista'></br>";
				echo "<p>Nick: ". $perfilUsuario->getIdUsuario() . "</br></br>";
				echo "Nombre: " . $perfilUsuario->getNombreUsuario() ."</br></br>";
				echo "Fecha de nacimiento: " . $perfilUsuario->getFechaUsuario() . "</br></br>";
				echo "Correo electrónico: " . $perfilUsuario->getCorreoUsuario() . "</br></br>";
				echo "Nivel: " . $perfilUsuario->getNivelUsuario();
				if (isset($_GET['variable'])){
					if($perfilUsuario->getNivelUsuario() == 'Critico'){
						echo"<img class = 'imagen_nivel' src = img/critico.png ></br>";
					}
					else if($perfilUsuario->getNivelUsuario() == 'Bronce'){
						echo"<img class = 'imagen_nivel' src = img/bronce.jpg ></br>";
					}
					else if($perfilUsuario->getNivelUsuario() == 'Plata'){
						echo"<img class = 'imagen_nivel' src = img/plata.jpg ></br>";
					}
					else if($perfilUsuario->getNivelUsuario() == 'Oro'){
						echo"<img class = 'imagen_nivel' src = img/oro.jpg ></br>";
					}
				}

				echo"</p>";
				echo"</div>";
				
				$listaEventos = SAApuntarse::listarEventosApuntadosSA();
				$numero = sizeof($listaEventos);
				if($listaEventos == null || $numero == 0){
					echo "<p>No estas apuntado a ningun evento</p>";
				}
				else{
					echo"<p>Eventos apuntados</p>";
					echo "<table class='favoritos'>";
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$apuntadoE = $listaEventos[$i];		
						$evento = SAEvento::buscaeventoSA($apuntadoE);
						echo"<td>";
						echo"<div class= 'portada'>";						
						echo "<p><a href = 'vistaEventos.php?variable=" . $apuntadoE ."'><img src = " . $evento->getPortadaEvento() . " class = 'portadaVista'></a></p>";	
						echo"</div>";
						echo"</td>";
					}
					echo "</tr>";
					echo "</table>";
				}
				
				$listaFavoritosP = SAFavorito::listarFavoritosPeliculaSA();
				$numero = sizeof($listaFavoritosP);
				if($listaFavoritosP == null || $numero == 0){
					echo "<p>No tienes ninguna pelicula favorita</p>";
				}
				else{
					echo"<p>Peliculas favoritas</p>";
					echo "<table class='favoritos'>";
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$favoritoP = $listaFavoritosP[$i];	
						$pelicula = SAPelicula::buscaPeliculaSA($favoritoP);
						echo"<td>";
						echo"<div class= 'pelicula'>";						
						echo "<p><a href = 'vistaPelicula.php?variable=" . $favoritoP ."'><img src = " . $pelicula->getPortadaPelicula() . " class = 'portadaLista'></a></p>";	
						echo"</div>";
						echo"</td>";
					}
					echo "</tr>";
					echo "</table>";
				}
				
				$listaFavoritosS = SAFavorito::listarFavoritosSerieSA();
				$numero = sizeof($listaFavoritosS);
				if($listaFavoritosS == null || $numero == 0){
					echo "<p>No tienes ninguna serie favorita</p>";
				}
				else{
					echo"<p>Series favoritas</p>";
					echo "<table class='favoritos'>";
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$favoritoS = $listaFavoritosS[$i];
						$serie = SASerie::buscaSerieSA($favoritoS);
						echo"<td>";
						echo"<div class= 'pelicula'>";
						echo "<p><a href = 'vistaSerie.php?variable=" . $favoritoS ."'><img src = " . $serie->getPortadaSerie() . " class = 'portadaVista'></a></p>";						
						echo"</div>";
						echo"</td>";
					}
					echo "</tr>";
					echo "</table>";
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