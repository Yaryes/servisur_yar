<?php
require 'ConexionCs.php';
class Vehiculo extends Conexion
{

    function __construct()
    {
        parent::__construct();
        return $this;
    }
          
    public function guardarVehiculoServicio() {
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sqlIngVehiculo = "INSERT INTO vehiculo (idvehiculo, vehiculo, patente, modelo, cant_combustible,
         kilometraje, estado, idservicio_diario) VALUES (NULL,?,?,?,?,?,?,?);";
        $ingresarVehiculo = $this->prepare($sqlIngVehiculo);
            $vehiculo = utf8_decode($data['vehiculo']);
            $patente = utf8_decode($data['patente']);
            $modelo = utf8_decode($data['modelo']);
            $cant_combustible = utf8_decode($data['cant_combustible']);
            $kilometraje = utf8_decode($data['kilometraje']);
            $estado = utf8_decode($data['estado']);
            $idservicio_diario = utf8_decode($data['idservicio_diario']);
          
        $ingresarVehiculo->bind_param('sssisss', $vehiculo, $patente, $modelo, 
        $cant_combustible, $kilometraje, $estado, $idservicio_diario);
      
        $ingresarVehiculo->execute();
 
        $ingresarVehiculo->close();

        $infoIngVehiculo = array(
            'ingreso' => true,
            'idservi' => $idservicio_diario,
            'mensaje' => "<div class='alert alert-primary h5'>VEHICULO REPORTADO CORRECTAMENTE</div>"
        );

        return json_encode($infoIngVehiculo);
    }

}
$vehiculos = new Vehiculo;