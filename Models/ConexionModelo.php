<?php
class Conectar 
{
    public static function conexion() { 

    try {
    
        
            $conexion = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');

            $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           

        }catch(Exception $e) {

            die("Error" . $e->getMessage());
            echo "Linea del error" . $e->getLine();

        }
        return $conexion;
    }    
}


?>
