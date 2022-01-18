<?php
include('security.php');
//Accion Insert en el entradaInv.php - Start
if(isset($_POST['ingresarEntradaIn']))
{
    $materia = $_POST['insertarM'];
    $inventario = $_POST['insertarI'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    $saldo = $_POST['saldo'];
    $estado = $_POST['estado'];


    $query = "INSERT INTO entrada_inventario (ID_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO,ID_INVENTARIO_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO,CANTIDAD_ENTRADA_INVENTARIO,FECHA_ENTRADA_INVENTARIO,SALDO_ENTRADA_INVENTARIO, ID_ESTADO_FK_ENTRADA_INVENTARIO) VALUES ('$materia','$inventario','$cantidad','$fecha','$saldo','$estado')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio una entrada inventario";
            $_SESSION['status_code'] = "success";
            header('Location: entradaInv.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir una entrada inventario";
            $_SESSION['status_code'] = "error";
            header('Location: entradaInv.php');
        }

}
//Accion Insert en el entradaInv.php - End
?>

<?php
//Accion de Update en entradaInv_edit.php - Start
if(isset($_POST['actualizarEntrada']))
{   
    $id = $_POST['edit_id'];
    $materia = $_POST['edit_materia'];
    $inventario = $_POST['edit_materiaInv'];
    $cantidad = $_POST['edit_cantidad'];
    $fecha = $_POST['edit_fecha'];
    $saldo = $_POST['edit_saldo'];
    $estado = $_POST['edit_estado'];


    $query = "UPDATE entrada_inventario SET ID_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO='$materia',ID_INVENTARIO_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO='$inventario',CANTIDAD_ENTRADA_INVENTARIO='$cantidad',FECHA_ENTRADA_INVENTARIO='$fecha',SALDO_ENTRADA_INVENTARIO='$saldo',ID_ESTADO_FK_ENTRADA_INVENTARIO ='$estado'  WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: entradaInv.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: entradaInv.php'); 
    }
}
//Accion de Update en entradaInv_edit.php - End
?>
