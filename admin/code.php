<?php
include('security.php');
//Accion Insert en el register.php - Start
if(isset($_POST['registerbtn']))
{
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $confirmarc = $_POST['confirmarcontra'];
    $usertype = $_POST['usertype'];

    if($contraseña === $confirmarc)
    {
        $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$usuario','$email','$contraseña','$usertype')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo usuario";
            $_SESSION['status_code'] = "success";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "No se añadio un nuevo usuario";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Las contraseñas no coinsiden";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');
    }

}
//Accion Insert en el register.php - End
?>


<?php
//Accion de Update en register_edit.php - Start
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeUpdate = $_POST['edit_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeUpdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}
//Accion de Update en register_edit.php - End
?>

<?php
//Accion de Delete en register.php - Start
if(isset($_POST['delete_btn']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM register WHERE id='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: register.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: register.php"); 
    }
}
//Accion de Delete en register.php - End
?>
