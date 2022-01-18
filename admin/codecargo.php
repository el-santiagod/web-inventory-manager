<?php
include('security.php');
//Accion Insert en el cargo.php - Start
if(isset($_POST['ingresarcargo']))
{
    $nombrecargo = $_POST['NOMBRE_CARGO'];

    if($nombrecargo)
    {
        $query = "INSERT INTO cargo (NOMBRE_CARGO) VALUES ('$nombrecargo')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo cargo";
            $_SESSION['status_code'] = "success";
            header('Location: cargo.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo cargo";
            $_SESSION['status_code'] = "error";
            header('Location: cargo.php');
        }
    }

}
//Accion Insert en el cargo.php - End
?>

<?php
//Accion de Update en cargo_edit.php - Start
if(isset($_POST['actualizarcargo']))
{
    $id = $_POST['edit_id'];
    $nombrecargo = $_POST['edit_nombrecargo'];


    $query = "UPDATE cargo SET NOMBRE_CARGO='$nombrecargo' WHERE ID_CARGO='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: cargo.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: cargo.php'); 
    }
}
//Accion de Update en cargo_edit.php - End
?>

<?php
//Accion de Delete en cargo.php - Start
if(isset($_POST['eliminarcargo']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM cargo WHERE ID_CARGO='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: cargo.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: cargo.php"); 
    }
}
//Accion de Delete en cargo.php - End
?>