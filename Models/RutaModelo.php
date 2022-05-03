<?php

class RutaModelo
{
    public static function RutasModelo($ruta)
    {
        if (
            $ruta == 'ingreso' ||  $ruta == 'registrar' || $ruta == 'usuarios' ||  $ruta == 'editar' ||  $ruta == 'salir')
           
        {
            $ventana = 'Views/Usuario/' . $ruta . '.php';
        } elseif ($ruta == 'index') {
            $ventana = 'Views/Usuario/ingreso.php';
        } else {
            $ventana = 'Views/Usuario/ingreso.php';
        }

        return $ventana;
    }
}
