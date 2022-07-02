<?php
require 'ConexionCs.php';
class Acceso extends Conexion{
    function __construct(){
        parent::__construct();
        return $this; 
    }
    public function login (){
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sql = "SELECT id, rut, nombre, apellido, correo, pass, perfil FROM usuario WHERE rut=?";
        //llamamos al metodo de conexion 
        $consulta = $this->prepare($sql);
        $consulta->bind_param('s',$usuario);
        $usuario = $data ['usuario']; 
        $pass = $data ['pass'];
        $this->execute($consulta);
        $consulta->bind_result($id, $rut,  $nombre, $apellido, $correo, $pass_bd, $perfil);
        $consulta->fetch();
        if ($pass==$pass_bd) {
            $info=array(
                'estado' => true,
                'id' => $id,
                'rut' => $rut,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'pass' => $pass,
                'perfil' => $perfil
            );
        }else{
            $info=array(
                'estado'=> false,
                'mensaje'=> '<b>El usuario NO es VALIDO </b>'
            );
        }
        return json_encode($info);
    }
}
$acceso = new Acceso;
