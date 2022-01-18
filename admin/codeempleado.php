<?php
include('security.php');
//Accion Insert en el empleado.php - Start
if(isset($_POST['ingresarEmpleado']))
{
    $nombre = $_POST['NOMBRE_EMPLEADO'];
    $fecha = $_POST['FECHA_INGRESO_EMPLEADO'];
    $telefono = $_POST['TELEFONO_EMPLEADO'];
    $direccion = $_POST['DIRECCION_EMPLEADO'];
    $salario = $_POST['SALARIO_EMPLEADO'];
    $cargoFK = $_POST['ID_CARGO_FK_EMPLEADO'];
    $estadoFK = $_POST['ID_ESTADO_FK_EMPLEADO'];


        $query = "INSERT INTO  empleado (NOMBRE_EMPLEADO,FECHA_INGRESO_EMPLEADO,TELEFONO_EMPLEADO,DIRECCION_EMPLEADO,SALARIO_EMPLEADO,ID_CARGO_FK_EMPLEADO,ID_ESTADO_FK_EMPLEADO) VALUES ('$nombre','$fecha','$telefono','$direccion','$salario','$cargoFK','$estadoFK')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio un nuevo empleado";
            $_SESSION['status_code'] = "success";
            header('Location: empleado.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir un nuevo empleado";
            $_SESSION['status_code'] = "error";
            header('Location: empleado.php');
        }

}
//Accion Insert en el empleado.php - End
?>

<?php
//Accion de Update en empleado_edit.php - Start
if(isset($_POST['actualizarEmpleado']))
{
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $fecha = $_POST['edit_fecha'];
    $telefono = $_POST['edit_telefono'];
    $direccion = $_POST['edit_direccion'];
    $salario = $_POST['edit_saldo'];
    $cargoFK = $_POST['edit_cargo'];
    $estadoFK = $_POST['edit_estado'];


    $query = "UPDATE empleado SET NOMBRE_EMPLEADO='$nombre',FECHA_INGRESO_EMPLEADO='$fecha',TELEFONO_EMPLEADO='$telefono',DIRECCION_EMPLEADO='$direccion',SALARIO_EMPLEADO='$salario',ID_CARGO_FK_EMPLEADO ='$cargoFK',ID_ESTADO_FK_EMPLEADO='$estadoFK'  WHERE ID_EMPLEADO ='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: empleado.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: empleado.php'); 
    }
}
//Accion de Update en empleado_edit.php - End
?>
