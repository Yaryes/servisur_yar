<?php
session_start();
include('../clases/Acceso.php');
if (isset($_POST['btn_login'])){
    $usuario =  $_POST['rut'];
    $password = $_POST['pass'];
    $arregloLogin = array(
        'usuario' => $usuario,
        'pass' => $password
    );
    $IniciodeSession = json_decode($acceso->login($arregloLogin));
    if ($IniciodeSession->estado == true){
        $_SESSION['user']['fullname']= $IniciodeSession->nombre." ". $IniciodeSession->apellido; 
        $_SESSION['user']['id']= $IniciodeSession->id; 
        $_SESSION['user']['nombre']= $IniciodeSession->nombre; 
        $_SESSION['user']['perfil']= $IniciodeSession->perfil; 
        $_SESSION['user']['correo']= $IniciodeSession->correo; 
        $_SESSION['user']['pass']= $IniciodeSession->pass; 
        $_SESSION['user']['rut']= $IniciodeSession->rut; 
   
        //*************************** CAMBIAR IF POR SWITCH PARA MAS PERFILES****************
        if($IniciodeSession->perfil == 'Administrador'){
            header('location:../../administrador.php');
        }else{
         header('location:../../operario.php');   
        }
    }else{
    header('location:../../index.html');
    }
}
?>