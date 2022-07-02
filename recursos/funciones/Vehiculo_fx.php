<?php
session_start();
include('../clases/VehiculoCs.php');
if (isset($_POST['btnIngresoVehiculo'])) {

    $vehiculo = $_POST['vehiculo'];
    $patente = $_POST['patente'];
    $modelo = $_POST['modelo'];
    $kilometraje = $_POST['kilometraje'];
    $cant_combustible = $_POST['cant_combustible'];
    $idservicio_diario = $_POST['idservicio_diario'];
    $estado = "En terreno";
    if (empty($idservicio_diario)) {
        $mensaje = "<div class='alert alert-dark h5'> Debe ingresar el servicio previamente</div>";
        header('location: ../../operario.php?msg=' .$mensaje);
    } else {

        if (
            empty($vehiculo) || empty($patente) || empty($modelo) ||
            empty($kilometraje) || empty($cant_combustible)
        ) {
            $mensaje = "<div class='alert alert-dark h5'> LOS CAMPOS SON OBLIGATORIOS </div>";
       
            $id = $idservicio_diario;
            header('location: ../../operario.php?id='.$id.'&msg='.$mensaje);
        } else {
            $ArregloIngresoVehiculo = array(
                'idservicio_diario' => $idservicio_diario,
                'vehiculo' => $vehiculo,
                'patente' => $patente,
                'modelo' => $modelo,
                'kilometraje' => $kilometraje,
                'estado' => $estado,
                'cant_combustible' => $cant_combustible
            );

             $IngVehiculo = json_decode($vehiculos->guardarVehiculoServicio($ArregloIngresoVehiculo));
            
            $mensaje = "<div class='alert alert-success h5'>Vehiculo Ingresado Correctamente</div>";
            header('location: ../../faenas.php?idservi='.$IngVehiculo->idservi.'&msg='.$mensaje);
        }
    }
}
