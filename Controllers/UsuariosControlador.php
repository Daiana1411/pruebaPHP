<br>
<br>
<?php
//Ingreso de Usuarios
class UsuariosControlador
{

    public function Ingresar()
    {
        if (isset($_POST['usuario_ingreso'])) {
            $data = [
                'usuario' => $_POST['usuario_ingreso'],
                'clave' => $_POST['clave_ingreso']
            ];

            $base = 'persona';

            $respuesta = UsuarioModelo::ingreso_modelo($data, $base);

            if($respuesta['usuario'] == $_POST['usuario_ingreso'])
             {
                 if (password_verify($_POST['clave_ingreso'], $respuesta['clave'])) {
                    
             
                    session_start();
                    $_SESSION['Ingreso'] = true;
                    header('location:index.php?ruta=usuarios');
                } else {
                    echo '<script language="javascript">alert("Error al Ingresar");</script>';
                   
                }
                
            } 
        }
    }

//Muestro los Usuarios

public function MostrarUsuarios()
{
    $base = 'persona';
    $respuesta = UsuarioModelo::Mostrar_usuarios($base);

    foreach ($respuesta as $key => $value) {
        echo '<tr>
             <td>' .
            $value['usuario'] .
            '</td>
            <td hidden>' .
            $value['clave'] .
            '</td>
            <td><a href="index.php?ruta=editar&id=' .
            $value['id'] .
            '"><button center><img src="assets/imagenes/editar.png" alt="editar" class="editar"></button></a>&nbsp;&nbsp;
            <a href="index.php?ruta=usuarios&id_borrar=' . 
            $value['id'] .
            '"><button><img src="assets/imagenes/eliminar.png" class="borrar"</button></a></td>
        </tr>';
    }
}
//Registro los Usuarios

    public function RegistrarUsuarios()
    {
        if (isset($_POST['usuario_registro'])) {
            $clave = $_POST['clave_registro'];
            $clave_codificada = password_hash($clave, PASSWORD_DEFAULT);
            $data = [
                'usuario' => $_POST['usuario_registro'],
                'clave' => $clave_codificada,
                
            ];

            $base = 'persona';
            $respuesta = UsuarioModelo::Registrar_usuarios($data, $base);

            if ($respuesta == 'Exito') {
                header('location:index.php?ruta=usuarios');
            } else {
                echo '<script language="javascript">alert("Error al Registrar un Usuario");</script>';
            }
        }
    }

    //Edito los Usuarios

    public function EditarUsuario()
    {
        $data = $_GET['id'];
        $base = 'persona';
        $respuesta = UsuarioModelo::Editar_usuario($data, $base);

        echo '
            <input type="hidden"  value="' .
            $respuesta['id'] .
            '" name="id_editar">
            <input class="field_class" type="text" placeholder="Usuario" value="' .
            $respuesta['usuario'] .
            '" name="usuario_editar" required>
            <input class="field_class" type="text" placeholder="Ingrese su nueva contraseña aquí..." value="" name="clave_editar" required>
        
            <input class="submit_class" type="submit" value="Actualizar">';
    }

    //Actualizo los Usuarios

    public function ActualizarUsuario()
    {
        if (isset($_POST['usuario_editar'])) {
            $clave = $_POST['clave_editar'];
            $clave_codificada = password_hash($clave, PASSWORD_DEFAULT);
            $data = [
                'id' => $_POST['id_editar'],
                'usuario' => $_POST['usuario_editar'],
                'clave' => $clave_codificada,
            ];

            $base = 'persona';

            $respuesta = UsuarioModelo::Actualizar_usuario($data, $base);

            if ($respuesta == 'Exito') {
                header('location:index.php?ruta=usuarios');
            } else {
                echo '<script language="javascript">alert("Error al cambiar la contraseña");</script>';
            }
        }
    }

    //Elimino los Usuarios

    public function BorrarUsuario()
    {
        if (isset($_GET['id_borrar'])) {
            $data = $_GET['id_borrar'];
            $base = 'persona';
            $respuesta = UsuarioModelo::Borrar_usuario($data, $base);

            if ($respuesta == 'Exito') {
                echo '<script language="javascript">alert("Usuario eliminado correctamente");</script>';
                
            } else {
                echo '<script language="javascript">alert("Error al eliminar usuario");</script>';
            }
        }
    }
}

?>
