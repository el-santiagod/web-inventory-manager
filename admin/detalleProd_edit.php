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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Detalle </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarDetalle']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM detalle_orden_produccion WHERE id='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codedetalleProd.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                                <div class="form-group">
                                    <label> Producto </label>
                                    <input type="text" name="edit_producto" value="<?php echo $row['PRODUCTO_DETALLE_ORDEN_PRODUCCION']; ?>" class="form-control"placeholder="Ingresar Producto" required>
                                </div> 

                                <div class="form-group">
                                    <label> Cantidad </label>
                                    <input type="text" name="edit_cantidad" value="<?php echo $row['CANTIDAD_DETALLE_ORDEN_PRODUCCION']; ?>" class="form-control"placeholder="Ingresar Cantidad" required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Valor </label>
                                    <input type="text" name="edit_valor" value="<?php echo $row['VALOR_DETALLE_ORDEN_PRODUCCION']; ?>" class="form-control"placeholder="Ingresar Valor" required>
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


                                <a href="codedetalleProd.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarDetalle" class="btn btn-primary"> Actualizar </button>
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