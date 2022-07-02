<?php
  
function obtenerEquipos(){
 
 include '../clases/ConexionCs.php';
   
 
    // $query = "SELECT * FROM equipo"; 
    // $resultado = mysqli_query( $conexion , $query);

    // $json = array();
    // while ($row = mysqli_fetch_all($resultado)) {
    //     $json[] = array(
    //         'idequipos' => $row['idequipo'],
    //         'nombre_equipos' => $row['nombre_equipo']
    //     );
    // }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}
    obtenerEquipos();
?>