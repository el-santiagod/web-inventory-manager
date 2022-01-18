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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Cargo </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarcargo']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM cargo WHERE ID_CARGO='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codecargo.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['ID_CARGO']; ?>">

                                <div class="form-group">
                                    <label> Nombre del cargo </label>
                                    <input type="text" name="edit_nombrecargo" value="<?php echo $row['NOMBRE_CARGO'] ?>" class="form-control"placeholder="Ingresar Cargo" required>
                                </div>

                                <a href="cargo.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="actualizarcargo" class="btn btn-primary"> Actualizar </button>
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