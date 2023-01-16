<?php
	require("includes/comun/session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Miembros</title> 
	<link rel="stylesheet" href="css/estilo-basico.css"/>
	<link rel="shortcut icon" href="img/favicon.ico">
</head> 
<body> 
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<table style="width:100%">
			  <tr>
				<td style="width:10%">
					<a id="Roberto"></a><img src="img/miembros/Roberto.jpg" alt="Roberto" class="fotos">
				</td>
				<td style="width:40%">
					<p>Nombre: Roberto Asunción López</p>
					<p>Correo: robeasun@ucm.es</p>
					<p>Aficiones: Jugar al fútbol y cualquier tipo de deporte, escuchar música, salir de fiesta y muy fan de Star Wars.</p>		
				</td>
				<td style="width:10%">
					<a id="Rodrigo"></a><img src="img/miembros/Rodrigo.jpg" alt="Rodrigo" class="fotos">
				</td>
				<td style="width:40%">
					<p>Nombre: Rodrigo Castañón Martínez</p>
					<p>Correo: rcasta02@ucm.es</p>
					<p>Aficiones: La F1, ver series y películas, correr y escuchar rap.</p>
				</td>
			  </tr>			  
			  <tr>
				<td style="width:10%">
					<a id="Iván"></a><img src="img/miembros/Ivan.jpg" alt="Iván" class="fotos">
				</td>
				<td style="width:40%">	
					<p>Nombre: Iván Fernández Gallardo</p>
					<p>Correo: ivfern05@ucm.es</p>
					<p>Aficiones: Me gusta el fútbol, la F1, Motogp.
				</td>
				<td style="width:10%">
					<a id="Julio"></a><img src="img/miembros/Julio.jpg" alt="Julio" class="fotos">
				</td>
				<td style="width:40%">	
					<p>Nombre: Julio Martínez Sánchez</p>
					<p>Correo: juliom04@ucm.es</p>
					<p>Aficiones: Leer, los videojuegos y pasarlo bien con los amigos.</p>
				</td>
			  </tr>
			  <tr>
				<td style="width:10%">
					<a id="María"></a><img src="img/miembros/Maria.jpg" alt="María" class="fotos">
				</td>
				<td style="width:40%">	
					<p>Nombre: María Esmeralda Paniagua Puente</p>
					<p>Correo: marpania@ucm.es</p>
					<p>Aficiones: Comer pizza y comprar ropa.</p>
				</td>
				<td style="width:10%">
					<a id="Raúl"></a><img src="img/miembros/Raul.png" alt="Raúl" class="fotos">
				</td>
				<td style="width:40%">	
					<p>Nombre: Raúl Rincón de Andrés</p>
					<p>Correo: rarincon@ucm.es</p>
					<p>Aficiones: Programar y ver series</p>
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