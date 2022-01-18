<?php
include('security.php');
//Accion Insert en el ordenprodu.php - Start
if(isset($_POST['ingresarOrden']))
{
    $fecha = $_POST['FECHA_ORDEN_PRODUCCION'];
    $cantidad = $_POST['CANTIDAD_ORDEN_PRODUCCION'];
    $observacion = $_POST['OBSERVACION_ORDEN_PRODUCCION'];

        $query = "INSERT INTO  orden_produccion (FECHA_ORDEN_PRODUCCION,CANTIDAD_ORDEN_PRODUCCION,OBSERVACION_ORDEN_PRODUCCION) VALUES ('$fecha','$cantidad','$observacion')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio una nueva orden de produccion";
            $_SESSION['status_code'] = "success";
            header('Location: ordenprodu.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir una nueva orden de produccion";
            $_SESSION['status_code'] = "error";
            header('Location: ordenprodu.php');
        }

}
//Accion Insert en el ordenprodu.php - End
?>

<?php
//Accion de Update en ordenprodu_edit.php - Start
if(isset($_POST['actualizarProdu']))
{
    $id = $_POST['edit_id'];
    $fecha = $_POST['edit_fecha'];
    $cantidad = $_POST['edit_cantidad'];
    $observacion = $_POST['edit_obser'];


    $query = "UPDATE orden_produccion SET FECHA_ORDEN_PRODUCCION='$fecha',CANTIDAD_ORDEN_PRODUCCION='$cantidad',OBSERVACION_ORDEN_PRODUCCION='$observacion' WHERE ID_ORDEN_PRODUCCION='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: ordenprodu.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: ordenprodu.php'); 
    }
}
//Accion de Update en ordenprodu_edit.php - End
?>

<?php
//Accion de Delete en ordenprodu.php - Start
if(isset($_POST['eliminarOrden']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM orden_produccion WHERE ID_ORDEN_PRODUCCION='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: ordenprodu.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: ordenprodu.php"); 
    }
}
//Accion de Delete en ordenprodu.php - End
?>