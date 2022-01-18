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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Empleado </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarEmpleado']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM empleado WHERE ID_EMPLEADO='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeempleado.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ID_EMPLEADO']; ?>">

                                

                                <div class="form-group">
                                    <label> Nombre </label>
                                    <input type="text" name="edit_nombre" value="<?php echo $row['NOMBRE_EMPLEADO']; ?>" class="form-control"placeholder="Ingresar Nombre" required>
                                </div> 

                                <div class="form-group">
                                    <label> Fecha </label>
                                    <input type="date" name="edit_fecha" value="<?php echo $row['FECHA_INGRESO_EMPLEADO']; ?>" class="form-control"placeholder="Ingresar Fecha" required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Telefono </label>
                                    <input type="text" name="edit_telefono" value="<?php echo $row['TELEFONO_EMPLEADO']; ?>" class="form-control"placeholder="Ingresar Telefono" required>
                                </div>
                            
                                <div class="form-group">
                                    <label> Direccion </label>
                                    <input type="text" name="edit_direccion" value="<?php echo $row['DIRECCION_EMPLEADO']; ?>" class="form-control"placeholder="Ingresar Direccion" required>
                                </div>

                                <div class="form-group">
                                    <label> Saldo </label>
                                    <input type="text" name="edit_saldo" value="<?php echo $row['SALARIO_EMPLEADO']; ?>" class="form-control"placeholder="Ingresar Saldo" required>
                                </div>


                                    <?php
                                        $cargo = "SELECT * FROM cargo";
                                        $cargo_run = mysqli_query($connection, $cargo);

                                        if(mysqli_num_rows($cargo_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <select name="edit_cargo" class="form-control" required>
                                                    <option value="" >Escoge el cargo</option>
                                                    <?php
                                                        foreach($cargo_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_CARGO']; ?>"><?php echo $row['NOMBRE_CARGO']; ?></option>
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

                                <a href="empleado.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarEmpleado" class="btn btn-primary"> Actualizar </button>
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