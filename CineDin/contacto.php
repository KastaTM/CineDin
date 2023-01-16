<?php
	require("includes/comun/session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Contacto</title> 
	<link rel="stylesheet" href="css/estilo-basico.css"/>
	<link rel="stylesheet" href="css/formComentario.css"/>
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
			<form action="mailto:cinedincidanpag@gmail.com" method="post">
				<fieldset>
					<legend>Datos de contacto</legend>
						Nombre:<br> <input type="text" name="nom"><br>
						E-mail:<br> <input type="text" name="mail"><br>
				</fieldset>
				<fieldset>
					<legend>Consulta</legend>
					Motivo de la consulta:<br>
					<input type="radio" name="motcon" value="E">Evaluación <br>
					<input type="radio" name="motcon" value="S">Sugerencias <br>
					<input type="radio" name="motcon" value="C">Crítica <br>
					Consulta:<br>  <textarea name="cons" maxlength="500"></textarea> <br>
					<input type="checkbox" name="condi" value="ok">Marque esta casilla para verificar que ha leído nuestros términos y condiciones del servicio
				</fieldset>
				<input type="submit" name="aceptar">
			</form>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div> 
</body>
</html>