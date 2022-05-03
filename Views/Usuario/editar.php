<?php
session_start();

if (!$_SESSION['Ingreso']) {
    header('location:index.php?ruta=ingreso');
    
}
?>

<?php include 'menuNav.php'; ?> 
<br>

<h1>
<span>Editar Usuarios</span>
</h1>
<br>
<form method="post">  
<?php
$editar = new UsuariosControlador();
$editar->EditarUsuario();

$actualizar = new UsuariosControlador();
$actualizar->ActualizarUsuario();
?>
</form>


