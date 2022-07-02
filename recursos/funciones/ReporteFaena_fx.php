<?php
session_start();
include('../clases/ReporteFaenaCS.php');

if (isset($_POST['btnIngresoFaena'])) {

    $idservicio_diario = $_POST['idservicio_diario'];   
    $empresa = $_POST['empresa'];
    $tipo_de_servicio = $_POST['tipo_de_servicio'];
    $enbarcacion = $_POST['enbarcacion'];
    $observacion = $_POST['observacion'];
    
    if (
        empty($idservicio_diario) || empty($empresa) || empty($tipo_de_servicio) || empty($enbarcacion) || empty($observacion)
    ) {
        $mensaje = "<div class='alert alert-dark h5'> LOS CAMPOS SON OBLIGATORIOS </div>";
        header('location: ../../faenas.php?msg=' . $mensaje);
    } else {
        $ArregloRegistroFaena = array(
            'idservicio_diario' => $idservicio_diario,
            'empresa' => $empresa,
            'tipo_de_servicio' => $tipo_de_servicio,
            'enbarcacion' => $enbarcacion,
            'observacion' => $observacion
        );

        $resultadoIngresoFaena = json_decode($reporte_diario_Faena->guardarReporteFaena($ArregloRegistroFaena));
        $mensaje = "<div class='alert alert-success h5'>Registro Faena ingresado con Exito</div>";
        header('location: ../../faenas.php?idservi='.$IngVehiculo->idservi.'&msg=' . $mensaje);
    }
}