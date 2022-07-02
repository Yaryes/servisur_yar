<?php
session_start();
include('../clases/ServicioOperarioCS.php');
if (isset($_POST['btnIngresarServicio'])) {
    // 9 Atributos

    $hora_inicio_servicio = $_POST['hora_inicio_servicio'];
    $hora_final_servicio = $_POST['hora_final_servicio'];
    $lugar_origen = $_POST['lugar_origen'];
    $lugar_destino = $_POST['lugar_destino'];
    $embarcacion = $_POST['embarcacion'];
    $cant_personal = $_POST['cant_personal'];
    $observaciones = $_POST['observaciones'];
    $horas_total = $_POST['horas_total'];
    $horas_extras = $_POST['horas_extras'];
    $id= $_SESSION['user']['id'];
    if (
        empty($hora_inicio_servicio) || empty($hora_final_servicio) || empty($lugar_origen) || 
        empty($lugar_destino) || empty($embarcacion) || empty($cant_personal) || 
        empty($observaciones) || empty($horas_total)
    ) {
        $mensaje = "<div class='alert alert-dark h5'> LOS CAMPOS SON OBLIGATORIOS </div>";
        header('location: ../../operario.php?msg='.$mensaje);
    } else {
        $ArregloRegistroOperario = array(
            'hora_inicio_servicio' => $hora_inicio_servicio,
            'hora_final_servicio' => $hora_final_servicio,
            'lugar_origen' => $lugar_origen,
            'lugar_destino' => $lugar_destino,
            'embarcacion' => $embarcacion,
            'cant_personal' => $cant_personal,
            'observaciones' => $observaciones,
            'horas_total' => $horas_total,
            'horas_extras' => $horas_extras,
            'id' => $id
        );
        $resultadoIngresoServicio = json_decode($servicio_diario->guardarServicioDiario($ArregloRegistroOperario));
      
        $mensaje = "<div class='alert alert-success h5'>Servicio Registrado Correctamente</div>";
        header('location: ../../operario.php?ultimo='.$resultadoIngresoServicio->ultimo.'&msg=' . $mensaje);
    }
}
