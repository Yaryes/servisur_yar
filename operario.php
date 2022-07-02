<?php
session_start();
if ($_SESSION['user']['rut'] != null) {
    include('recursos/clases/ServicioOperarioCS.php');
    include('template/header.php');
    include('template/nav/menu_operario.php');
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    } else {
        $msg = "";
    }

    if (isset($_GET['ultimo'])) {
        // include('recursos/clases/ServicioOperarioCS.php');
        $ultimo = $_GET['ultimo'];
        $params = array(
            'ultimo' => $ultimo
        );

        $ultimo_servicioDiario = json_decode($servicio_diario->cargarServicio($params));

        //LLENAR LOS DATOS QUE CARGAN AL INGRESAR
        if ($ultimo_servicioDiario->estado == true) {
            $idservicio_diario  = $ultimo_servicioDiario->ultimo;
            $hora_inicio_servicio  = $ultimo_servicioDiario->hora_inicio_servicio;
            $hora_final_servicio  = $ultimo_servicioDiario->hora_final_servicio;
            $lugar_origen  = $ultimo_servicioDiario->lugar_origen;
            $lugar_destino  = $ultimo_servicioDiario->lugar_destino;
            $embarcacion  = $ultimo_servicioDiario->embarcacion;
            $cant_personal  = $ultimo_servicioDiario->cant_personal;
            $observaciones  = $ultimo_servicioDiario->observaciones;
            $horas_total  = $ultimo_servicioDiario->horas_total;
            $horas_extras  = $ultimo_servicioDiario->horas_extras;
        }
    } else {
        // CUANDO LLEGUEN VACIOS
        $idservicio_diario  = "";
        $hora_inicio_servicio  = "";
        $hora_final_servicio  = "";
        $lugar_origen  = "";
        $lugar_destino  = "";
        $embarcacion  = "";
        $cant_personal  = "";
        $observaciones  = "";
        $horas_total  = "";
        $horas_extras  = "";
    }

    if (isset($_GET['id'])) {
        $idservicio_diario = $_GET['id'];
    } else {
        $idservicio_diario = "";
    }
    echo $msg;
?>
    <!--REPORTE-->

    <div class="container shadow-lg">
        <div class="row mt-3 ">
            <div class="card col-12 bg-white p-3">
                <h2><u><?php echo '' . $_SESSION['user']['perfil']; ?></u></h2>
                <div class="row mt-2">
                    <div class="col-12">
                        <h5> <?php echo 'Nombre: ' . $_SESSION['user']['fullname']; ?> </h5>
                        <h5> <?php echo 'Correo: ' . $_SESSION['user']['correo']; ?> </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container shadow-lg">
        <form action="recursos/funciones/ServicioOperario_fx.php" method="post">
            <div class="row mt-4">
                <div class="card col-12 bg-white">
                    <!-- INICIO DE SERVIVIO DIARIO-->
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            <h3 class="mt-4"> <em>Servicio Diario </em> </h3>
                        </div>
                        <!-- PRIMERA COL -->
                        <div class="col-7">
                            <div class="col-12">
                                <label for="hora_inicio_servicio" class="">
                                    <h5>Horas de Inicio: </h5>
                                </label>
                                <input type="time" name="hora_inicio_servicio" id="hora_inicio_servicio" value="<?php echo $hora_inicio_servicio; ?>" class="" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="hora_final_servicio" class="">
                                    <h5>Horas de Termino: </h5>
                                </label>
                                <input type="time" name="hora_final_servicio" id="hora_final_servicio" value="<?php echo $hora_final_servicio; ?>" class="" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="lugar_origen" class="">
                                    <h5>Lugar de origen : </h5>
                                </label>
                                <input type="text" name="lugar_origen" id="lugar_origen" value="<?php echo $lugar_origen; ?>" class=" " aria-label="Default">
                            </div>
                            <div class="col-12">
                                <label for="lugar_destino" class="">
                                    <h5>Lugar de destino: </h5>
                                </label>
                                <input type="text" name="lugar_destino" id="lugar_destino" value="<?php echo $lugar_destino; ?>" class=" " aria-label="Default">
                            </div>
                            <!-- <div class="col-12">
                                <label for="embarcacion" class="">
                                    <h5>Embarcacion : </h5>
                                </label>
                                <input type="text" name="embarcacion" id="embarcacion" value="<?php echo $embarcacion; ?>" class=" " aria-label="Default">
                            </div> -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <label for="observaciones">
                                        <h5>Observacion : </h5>
                                    </label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" value="<?php echo $observaciones; ?>" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-6 mt-2 mb-3">
                                <button class="btn btn-dark btn-block" name="btnIngresarServicio" id="btnIngresarServicio" type="submit">Registrar Servicio diario</button>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="col-12">
                                <label for="cant_personal" class="">
                                    <h5>Total personas : </h5>
                                </label>
                                <input type="number" name="cant_personal" id="cant_personal" value="<?php echo $cant_personal; ?>" class=" " aria-label="Default">
                            </div>
                            <div class="col-12">
                                <label for="horas_total" class="">
                                    <h5>Hora total : </h5>
                                </label>
                                <input type="text" name="horas_total" id="horas_total" value="<?php echo $horas_total; ?>" placeholder="Automatico" aria-label="Default">
                            </div>
                            <div class="col-12">
                                <label for="horas_extras" class="">
                                    <h5>Horas Extras : </h5>
                                </label>
                                <input type="number" name="horas_extras" id="horas_extras" value="<?php echo $horas_extras; ?>" class=" " aria-label="Default">
                            </div>
                            <div class="col-12">
                                <label for="" class="">
                                    <h5> Nº Ingreso Servicio: </h5>
                                </label>
                                <input disabled type="text" name="idservicio_diario" id="idservicio_diario" value="<?php echo $idservicio_diario; ?>" class=" " aria-label="Default">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container shadow-lg">
        <form action="recursos/funciones/Vehiculo_fx.php" method="post">
            <div class="row mt-4">
                <div class="card col-12 bg-white ">
                    <div class="mb-3 text-center">
                        <h3 class="mt-4 text-cente"><em>Vehiculo</em></h3>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <label for="idservicio_diario" class="">
                            <h5> Nº Ingreso Servicio: </h5>
                        </label>
                        <input readonly="readonly" type="number" name="idservicio_diario" id="idservicio_diario" value="<?php echo $idservicio_diario; ?>" aria-label="Default">
                    </div>
                        <div class="col-7">
                            <select class="form-control mt-1 rounded-pill" name="vehiculo" id="vehiculo">
                                <option disabled selected>Seleccione el Vehiculo</option>
                                <option value="Camion">Camion</option>
                                <option value="Rampla">Rampla</option>
                                <option value="Grua">Grua</option>
                            </select>
                        </div>
                        <div class="col-7">
                            <select class="form-control mt-2 rounded-pill" name="patente" id="patente">
                                <option disabled selected>Seleccione la Patente</option>
                                <option value="">patente 1</option>
                                <option value="">patente 2</option>
                                <option value="">patente 3</option>
                            </select>
                        </div>
                        <div class="col-7 mt-3">
                            <label for="modelo" class="">
                                <h5>Modelo : </h5>
                            </label>
                            <input type="text" name="modelo" id="modelo" class=" " aria-label="Default">
                        </div>
                        <div class="col-12">
                            <label for="kilometraje" class="">
                                <h5>Kilometraje : </h5>
                            </label>
                            <input type="text" name="kilometraje" id="kilometraje" aria-label="Default">
                        </div>
                        <div class="col-12">
                            <label for="cant_combustible" class="">
                                <h5>Combultible </h5>
                            </label>
                            <input type="number" name="cant_combustible" id="cant_combustible" class=" " aria-label="Default">
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <button class="btn btn-dark btn-block" name="btnIngresoVehiculo" id="btnIngresoVehiculo" type="submit">Ingreso Veiculo</button>
                </div>
            </div>

        </form>
    </div>



    <!--**********REGISTRO DE EQUIPO***************-->
    <!-- <div class="container" id="">
            <div class="row">
                <div class="card col-12 bg-white mt-2" style=" border-radius: 15px; box-shadow: 0 0px 5px 0;">
         
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mt-4"> Maquina </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="rounded-pill border-primary  form-control" id="equipos" name="equipo" aria-label="Default select example">
                                <option selected>Seleccione el equipo : </option>
                                <option value="Camion">Camion</option>
                                <option value="Rampla">Rampla</option>
                                <option value="Grua">Grua</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="rounded-pill border-primary form-control" id="patentes" name="patente" aria-label="Default select example">
                                <option selected>Selecciones la patente :</option>
                                <option value="KRDO23">KRDO23</option>
                                <option value="KRDO23">WE4545</option>
                                <option value="">98493</option>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label for="hora_inicio_equipo" class="">
                                <h5>Horas de Inicio : </h5>
                            </label>
                            <input type="time" name="hora_inicio_equipo" id="hora_inicio_equipo" class="" placeholder="">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="hora_final_equipo" class="">
                                <h5>Horas de Termino : </h5>
                            </label>
                            <input type="time" name="hora_final_equipo" id="hora_final_equipo" class="" placeholder="">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="kilometraje" class="">
                                <h5>kilometraje : </h5>
                            </label>
                            <input type="text" name="kilometraje" id="kilometraje" class=" " aria-label="Default">
                        </div>
                        <div class="col-4">
                            <label for="combustible" class="">
                                <h5>Combustible : </h5>
                            </label>
                            <input type="text" name="combustible" id="combustible" class=" " aria-label="Default">
                        </div>
                        <div class="col-4">
                            <label for="lugar" class="">
                                <h5>Lugar : </h5>
                            </label>
                            <input type="text" name="lugar" id="lugar" class=" " aria-label="Default">
                        </div>
                        <div class="col-4">
                            <label for="observacion" class="">
                                <h5>Observacion :  </h5>
                            </label>
                            <input type="text" name="observacion" id="observacion" class=" " aria-label="Default">
                        </div>
                        <div class="col-4 mb-3">
                            <button class="btn btn-dark btn-block"  name="btnIngresarReporte" id="btnIngresarReporte" type="submit">Registrar Faena</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/select.js"></script>
<?php
    include('template/footer.php');
} else {
    header('Location: index.html');
}
?>