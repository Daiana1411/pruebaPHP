<?php

class RutasControlador{
    public function Plantilla(){

        include"Views/plantilla.php";
    }

    public function Rutas(){
        if(isset($_GET["ruta"])){
            $ruta = $_GET["ruta"];
            
        }else{
            $ruta = "index";
        }

        $respuesta = RutaModelo::RutasModelo($ruta);
        
        include $respuesta;
    }
}