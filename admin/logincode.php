<?php
include('security.php');
//Accion de Login en login.php - Start
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $contraseña_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND  password='$contraseña_login' ";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "Administrador")
    {
        $_SESSION['username'] = $email_login ;
        header("Location: index.php");
    }
    else if($usertypes['usertype'] == "Costurero")
    {
        $_SESSION['username'] = $email_login ;
        header("Location: ../costurero/index.php");
    }
    else
    {
        $_SESSION['status'] = 'Email id o Contraseña invalida' ;
        header("Location: login.php");
    }
}
//Accion de Login en login.php - End
?>