<?php
require 'ConexionCs.php';
class Reporte_diario_Faena extends Conexion
{
    function __construct()
    {
        parent::__construct();
        return $this;
    }
    public function guardarReporteFaena(){
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sqlFaenaOperario = "INSERT INTO faenas_reporte (idFaenaReporte, empresa, tipo_de_servicio, enbarcacion, observacion, idservicio_diario)
        VALUES (NULL,?,?,?,?,?);";
        $ingresarReporteFaena = $this->prepare($sqlFaenaOperario);
        $empresa = utf8_decode($data['empresa']);
        $tipo_de_servicio = utf8_decode($data['tipo_de_servicio']);
        $enbarcacion = utf8_decode($data['enbarcacion']);
        $observacion = utf8_decode($data['observacion']);  
        $idservicio_diario = utf8_decode($data['idservicio_diario']);  
        $ingresarReporteFaena->bind_param('sssss', $empresa, $tipo_de_servicio, $enbarcacion, $observacion, $idservicio_diario);
        $ingresarReporteFaena->execute();
        $ingresarReporteFaena->close();
        $infoReporteFaena = array(
            'estado' => true,
            'mensaje' => "<div class='alert alert-primary h5'>REPORTE AGREGADO CORRECTAMENTE</div>", 
        );
        return json_encode($infoReporteFaena);
    }
}
$reporte_diario_Faena = new Reporte_diario_Faena;