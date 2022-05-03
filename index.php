<?php


require_once 'Controllers/RutasControlador.php';
require_once 'Controllers/UsuariosControlador.php';
require_once 'Models/RutaModelo.php';
require_once 'Models/UsuarioModelo.php';

$rutas = new RutasControlador();
$rutas->Plantilla();

?>
