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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Materia Prima </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarMateria']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM materia_prima WHERE ID_MATERIA_PRIMA='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codemateria.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ID_MATERIA_PRIMA']; ?>">

                                <div class="form-group">
                                    <label> Nombre </label>
                                    <input type="text" name="edit_nombre" value="<?php echo $row['NOMBRE_MATERIA_PRIMA']; ?>" class="form-control"placeholder="Ingresar Nombre" required>
                                </div>

                                <div class="form-group">
                                    <label> Cantidad </label>
                                    <input type="text" name="edit_cantiad" value="<?php echo $row['CANTIDAD_MATERIA_PRIMA']; ?>" class="form-control"  placeholder="Ingresar Cantidad" required>
                                </div>

                                <div class="form-group">
                                    <label> Valor </label>
                                    <input type="text" name="edit_valor" value="<?php echo $row['VALOR_MATERIA_PRIMA']; ?>" class="form-control"placeholder="Ingresar Valor" required>
                                </div>

                                <div class="form-group">
                                    <label> Descripcion </label>
                                    <input type="text" name="edit_descripcion" value="<?php echo $row['DESCRIPCION_MATERIA_PRIMA']; ?>" class="form-control"placeholder="Ingresar Descripcion" required>
                                </div>


                                <a href="materiaprima.php" class="btn btn-danger"> Cancelar </a>
                                <button type="submit" name="actualizarMateria" class="btn btn-primary"> Actualizar </button>
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