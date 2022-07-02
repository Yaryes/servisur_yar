<?php
session_start();
if ($_SESSION['user']['rut'] != null) {
    include('recursos/clases/ConexionCs.php');
    include('template/header.php');
    include('template/nav/menu_administrador.php');
?>
    <div class="container">
        <div class="row">
            <div class="card col-12 bg-white m-4 " style="padding: 30px; border-radius: 15px; box-shadow: 0 0px 5px 0;">
                <!--DATOS DEL PERFIL-->
                <h1 class="card-title mt-3"> <?php echo 'Perfil de ' . $_SESSION['user']['perfil']; ?> </h3>
                    <div class="card"></div>
                    <h5 class="card-title"> <?php echo 'Nombre: ' . $_SESSION['user']['nombre']; ?> </h5>
                    <h5 class="card-title"> <?php echo 'Correo: ' . $_SESSION['user']['correo']; ?> </h5>
                    <h5 class="card-title"> <?php echo 'RUT: ' . $_SESSION['user']['rut']; ?> </h5>
                    <div class="row">
                        <div class="col-6">
                            <!-- <button class="btn btn-dark btn-block" name="" id="" type="submit">Registro de Servicioss </button> -->
                        <a href="registros.php" class="btn btn-dark btn-block"> Registro de Servicioss</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php
    include('template/footer.php');
} else {
    header('Location: index.html');
}
?>