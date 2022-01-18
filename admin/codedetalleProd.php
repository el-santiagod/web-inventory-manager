<?php
include('security.php');
//Accion Insert en el detalleProd.php - Start
if(isset($_POST['ingresarDetalle']))
{
    $orden = $_POST['insertarOrden'];
    $materia = $_POST['insertarM'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $valor = $_POST['valor'];

    $query = "INSERT INTO detalle_orden_produccion (ID_ORDEN_PRODUCCION_FK_DETALLE_ORDEN_PRODUCCION,ID_MATERIA_PRIMA_FK_DETALLE_ORDEN_PRODUCCION,PRODUCTO_DETALLE_ORDEN_PRODUCCION,CANTIDAD_DETALLE_ORDEN_PRODUCCION,VALOR_DETALLE_ORDEN_PRODUCCION) VALUES ('$orden','$materia','$producto','$cantidad','$valor')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo detalle";
            $_SESSION['status_code'] = "success";
            header('Location: detalleProd.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo detalle";
            $_SESSION['status_code'] = "error";
            header('Location: detalleProd.php');
        }

}
//Accion Insert en el detalleProd.php - End
?>

<?php
//Accion de Update en detalleProd_edit.php - Start
if(isset($_POST['actualizarDetalle']))
{   
    $id = $_POST['edit_id'];
    $orden = $_POST['edit_orden'];
    $materia = $_POST['edit_materia'];
    $producto = $_POST['edit_producto'];
    $cantidad = $_POST['edit_cantidad'];
    $valor = $_POST['edit_valor'];


    $query = "UPDATE detalle_orden_produccion SET ID_ORDEN_PRODUCCION_FK_DETALLE_ORDEN_PRODUCCION='$orden',ID_MATERIA_PRIMA_FK_DETALLE_ORDEN_PRODUCCION='$materia',PRODUCTO_DETALLE_ORDEN_PRODUCCION='$producto',CANTIDAD_DETALLE_ORDEN_PRODUCCION='$cantidad',VALOR_DETALLE_ORDEN_PRODUCCION='$valor' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: detalleProd.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: detalleProd.php'); 
    }
}
//Accion de Update en detalleProd_edit.php - End
?>
