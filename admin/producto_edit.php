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
                    <h6 class="m-0 font-weight-bold text-primary"> Editar Producto </h6>
                </div>
        <div class="card-body">
        <!-- Contenedor de los txt y los sus comandos -->
            <?php
                if(isset($_POST['editarProducto']))
                {
                    $connection = mysqli_connect("localhost","root","","argos_inventario");
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM producto WHERE ID_PRODUCTO='$id' ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $row)
                    {
                        ?>

                            <form action="codeproducto.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ID_PRODUCTO']; ?>">

                                

                                <div class="form-group">
                                    <label> Nombre </label>
                                    <input type="text" name="edit_nombre" value="<?php echo $row['NOMBRE_PRODUCTO']; ?>" class="form-control"placeholder="Ingresar Nombre" required>
                                </div> 
                                
                                <div class="form-group">
                                    <label> Cantiadad Minima </label>
                                    <input type="text" name="edit_cantidadmin" value="<?php echo $row['CANTIDAD_MIN_PRODUCTO']; ?>" class="form-control"placeholder="Ingresar Cantidad Minima" required>
                                </div>
                                  
                                <div class="form-group">
                                    <label> Cantidad Maxima </label>
                                    <input type="text" name="edit_cantidadmax" value="<?php echo $row['CANTIDAD_MAX_PRODUCTO']; ?>" class="form-control"placeholder="Ingresar Cantidad Maxima" required>
                                </div>

                                    <?php
                                        $proveedor = "SELECT * FROM proveedor";
                                        $proveedor_run = mysqli_query($connection, $proveedor);

                                        if(mysqli_num_rows($proveedor_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Proveedor</label>
                                                <select name="edit_prove" class="form-control" required>
                                                    <option value="" >Escoge el proveedor</option>
                                                    <?php
                                                        foreach($proveedor_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_PROVEEDOR']; ?>"><?php echo $row['NOMBRE_PROVEEDOR']; ?></option>
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
                                        $refprod = "SELECT * FROM referencia_producto";
                                        $ref_prod_run = mysqli_query($connection, $refprod);

                                        if(mysqli_num_rows($ref_prod_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Referencia</label>
                                                <select name="edit_ref" class="form-control" required>
                                                    <option value="" >Escoge la referencia</option>
                                                    <?php
                                                        foreach($ref_prod_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_REFERENCIA_PRODUCTO']; ?>"><?php echo $row['ID_REFERENCIA_PRODUCTO']; ?></option>
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
                                        $empleado = "SELECT * FROM empleado";
                                        $empleado_run = mysqli_query($connection, $empleado);

                                        if(mysqli_num_rows($empleado_run) > 0)
                                        {   
                                            ?>
                                            <div class="form-group">
                                                <label>Empleado</label>
                                                <select name="edit_empleado" class="form-control" required>
                                                    <option value="" >Escoge el empleado</option>
                                                    <?php
                                                        foreach($empleado_run as $row)
                                                        {
                                                    ?>
                                                        <option value="<?php echo $row['ID_EMPLEADO']; ?>"><?php echo $row['NOMBRE_EMPLEADO']; ?></option>
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







                                <a href="producto.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="actualizarProducto" class="btn btn-primary"> Actualizar </button>
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