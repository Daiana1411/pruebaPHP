<?php
session_destroy();

if (session_destroy) {
    header('location:index.php?ruta=ingreso');
    
}
?>

