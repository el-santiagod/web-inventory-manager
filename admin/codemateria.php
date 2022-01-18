<?php
include('security.php');
//Accion Insert en el materiaprima.php - Start
if(isset($_POST['ingresarMateria']))
{
    $nombre = $_POST['ingresarN'];
    $cantidad = $_POST['ingresarC'];
    $valor = $_POST['ingresarV'];
    $descripcion = $_POST['ingresarD'];

        $query = "INSERT INTO  materia_prima (NOMBRE_MATERIA_PRIMA,CANTIDAD_MATERIA_PRIMA,VALOR_MATERIA_PRIMA,DESCRIPCION_MATERIA_PRIMA) VALUES ('$nombre','$cantidad','$valor','$descripcion')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            // echo"Se guardo";
            $_SESSION['status'] = "Se añadio una nueva materia prima";
            $_SESSION['status_code'] = "success";
            header('Location: materiaprima.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo añadir una nueva materia prima";
            $_SESSION['status_code'] = "error";
            header('Location: materiaprima.php');
        }

}
//Accion Insert en el materiaprima.php - End
?>

<?php
//Accion de Update en materiaprima_edit.php - Start
if(isset($_POST['actualizarMateria']))
{
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $cantidad = $_POST['edit_cantiad'];
    $valor = $_POST['edit_valor'];
    $descripcion = $_POST['edit_descripcion'];


    $query = "UPDATE materia_prima SET NOMBRE_MATERIA_PRIMA='$nombre',CANTIDAD_MATERIA_PRIMA='$cantidad',VALOR_MATERIA_PRIMA='$valor',DESCRIPCION_MATERIA_PRIMA='$descripcion'  WHERE ID_MATERIA_PRIMA='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han actualizado";
        $_SESSION['status_code'] = "success";
        header('Location: materiaprima.php'); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han actualizado";
        $_SESSION['status_code'] = "error";
        header('Location: materiaprima.php'); 
    }
}
//Accion de Update en materiaprima_edit.php - End
?>

<?php
//Accion de Delete en matieraprima.php - Start
if(isset($_POST['eliminarMateria']))
{
    $deleteid = $_POST['delete_id'];
    $query = "DELETE FROM materia_prima WHERE ID_MATERIA_PRIMA='$deleteid' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Tus datos se han eliminado!";
        $_SESSION['status_code'] = "success";
        header("Location: materiaprima.php"); 
    }
    else
    {
        $_SESSION['status'] = "Tus datos no se han ELIMINADO!";
        $_SESSION['status_code'] = "error";
        header("Location: materiaprima.php"); 
    }
}
//Accion de Delete en materiaprima.php - End
?>