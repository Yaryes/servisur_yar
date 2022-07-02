<?php
class Conexion{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "tecdatas_servicios";
    protected $conexion;
    protected $secured;
    function __construct()
    {
        $this->conexion= new mysqli($this->server,$this->user,$this->pass,$this->db);
        if($this->conexion->connect_errno){
            die("Error al conectar con MySql: (".$this->conexion->connect_errno.") - ".$this->conexion->connect_errno);
        }
    } 
    public function proteger_text($text){
        $this->secured = strip_tags($text);
        $this->secured = htmlspecialchars(trim(strip_tags($text)),ENT_QUOTES,"UTF-8");
        return $this->secured;
    }
    protected function prepare($consulta){
        if(!($consulta = $this->conexion->prepare($consulta))){
            die("Error al preparar la consulta: (".$this->conexion->connect_errno.") - ".$this->conexion->connect_errno);
        }
        return $consulta;
    }
    protected function execute($sentencia){
        if(!$sentencia->execute()){
            die("Fallo la ejecucion de la consulta: (".$this->conexion->connect_errno.") - ".$this->conexion->connect_errno);
        }
        return $sentencia;
    }
    protected function create_pass($pass){
        return password_hash($pass,PASSWORD_DEFAULT);
    }
}
$conexion = new Conexion;
