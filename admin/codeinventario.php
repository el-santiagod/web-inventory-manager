<?php
include('security.php');
//Accion Insert en el inventario.php - Start
if(isset($_POST['ingresarInventario']))
{
    $saldo = $_POST['SALDO_INVENTARIO_MATERIA_PRIMA'];

        $query = "INSERT INTO inventario_materia_prima (SALDO_INVENTARIO_MATERIA_PRIMA) VALUES ('$saldo')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo inventario";
            $_SESSION['status_code'] = "success";
            header('Location: inventario.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo inventario";
            $_SESSION['status_code'] = "success";
            header('Location: inventario.php');
        }

}
//Accion Insert en el inventario.php - End
?>

<?php
//Accion de Update en inventario_edit.php - Start
if(isset($_POST['actualizarIven']))
{
    $id = $_POST['edit_id'];
    $saldo = $_POST['edit_saldo'];


    $query = "UPDATE inventario_materia_prima SET SALDO_INVENTARIO_MATERIA_PRIMA='$saldo' WHERE ID_INVENTARIO_MATERIA_PRIMA ='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: inventario.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: inventario.php'); 
    }
}
//Accion de Update en inventario_edit.php - End
?>

<?php
//Accion de Delete en inventario.php - Start
if(isset($_POST['eliminarIven']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM inventario_materia_prima WHERE ID_INVENTARIO_MATERIA_PRIMA='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: inventario.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: inventario.php"); 
    }
}
//Accion de Delete en inventario.php - End
?>