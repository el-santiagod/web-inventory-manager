<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- Seccion Modal del nuevo usuario -->
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codeproducto.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nombre </label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" required>
            </div>   
            <div class="form-group">
                <label> Cantidad Minima </label>
                <input type="text" name="cantidad_min" class="form-control"  placeholder="Ingresar Cantidad Minima" required>
            </div>   
            <div class="form-group">
                <label> Cantidad Maxima</label>
                <input type="text" name="cantidad_max" class="form-control" placeholder="Ingresar Cantidad Maxima " required>
            </div>     

            <?php
                $proveedor = "SELECT * FROM proveedor";
                $proveedor_run = mysqli_query($connection, $proveedor);

                if(mysqli_num_rows($proveedor_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select name="insertarP" class="form-control" required>
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
                $ref_prod = "SELECT * FROM  referencia_producto ";
                $ref_prod_run = mysqli_query($connection, $ref_prod);

                if(mysqli_num_rows($ref_prod_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Referencia del Producto</label>
                        <select name="insertarR" class="form-control" required>
                            <option value="" >Escoge la referencia del producto</option>
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
                $empleado = "SELECT * FROM  empleado ";
                $empleado_run = mysqli_query($connection, $empleado);

                if(mysqli_num_rows($empleado_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Empleado</label>
                        <select name="insertarE" class="form-control" required>
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
                        <select name="estado" class="form-control" required>
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

            
            

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="ingresarProducto" class="btn btn-primary">Insertar</button>
        </div>
      </form>

    </div>
  </div>
  </div>



  <div class="container-fluid">

<!-- Header de la pagina -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Panel Admin
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
                Nuevo Producto 
              </button>
      </h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM  producto   ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Cantidad Min </th>
            <th> Cantidad Max </th>
            <th> Proveedor </th>
            <th> Referencia </th>
            <th> Empleado </th>
            <th> Estado </th>
            <th> EDIT </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          { 
                $proveedor = $row['ID_PROVEEDOR_FK_PRODUCTO'];
                $proveedor_cate = "SELECT * FROM proveedor WHERE ID_PROVEEDOR='$proveedor' ";
                $proveedor_cate_run = mysqli_query($connection, $proveedor_cate);

                $empleado = $row['ID_EMPLEADO_FK_PRODUCTO'];
                $empleado_cate = "SELECT * FROM empleado WHERE ID_EMPLEADO='$empleado' ";
                $empleado_cate_run = mysqli_query($connection, $empleado_cate);

                $estadoid = $row['ID_ESTADO_FK_PRODUCTO'];
                $estado_cate = "SELECT * FROM estado WHERE id='$estadoid' ";
                $estado_cate_run = mysqli_query($connection, $estado_cate);
            ?>
          <tr>
            <td><?php echo $row['ID_PRODUCTO']; ?></td>
            <td><?php echo $row['NOMBRE_PRODUCTO']; ?></td>
            <td><?php echo $row['CANTIDAD_MIN_PRODUCTO']; ?></td>
            <td><?php echo $row['CANTIDAD_MAX_PRODUCTO']; ?></td>
            <td>
                <?php foreach($proveedor_cate_run as $proveedor_row) { echo $proveedor_row['NOMBRE_PROVEEDOR'];  }  ?>
            </td>
            <td><?php echo $row['ID_REFERENCIA_PRODUCTO_FK_PRODUCTO']; ?></td>
            <td>
                <?php foreach($empleado_cate_run as $empleado_row) { echo $empleado_row['NOMBRE_EMPLEADO'];  }  ?>
            </td>
            <td>
                <?php foreach($estado_cate_run as $estado_row) { echo $estado_row['nombre'];  }  ?>
            </td>
            <td>
                <form action="producto_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_PRODUCTO']; ?>">
                    <button  type="submit" name="editarProducto" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
                </form>
            </td>
          </tr>
          <?php
          }
        }
        else
        {
          echo"No se encontraron datos";
        }


        ?>
        
        </tbody>
      </table>

    </div>
  </div>
  </div>

  </div>
<!-- Reporte de la pagina -->
  <div class="d-sm-flex align-items-center justify-content-center mb-3">
    <a href="reporteProducto.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
    class="fas fa-download fa-sm text-white-50 "></i> Reporte del Producto</a>
  </div> 
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>