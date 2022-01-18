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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Proveedor </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarProveedor']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM proveedor WHERE ID_PROVEEDOR='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeproveedor.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ID_PROVEEDOR']; ?>">

                                

                                <div class="form-group">
                                    <label> Nombre </label>
                                    <input type="text" name="edit_nombre" value="<?php echo $row['NOMBRE_PROVEEDOR']; ?>" class="form-control"placeholder="Ingresar Nombre" required>
                                </div> 
                                
                                <div class="form-group">
                                    <label> Telefono </label>
                                    <input type="text" name="edit_telefono" value="<?php echo $row['TELEFONO_PROVEEDOR']; ?>" class="form-control"placeholder="Ingresar Telefono" required>
                                </div>
                                  
                                <div class="form-group">
                                    <label> Direccion </label>
                                    <input type="text" name="edit_direccion" value="<?php echo $row['DIRECCION_PROVEEDOR']; ?>" class="form-control"placeholder="Ingresar Direccion" required>
                                </div>

                                    <?php
                                        $materia = "SELECT * FROM materia_prima";
                                        $materia_run = mysqli_query($connection, $materia);

                                        if(mysqli_num_rows($materia_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Materia Prima</label>
                                                <select name="edit_materia" class="form-control" required>
                                                    <option value="" >Escoge la materia prima</option>
                                                    <?php
                                                        foreach($materia_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_MATERIA_PRIMA']; ?>"><?php echo $row['NOMBRE_MATERIA_PRIMA']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <?php 
                                        }
                                        else
                                        {
                                            echo "No hay datos";
                                        }    
                                    ?>

                                    <?php
                                        $estado = "SELECT * FROM estado";
                                        $estado_run = mysqli_query($connection, $estado);

                                        if(mysqli_num_rows($estado_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <select name="edit_estado" class="form-control" required>
                                                    <option value="" >Escoge el estado</option>
                                                    <?php
                                                        foreach($estado_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <?php 
                                        }
                                        else
                                        {
                                            echo "No hay datos";
                                        }    
                                    ?>







                                <a href="proveedor.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarProveedor" class="btn btn-primary"> Actualizar </button>
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