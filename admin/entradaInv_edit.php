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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Entrada </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarEntrada']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM entrada_inventario WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeentradaInv.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                                <div class="form-group">
                                    <label> Cantidad </label>
                                    <input type="text" name="edit_cantidad" value="<?php echo $row['CANTIDAD_ENTRADA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Cantidad" required>
                                </div> 

                                <div class="form-group">
                                    <label> Fecha </label>
                                    <input type="date" name="edit_fecha" value="<?php echo $row['FECHA_ENTRADA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Fecha" required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Saldo </label>
                                    <input type="text" name="edit_saldo" value="<?php echo $row['SALDO_ENTRADA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Saldo" required>
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
                                        $invmateria = "SELECT * FROM inventario_materia_prima";
                                        $inv_materia_run = mysqli_query($connection, $invmateria);

                                        if(mysqli_num_rows($inv_materia_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Inventario</label>
                                                <select name="edit_materiaInv" class="form-control" required>
                                                    <option value="" >Escoge el inventario</option>
                                                    <?php
                                                        foreach($inv_materia_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_INVENTARIO_MATERIA_PRIMA']; ?>"><?php echo $row['SALDO_INVENTARIO_MATERIA_PRIMA']; ?></option>
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


                                <a href="entradaInv.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarEntrada" class="btn btn-primary"> Actualizar </button>
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