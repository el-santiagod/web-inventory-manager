<?php
session_start();

//Accion de Cerrar Sesion - Start
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: ../admin/login.php');
}
//Accion de Cerrar Sesion - End
?>