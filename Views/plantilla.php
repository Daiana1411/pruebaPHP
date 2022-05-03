<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>USUARIOS</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>

<body>

<section> 

	<?php
	$rutas = new RutasControlador();
	$rutas->Rutas();
	?>

</section> 

<script src="assets/js/usuarios.js"></script>
	
</body>
</html>