<?php
include('security.php');
//Accion Insert en el referenciaP.php - Start
if(isset($_POST['ingresarref']))
{
    $talla = $_POST['TALLA_REFERENCIA_PRODUCTO'];
    $color = $_POST['COLOR_REFERENCIA_PRODUCTO'];

        $query = "INSERT INTO  referencia_producto (TALLA_REFERENCIA_PRODUCTO,COLOR_REFERENCIA_PRODUCTO) VALUES ('$talla','$color')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nueva referencia";
            $_SESSION['status_code'] = "success";
            header('Location: referenciaP.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nueva referencia";
            $_SESSION['status_code'] = "error";
            header('Location: referenciaP.php');
        }

}
//Accion Insert en el referenciaP.php - End
?>

<?php
//Accion de Update en referenciaP_edit.php - Start
if(isset($_POST['actualizarref']))
{
    $id = $_POST['edit_id'];
    $talla = $_POST['edit_talla'];
    $color = $_POST['edit_color'];


    $query = "UPDATE referencia_producto  SET TALLA_REFERENCIA_PRODUCTO='$talla',COLOR_REFERENCIA_PRODUCTO='$color' WHERE ID_REFERENCIA_PRODUCTO='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: referenciaP.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: referenciaP.php'); 
    }
}
//Accion de Update en referenciaP_edit.php - End
?>

<?php
//Accion de Delete en referenciaP.php - Start
if(isset($_POST['eliminarref']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM referencia_producto  WHERE ID_REFERENCIA_PRODUCTO='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: referenciaP.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: referenciaP.php"); 
    }
}
//Accion de Delete en referenciaP.php - End
?>