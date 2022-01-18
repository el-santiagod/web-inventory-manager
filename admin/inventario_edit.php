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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Inventario </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarInven']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM inventario_materia_prima  WHERE ID_INVENTARIO_MATERIA_PRIMA='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeinventario.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['ID_INVENTARIO_MATERIA_PRIMA']; ?>">

                                <div class="form-group">
                                    <label> Saldo </label>
                                    <input type="text" name="edit_saldo" value="<?php echo $row['SALDO_INVENTARIO_MATERIA_PRIMA']; ?>" class="form-control"placeholder="Ingresar Saldo" required>
                                </div>


                                <a href="inventario.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="actualizarIven" class="btn btn-primary"> Actualizar </button>
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