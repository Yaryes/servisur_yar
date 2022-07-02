<?php
session_start();
include('recursos/clases/ConexionCs.php');
include('template/header.php');
include('template/menu_administrador.php');
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
echo $msg;
?>

<div class="container mt-5">
    <div class="text-light bg-dark p-2 " style="border-radius: 15px; box-shadow: 0 0px 5px 0;">
        <div class="row ml-3">
            <div class="col-12 mt-2 mb-2 text-center">
                <h2>Registro de Vehiculos</h2>
            </div>
            <div class="col-11 mt-4">
                    <select class="rounded-pill border-primary form-control" aria-label="Default select example"
                            id="opEquipo">
                        <option selected>Seleccione Equipo</option>
                        <option value="camion">Camion</option>
                        <option value="Rampla">Rampla</option>
                        <option value="Grua">Grua</option>
                    </select>
            </div>
        </div>
        <!-- FROM -->
        <form action="recursos/funciones/camion_fx.php" method="POST">
            <div class="row mt-3 ml-3">
                <div class="col-3 mt-4">
                    <div class="input-group input-group mb-3">
                        <label for="patenteCamion" class="mt-2"><h5>Patente</h5></label>
                        <input type="text" name="patenteCamion" id="patenteCamion" class="form-control ml-2 rounded-pill " placeholder="Ej: RPSD-23">
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div class="input-group input-group mb-3">
                        <label for="combustibleCamion" class="mt-2"><h5>Combustible Lts</h5></label>
                        <input type="number" name="combustibleCamion" id="combustibleCamion" class="form-control ml-3 rounded-pill " placeholder="Ej: 40 litros">
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div class="input-group input-group mb-3">
                        <label for="kilometrajeCamion" class="mt-1"><h5>Kilometraje</h5></label>
                        <input type="text" name="kilometrajeCamion" id="kilometrajeCamion" class="form-control ml-4 rounded-pill " placeholder="Ej: 00003231 ">
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div class="input-group input-group mb-3">
                        <label for="lugarInicial" class="mt-1"><h5>Lugar de uso</h5></label>
                        <input type="text"  name="lugarInicial" id="lugarInicial" class="form-control ml-4 rounded-pill " placeholder="Ej: Puerto Chacabuco">
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div class="input-group input-group mb-3">
                        <label for="cantiHorasUso" class="mt-1"><h5>Horas de Uso</h5></label>
                        <input type="text" name="cantiHorasUso" id="cantiHorasUso" class="form-control ml-4 rounded-pill " placeholder="Ej: 0">
                    </div>
                </div> 
                <div class="col-3 mt-4">
                    <div class="input-group input-group mb-3">
                        <label  for="" class="mt-1 " ><h5>Codigo Camion</h5></label>
                        <input disabled type="text" class="form-control ml-4 rounded-pill " placeholder="Ej: 0">
                    </div>
                </div> 
            </div>
            <div class="row p-3">
                <div class="col-4 ">
                    <button class="btn btn-success btn-block"  type="submit" name="btnIngresarCamion" id="btnIngresarCamion" >Ingresar Vehiculo</button>
                                <!-- <a href="registroFaena.php" class="btn btn-success">Iniciar Servicio</a> -->
                </div>   
                <div class="col-4 ">
                    <button class="btn btn-success btn-block" type="button"  name="" id="" >Modificar Vehiculo</button>
                                <!-- <a href="registroFaena.php" class="btn btn-success">Iniciar Servicio</a> -->
                </div>   
                <div class="col-4">
                    <button class="btn btn-danger btn-block" type="button"  name="" id="" >Eliminar Vehiculo</button>
                                <!-- <a href="registroFaena.php" class="btn btn-success">Iniciar Servicio</a> -->
                </div>   
            </div>
        </form>
    </div>
</div>
<?php
include('template/footer.php');
?>