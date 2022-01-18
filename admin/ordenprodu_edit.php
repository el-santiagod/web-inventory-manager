<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Contenedor Inicio -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <!-- Titulo -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Orden de Produccion </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarOrden']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM orden_produccion WHERE ID_ORDEN_PRODUCCION ='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeordenprodu.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ID_ORDEN_PRODUCCION']; ?>">

                                <div class="form-group">
                                    <label> Fecha </label>
                                    <input type="date" name="edit_fecha" value="<?php echo $row['FECHA_ORDEN_PRODUCCION']; ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label> Cantidad </label>
                                    <input type="text" name="edit_cantidad" value="<?php echo $row['CANTIDAD_ORDEN_PRODUCCION']; ?>" class="form-control"  placeholder="Ingresar Cantidad" required>
                                </div>

                                <div class="form-group">
                                    <label> Observacion </label>
                                    <input type="text" name="edit_obser" value="<?php echo $row['OBSERVACION_ORDEN_PRODUCCION']; ?>" class="form-control"placeholder="Ingresar Observacion" required>
                                </div>


                                <a href="ordenprodu.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="actualizarProdu" class="btn btn-primary"> Actualizar </button>
                            </form>
                            <?php
                    }
                }
            ?>


            </div>
        </div>
    </div>

    </div>
<!-- Contenedor Fin -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>