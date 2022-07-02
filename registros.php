<?php
session_start();
if ($_SESSION['user']['rut'] != null) {
include('recursos/clases/ConexionCs.php');
include('template/header.php');
include('template/menuAdmin.php');




?>
  <div class="container">
            <div class="row">
                <div class="card col-12 bg-white " style="padding: 30px; border-radius: 15px; box-shadow: 0 0px 5px 0;">
                <h2 class="card-title">Faenas</h2>
                    <div class="table-responsive" >
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Tipo de Servicio</th>
                                    <th scope="col">Hora de Inicio</th>
                                    <th scope="col">Hora de Final</th>
                                    <th scope="col">Embarcacion</th>
                                    <th scope="col">Observacion</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                               <td>
                                <select class="rounded-pill border-primary " name="empresa" aria-label="Default select example" id="opEquipo">
                                    <option selected>Seleccione Empresa</option>
                                    <option value="camion">Friosur SA</option>
                                    <option value="Rampla">Australis Mar S.A.</option>
                                    <option value="Grua">Oxxean</option></td>
                                    <td><input type="text" name="tipo_de_servicio" class="" placeholder="Ej: Carga de Material"></td>
                                    <td><input disabled value=""></td>
                                    <td><input disabled type="time" class="rounded-pill border-primary " value=""></td>
                                    <th><input name="enbarcacion" type="text"></th>
                                    <th><input name="observacion" type="text"></th>
                                    <th><button class="btn btn-dark"  name="btnReporteFaena" 
                                        id="btnReporteFaena" type="submit">Ingreso</button></th>
                                    <th><button class="btn btn-dark">Finalizar</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php
include('template/footer.php');
} else {
    header('Location: administrador.php');
}

?>