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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Referencia Producto </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarref']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM referencia_producto WHERE ID_REFERENCIA_PRODUCTO='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codereferencia.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['ID_REFERENCIA_PRODUCTO']; ?>">

                                <div class="form-group">
                                    <label> Talla </label>
                                    <input type="text" name="edit_talla" value="<?php echo $row['TALLA_REFERENCIA_PRODUCTO']; ?>" class="form-control"placeholder="Ingresar Talla" required>
                                </div>

                                <div class="form-group">
                                    <label> Color </label>
                                    <input type="text" name="edit_color" value="<?php echo $row['COLOR_REFERENCIA_PRODUCTO']; ?>" class="form-control"  placeholder="Ingresar Color" required>
                                </div>



                                <a href="referenciaP.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="actualizarref" class="btn btn-primary"> Actualizar </button>
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