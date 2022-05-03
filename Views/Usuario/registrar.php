<?php
session_start();

if (!$_SESSION['Ingreso']) {
    header('location:index.php?ruta=ingreso');

}
?>
<br>
<?php include 'menuNav.php'; ?> 
<h1>
	<span>Registrar Usuarios</span>
</h1>

<form method="post" action="">
	<div>
		<label>Usuario</label>
		<input class="field_class" type="text" placeholder="Usuario aquí..." name="usuario_registro" required>
	</div>

	<div>
		<label>Contraseña</label>
		<input class="field_class" type="text" name="clave_registro" placeholder="Contraseña aquí..." id="clave_registro" onkeyup="ValidacionUsuarios()" required/>
		<input class="submit_class"  type="submit" value="Registrar">	
	</div>

<?php
$registrar = new UsuariosControlador();
$registrar->RegistrarUsuarios();
?>

