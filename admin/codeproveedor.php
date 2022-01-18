<?php
include('security.php');
//Accion Insert en el proveedor.php - Start
if(isset($_POST['ingresarProveedor']))
{
    $nombre = $_POST['NOMBRE_PROVEEDOR'];
    $telefono = $_POST['TELEFONO_PROVEEDOR'];
    $direccion = $_POST['DIRECCION_PROVEEDOR'];
    $materiaFk = $_POST['ID_MATERIA_PRIMA_FK_PROVEEDOR'];
    $estadoFK = $_POST['ID_ESTADO_FK_PROVEEDOR'];


        $query = "INSERT INTO  proveedor (NOMBRE_PROVEEDOR,TELEFONO_PROVEEDOR,DIRECCION_PROVEEDOR,ID_MATERIA_PRIMA_FK_PROVEEDOR,ID_ESTADO_FK_PROVEEDOR) VALUES ('$nombre','$telefono','$direccion','$materiaFk','$estadoFK')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo proveedor";
            $_SESSION['status_code'] = "success";
            header('Location: proveedor.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo proveedor";
            $_SESSION['status_code'] = "error";
            header('Location: proveedor.php');
        }

}
//Accion Insert en el proveedor.php - End
?>

<?php
//Accion de Update en proveedor_edit.php - Start
if(isset($_POST['actualizarProveedor']))
{
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $telefono = $_POST['edit_telefono'];
    $direccion = $_POST['edit_direccion'];
    $materiaFK = $_POST['edit_materia'];
    $estadoFK = $_POST['edit_estado'];


    $query = "UPDATE proveedor SET NOMBRE_PROVEEDOR='$nombre',TELEFONO_PROVEEDOR='$telefono',DIRECCION_PROVEEDOR='$direccion',ID_MATERIA_PRIMA_FK_PROVEEDOR='$materiaFK',ID_ESTADO_FK_PROVEEDOR='$estadoFK'  WHERE ID_PROVEEDOR='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: proveedor.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: proveedor.php'); 
    }
}
//Accion de Update en proveedor_edit.php - End
?>
