<?php

require_once 'conexionModelo.php';

class UsuarioModelo extends Conectar
{

    public static function ingreso_modelo($data, $base)
    {
        $pdo = Conectar::conexion()->prepare(
            "SELECT usuario, clave FROM $base WHERE usuario = :usuario"
        );
        
        
        $pdo->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    //Registro de Usuarios

    public static function Registrar_usuarios($data, $base)
    {
        $pdo = Conectar::conexion()
            ->prepare("INSERT INTO $base (id, usuario, clave) 
                                            VALUES (:id, :usuario, :clave)");

        $pdo->bindParam(':id', $data['id'], PDO::PARAM_STR);
        $pdo->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
        $pdo->bindParam(':clave', $data['clave'], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return 'Exito';
        } else {
            return 'Error';
        }

        $pdo->close();
    }

    //Mostrar Usuarios

    public static function Mostrar_usuarios($base)
    {
        $pdo = Conectar::conexion()->prepare(
            "SELECT id, usuario, clave FROM $base"
        );

        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
    }

    //Editar Usuario

    public static function Editar_usuario($data, $base)
    {
        $pdo = Conectar::conexion()->prepare("SELECT id, usuario, clave
                                            FROM $base WHERE id = :id");

        $pdo->bindParam(':id', $data, PDO::PARAM_INT);

        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
    }

    //Actualizar Usuario

    public static function Actualizar_usuario($data, $base)
    {
        $pdo = Conectar::conexion()
            ->prepare("UPDATE $base SET usuario = :usuario,
                                                clave = :clave WHERE id = :id");

        $pdo->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $pdo->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
        $pdo->bindParam(':clave', $data['clave'], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return 'Exito';
        } else {
            return 'Error';
        }

        $pdo->close();
    }

    //Borrar Usuario

    public static function Borrar_usuario($data, $base)
    {
        $pdo = Conectar::conexion()->prepare(
            "DELETE FROM $base WHERE id = :id"
        );

        $pdo->bindParam(':id', $data, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return 'Exito';
        } else {
            return 'Error';
        }

        $pdo->close();
    }
}

?>
