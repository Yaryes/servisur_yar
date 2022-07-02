<?php
session_start();
include('recursos/clases/UsuarioCs.php');
include('template/header.php');
include('template/nav/menu_administrador.php');
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
echo $msg;
?>
<form action="recursos/funciones/Usuarios_fx.php" method="post">
    <div class="container text-dark shadow-lg mt-5">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="alert alert-primary h5">Registro de Nuevos usuario</div>
            </div>
            <!--DATOS DEL FORMULARIO-->
            <div class="col-9">
                <div class="row mt-3">
                    <div class="b5-form-group col-2 ml-1">
                        <label for="id">Id:</label>
                        <input disabled type="text" name="id" id="id" value="" class="form-control">
                    </div>
                    <div class="b5-form-group col-3">
                        <label for="rut">Rut</label>
                        <input class="form-control" type="text" id="rut" name="rut" value="">
                        <small id="helpRut" class="text-muted">Ingrese su rut:</small>
                    </div>
                    <div class="b5-form-group col-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" value="" class="form-control ">
                        <small id="helpNombre" class="text-muted">Ingrese su nombre:</small>
                    </div>
                    <div class="form-group col-3">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" value="" class="form-control">
                        <small id="helpApellido" class="text-muted">Ingrese su apellido</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="b5-form-group col-2">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" value="" class="form-control">
                        <small id="" class="text-muted">Ingrese su telefono:</small>
                    </div>
                    <div class="b5-form-group col-3">
                        <label for="correo">Correo:</label>
                        <input type="email" name="correo" id="correo" value="" class="form-control">
                        <small id="helpEmail" class="text-muted">Ingrese su correo:</small>
                    </div>
                    <div class="b5-form-group col-3">
                        <label for="pass">Password:</label>
                        <input type="password" name="pass" id="pass" class="form-control ">
                        <small id="helpPass" class="text-muted">Ingrese su contraseña</small>
                    </div>
                    <div class="b5-form-group col-3">
                        <label for="pass2">Repita su Password:</label>
                        <input type="password" name="pass2" id="pass2" class="form-control ">
                        <small id="helpPass2" class="text-muted">Repita su contraseña</small>
                    </div>
                    <div class="b5-form-group col-3 mt-4">
                        <label for="perfil" class="form-label">Perfil</label>
                        <select class="form-control" name="perfil" id="perfil">
                            <option>Administrador</option>
                            <option>Operario</option>
                            <option>Recuros Humanos</option>
                            <option>Mantenimiento</option>
                        </select>
                        <small id="helpPerfil" class="text-muted">Ingrese su perfil</small>
                    </div>
                </div>
            </div>
            <div class="col-3" >
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid " src="img/sinfoto.jpg" width="100%">
                    </div>  
                    <div class="col-12">
                        <a class="btn btn-dark btn-block btn-sm">Agregar foto</a>
                    </div> 
                </div>           
            </div>
        </div>
        <div class="row mt-2 p-3">
            <!-- BOTONES CRUD-->
            <div class="col-2">
                <button class="btn btn-dark btn-block" name="btnIngresar" id="btnIngresar" type="submit">Ingresar</button>
            </div>
            <div class="col-2">
                <button class="btn btn-dark btn-block" name="btnBuscar" id="btnBuscar" type="submit">Buscar</button>
            </div>
            <div class="col-2">
                <button class="btn btn-dark btn-block" name="btnEliminar" id="btnEliminar" type="submit">Eliminar</button>
            </div>
            <div class="col-2">
                <button class="btn btn-dark btn-block" name="btnActualizar" id="btnActualizar" type="submit">Actualizar</button>
            </div>
        </div>
    </div>
</form>
<?php
include('template/footer.php');
?>