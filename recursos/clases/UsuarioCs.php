<?php
require 'ConexionCs.php';

class Usuario extends Conexion
{
    function __construct()
    {
        parent::__construct();
        return $this;
    }
    // public function cargar(){

    // }
    public function guardarUsuario()
    {   
        // VERIFICACION SI EXISTE UN USUARIO CON UN CORREO 
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sqlCuantos = "SELECT COUNT(usuario.id) AS 'cuantos' FROM usuario WHERE usuario.correo=?";
        $consultaCuantos = $this->prepare($sqlCuantos);
        $correo = $data['correo'];
        $consultaCuantos->bind_param('s', $correo);
        $consultaCuantos->execute();
        $consultaCuantos->bind_result($cuantosResultado);
        $consultaCuantos->fetch();
        $consultaCuantos->close();
        // AGREGAMOS EL NUEVO REPORTE
        if ($cuantosResultado == 0) {
            $sqlIngresar = "INSERT INTO usuario (id, rut, nombre, apellido, correo, telefono, pass, perfil) 
                VALUES (NULL,?,?,?,?,?,?,?);";
            $ingresarUser = $this->prepare($sqlIngresar);
            $rut = utf8_decode($data['rut']);
            $nombre = utf8_decode($data['nombre']);
            $apellido = utf8_decode($data['apellido']);
            $correo = utf8_decode($data['correo']);
            $telefono = utf8_decode($data['telefono']);
            $pass = utf8_decode($data['pass']);
            // $claveHash = $this->create_pass($pass);
            $perfil = utf8_decode($data['perfil']);
            $ingresarUser->bind_param('sssssss', $rut, $nombre, $apellido, $correo, $telefono, $pass, $perfil);
            $ingresarUser->execute();
            $ingresarUser->close();
            //NUEVA CONSUKTA
            $sqlUltimo = "SELECT MAX(id) AS ultimo FROM usuario;";
            $consultaUltimo = $this->prepare($sqlUltimo);
            $consultaUltimo->execute();
            $consultaUltimo->bind_result($ultimo);

            $consultaUltimo->fetch();
            $consultaUltimo->close();
            $info = array(
                'estado' => true,
                'mensaje' => "<div class='alert alert-primary h5'>USUARIO AGREGADO CORRECTAMENTE</div>", 
                 'ultimo' => $ultimo
            );
        } else {
            $info = array(
                'estado' => false
            );
        }
        return json_encode($info);
        }
}
    
//CREAMOS NUESTRO NUEVO OBJETO
$usuario = new Usuario;
