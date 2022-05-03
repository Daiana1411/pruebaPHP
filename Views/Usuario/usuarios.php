<?php
session_start();

if (!$_SESSION['Ingreso']) {
    header('location:index.php?ruta=ingreso');

}
?>

<br>
<?php include 'menuNav.php'; ?> 



<h1>
	<span>Tabla de Usuarios</span>
</h1>
<br>
<table class="tabla" id="usuarios" >		
	<thead>			
		<tr>
			
			<th>Usuarios</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
			
<?php
$mostrar = new UsuariosControlador();
$mostrar->MostrarUsuarios();
?>
	</tbody>
	</table>
	
<?php
$eliminar = new UsuariosControlador();
$eliminar->BorrarUsuario();
?>

