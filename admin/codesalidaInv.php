<?php
include('security.php');
//Accion Insert en el salidaInv.php - Start
if(isset($_POST['ingresarSalida']))
{
    $orden = $_POST['insertarOrden'];
    $inventario = $_POST['insertarI'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    $saldo = $_POST['saldo'];
    $estado = $_POST['estado'];


    $query = "INSERT INTO salida_inventario (ID_ORDEN_PRODUCCION_FK_SALIDA_INVENTARIO,ID_INVENTARIO_MATERIA_PRIMA_FK_SALIDA_INVENTARIO,CANTIDAD_SALIDA_INVENTARIO,FECHA_SALIDA_INVENTARIO,SALDO_SALIDA_INVENTARIO, ID_ESTADO_FK_SALIDA_INVENTARIO) VALUES ('$orden','$inventario','$cantidad','$fecha','$saldo','$estado')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio una entrada inventario";
            $_SESSION['status_code'] = "success";
            header('Location: salidaInv.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir una entrada inventario";
            $_SESSION['status_code'] = "error";
            header('Location: salidaInv.php');
        }

}
//Accion Insert en el salidaInv.php - End
?>

<?php
//Accion de Update en salidaInv_edit.php - Start
if(isset($_POST['actualizarSalida']))
{   
    $id = $_POST['edit_id'];
    $orden = $_POST['edit_orden'];
    $inventario = $_POST['edit_materiaInv'];
    $cantidad = $_POST['edit_cantidad'];
    $fecha = $_POST['edit_fecha'];
    $saldo = $_POST['edit_saldo'];
    $estado = $_POST['edit_estado'];


    $query = "UPDATE salida_inventario SET ID_ORDEN_PRODUCCION_FK_SALIDA_INVENTARIO ='$orden',ID_INVENTARIO_MATERIA_PRIMA_FK_SALIDA_INVENTARIO='$inventario',CANTIDAD_SALIDA_INVENTARIO='$cantidad',FECHA_SALIDA_INVENTARIO='$fecha',SALDO_SALIDA_INVENTARIO='$saldo',ID_ESTADO_FK_SALIDA_INVENTARIO='$estado'  WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: salidaInv.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: salidaInv.php'); 
    }
}
//Accion de Update en salidaInv_edit.php - End
?>
