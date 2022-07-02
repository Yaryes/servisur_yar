<?php
session_start();
if($_SESSION ['user']['rut']!=null){
include('recursos/clases/ConexionCs.php');
include('template/header.php');
include('template/nav/menu_operario.php')
?>
<h3>Historial</h3>
<?php
include('template/footer.php');
}else{
    header('Location: index.html'); 
 }
?>