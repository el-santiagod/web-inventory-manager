<?php
include('security.php');
//Accion Insert en el producto.php - Start
if(isset($_POST['ingresarProducto']))
{
    $nombre = $_POST['nombre'];
    $cantidadMin = $_POST['cantidad_min'];
    $cantidadMax = $_POST['cantidad_max'];
    $proveedor = $_POST['insertarP'];
    $refprod = $_POST['insertarR'];
    $empleado = $_POST['insertarE'];
    $estado = $_POST['estado'];


    $query = "INSERT INTO producto (NOMBRE_PRODUCTO, CANTIDAD_MIN_PRODUCTO, CANTIDAD_MAX_PRODUCTO, ID_PROVEEDOR_FK_PRODUCTO, ID_REFERENCIA_PRODUCTO_FK_PRODUCTO, ID_EMPLEADO_FK_PRODUCTO, ID_ESTADO_FK_PRODUCTO) VALUES ('$nombre','$cantidadMin','$cantidadMax','$proveedor','$refprod','$empleado','$estado')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo producto";
            $_SESSION['status_code'] = "success";
            header('Location: producto.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo producto";
            $_SESSION['status_code'] = "error";
            header('Location: producto.php');
        }

}
//Accion Insert en el producto.php - End
?>

<?php
//Accion de Update en producto_edit.php - Start
if(isset($_POST['actualizarProducto']))
{
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $cantidadMin = $_POST['edit_cantidadmin'];
    $cantidadMax = $_POST['edit_cantidadmax'];
    $proveedor = $_POST['edit_prove'];
    $refprod = $_POST['edit_ref'];
    $empleado = $_POST['edit_empleado'];
    $estado = $_POST['edit_estado'];


    $query = "UPDATE producto SET NOMBRE_PRODUCTO='$nombre',CANTIDAD_MIN_PRODUCTO='$cantidadMin',CANTIDAD_MAX_PRODUCTO='$cantidadMax',ID_PROVEEDOR_FK_PRODUCTO='$proveedor',ID_REFERENCIA_PRODUCTO_FK_PRODUCTO ='$refprod',ID_EMPLEADO_FK_PRODUCTO ='$empleado',ID_ESTADO_FK_PRODUCTO='$estado'  WHERE ID_PRODUCTO='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: producto.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: producto.php'); 
    }
}
//Accion de Update en producto_edit.php - End
?>
