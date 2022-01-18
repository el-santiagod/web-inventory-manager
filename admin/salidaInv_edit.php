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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Salida </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarSalida']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM salida_inventario WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codesalidaInv.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                                <div class="form-group">
                                    <label> Cantidad </label>
                                    <input type="text" name="edit_cantidad" value="<?php echo $row['CANTIDAD_SALIDA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Cantidad" required>
                                </div> 

                                <div class="form-group">
                                    <label> Fecha </label>
                                    <input type="date" name="edit_fecha" value="<?php echo $row['FECHA_SALIDA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Fecha" required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Saldo </label>
                                    <input type="text" name="edit_saldo" value="<?php echo $row['SALDO_SALIDA_INVENTARIO']; ?>" class="form-control"placeholder="Ingresar Saldo" required>
                                </div>


                                    <?php
                                        $orden = "SELECT * FROM orden_produccion";
                                        $orden_run = mysqli_query($connection, $orden);

                                        if(mysqli_num_rows($orden_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Orden Produccion</label>
                                                <select name="edit_orden" class="form-control" required>
                                                    <option value="" >Escoge la orden produccion</option>
                                                    <?php
                                                        foreach($orden_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_ORDEN_PRODUCCION']; ?>"><?php echo $row['FECHA_ORDEN_PRODUCCION']; ?></option>
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


                                <a href="salidaInv.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarSalida" class="btn btn-primary"> Actualizar </button>
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