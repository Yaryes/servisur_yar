<?php
require 'ConexionCs.php';
class Servicio_diario extends Conexion
{
    function __construct()
    {
        parent::__construct();
        return $this;
    }
     
    public function guardarServicioDiario(){
        
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sqlServicioOperario = "INSERT INTO servicio_diario (idservicio_diario, hora_inicio_servicio, hora_final_servicio, lugar_origen, lugar_destino, embarcacion, cant_personal, observaciones, horas_total, horas_extras, id) 
        VALUES (NULL,?,?,?,?,?,?,?,?,?,?);";
    
        $ingresarServicio = $this->prepare($sqlServicioOperario);
            $hora_inicio_servicio = utf8_decode($data['hora_inicio_servicio']);
            $hora_final_servicio = utf8_decode($data['hora_final_servicio']);
            $lugar_origen = utf8_decode($data['lugar_origen']);
            $lugar_destino = utf8_decode($data['lugar_destino']);
            $embarcacion = utf8_decode($data['embarcacion']);
            $cant_personal = utf8_decode($data['cant_personal']);
            $observaciones = utf8_decode($data['observaciones']);
            $horas_total = utf8_decode($data['horas_total']);
            $horas_extras = utf8_decode($data['horas_extras']);
            $id = utf8_decode($data['id']);
        $ingresarServicio->bind_param('ssssssssss', $hora_inicio_servicio, $hora_final_servicio, 
            $lugar_origen, $lugar_destino, $embarcacion, $cant_personal, $observaciones, $horas_total,
            $horas_extras, $id);
        $ingresarServicio->execute();
        $ingresarServicio->close();

        $sqlUltimoServicio = "SELECT MAX(idservicio_diario) AS 'ultimo' FROM servicio_diario;";
        $consultaUltimoServicio = $this->prepare($sqlUltimoServicio);
        $consultaUltimoServicio->execute();
        $consultaUltimoServicio->bind_result($ultimo);
        $consultaUltimoServicio->fetch();
        $consultaUltimoServicio->close();

        $infoServicioDiario = array(
            'estado' => true,
            'mensaje' => "<div class='alert alert-primary h5'>REPORTE AGREGADO CORRECTAMENTE</div>", 
            'ultimo' => $ultimo
        );
        return json_encode($infoServicioDiario);
    }
    public function cargarServicio(){
        $data = (count(func_get_args()) > 0) ? func_get_args()[0] : func_get_args();
        $sqlServicioOperario = "SELECT idservicio_diario, hora_inicio_servicio, hora_final_servicio,
        lugar_origen, lugar_destino, embarcacion, cant_personal, observaciones, horas_total, horas_extras, id 
        FROM servicio_diario WHERE idservicio_diario= ? ";
        $buscarUltimo = $this->prepare($sqlServicioOperario);
        $ultimo = $data['ultimo'];
        $buscarUltimo->bind_param('s', $ultimo); 
        $buscarUltimo->execute();
        $buscarUltimo->bind_result($ultimo, $hora_inicio_servicio, $hora_final_servicio, $lugar_origen, 
        $lugar_destino, $embarcacion, $cant_personal, $observaciones, $horas_total, $horas_extras, $id);
        $buscarUltimo->fetch();
        $buscarUltimo->close();
        if (!empty($ultimo)) {
            $info = array(
                'estado' => true,
                'ultimo' => $ultimo,
                'hora_inicio_servicio' => $hora_inicio_servicio,
                'hora_final_servicio' => $hora_final_servicio,
                'lugar_origen' => $lugar_origen,
                'lugar_destino' => $lugar_destino,
                'embarcacion' => $embarcacion,
                'cant_personal' => $cant_personal,
                'observaciones' => $observaciones,
                'horas_total' => $horas_total,
                'horas_extras'=> $horas_extras,
                'id' => $id
            );
        } else {
            $info = array(
                'estado' => false,
                'mensaje' => "<div class='alert alert-danger'>NO SE HAN REPORTE DIARIOID </div>"
            );
        }
        return json_encode( $info);
    }
}
$servicio_diario = new Servicio_diario;