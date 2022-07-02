<?php
session_start();
if ($_SESSION['user']['rut'] != null) {
    include('recursos/clases/ConexionCs.php');
    include('template/header.php');
    include('template/nav/menu_operario.php');
    if (isset($_GET['msg'])) {

        $idservi = $_GET['idservi'];
        $msg = $_GET['msg'];
    } else {
        $msg = "";
        $idservi = "";
    }

    echo $msg;
?>
    <!-- REGISTRO OPERARIO 2DA PARTE //*<?php echo 'Nº de Informe Ingresado: ' . $_GET['ultimo']; ?> */ -->
    <div class="container">
        <div class="row">
            <div class="col-12 bg-white mt-2 " style="padding: 30px; border-radius: 15px; box-shadow: 0 0px 5px 0;">
                <h3><?php echo '' . $_SESSION['user']['perfil']; ?></h3>
                <div class="row">
                    <div class="col-12">
                        <h5> <?php echo 'Nombre: ' . $_SESSION['user']['fullname']; ?> </h5>
                        <h5> <?php echo 'Correo: ' . $_SESSION['user']['correo']; ?> </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="recursos/funciones/ReporteFaena_fx.php" method="post">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 cotext-dark" style="padding: 30px; border-radius: 15px; box-shadow: 0 0px 5px 0;">
                    <h2 class="card-title">Faenas</h2>
                    <div class="col-7">
                        <label for="idservicio_diario"> <strong> Nª Reporte Ingresado :</strong></label>
                        <input name="idservicio_diario" id="idservicio_diario" value="<?php echo $idservi; ?>">
                    </div>
                    <div class="col-12 mt-3 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Tipo de Servicio</th>
                                    <th scope="col">Hora de Inicio</th>
                                    <th scope="col">Hora de Final</th>
                                    <th scope="col">Embarcacion</th>
                                    <th scope="col">Observacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="rounded-pill border-primary " name="empresa" aria-label="Default select example" id="opEquipo">
                                            <option selected>Seleccione Empresa</option>
                                            <option value="camion">Friosur SA</option>
                                            <option value="Rampla">Australis Mar S.A.</option>
                                            <option value="Grua">Oxxean</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="tipo_de_servicio" class="" placeholder="Ej: Carga de Material"></td>
                                    <td><input type="time" value=""></td>
                                    <td><input type="time" value=""></td>
                                    <th><input name="enbarcacion" type="text"></th>
                                    <th><input name="observacion" type="text"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-3 mt-3">
                    <button class="btn btn-primary btn-block" name="btnIngresoFaena" id="btnIngresoFaena" 
                        type="submit">Registrar a Faena</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
    include('template/footer.php');
} else {
    header('Location: index.html');
}
?>