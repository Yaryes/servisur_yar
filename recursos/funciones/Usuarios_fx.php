<?php
session_start();
include('../clases/UsuarioCs.php');

if(isset($_POST['btnIngresar']))   {
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $perfil = $_POST['perfil'];
    if (
        empty($rut) || empty($nombre) || empty($apellido) || empty($correo)
        || empty($pass) || empty($pass2) || empty($perfil) || empty($telefono)) {
        $mensaje = "<div class='alert alert-dark h5'>LOS CAMPOS SON OBLIGATORIOS</div>";
        header('location: ../../registro_usuarios.php?msg='.$mensaje);
    } else {
        if ($pass == $pass2) {
            $ArregloFormulario = array(
                'rut' => $rut,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'telefono' => $telefono,
                'pass' => $pass,
                'perfil' => $perfil
            );
            $result = json_decode($usuario->guardarUsuario($ArregloFormulario));
            if ($result->estado == true) {
                header('location: ../../registro_usuarios.php?id='.$result->ultimo.'&msg='.$result->mensaje);
            } else {
                $mensaje = "<div class='alert alert-dark h5'>EL USUARIO YA EXITE</div>";
                header('location: ../../registro_usuarios.php?msg='.$mensaje);
            }
        } else {
            $mensaje = "<div class='alert alert-dark h5'>LAS CONTRASEÑAS NO SON IGUALES</div>";
            header('location: ../../registro_usuarios.php?msg='.$mensaje);
        }
    }
}


if(isset($_POST['btnBuscar']))   {

}
