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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Detalle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codedetalleProd.php" method="POST">

        <div class="modal-body">

            <?php
                $orden = "SELECT * FROM orden_produccion";
                $orden_run = mysqli_query($connection, $orden);

                if(mysqli_num_rows($orden_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Orden Produccion</label>
                        <select name="insertarOrden" class="form-control" required>
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
                        <select name="insertarM" class="form-control" required>
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

            <div class="form-group">
                <label> Producto </label>
                <input type="text" name="producto" class="form-control" placeholder="Ingresar Producto" required>
            </div>   
            <div class="form-group">
                <label> Cantidad </label>
                <input type="text" name="cantidad" class="form-control" placeholder="Ingresar Producto" required>
            </div>   
            <div class="form-group">
                <label> Valor </label>
                <input type="text" name="valor" class="form-control" placeholder="Ingresar Valor " required>
            </div>     

            
            

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="ingresarDetalle" class="btn btn-primary">Insertar</button>
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
                Nuevo Detalle
              </button>
      </h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">
      <?php

        $query = "SELECT * FROM  detalle_orden_produccion";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Orden Produccion </th>
            <th> Materia Prima </th>
            <th> Producto </th>
            <th> Cantidad </th>
            <th> Valor </th>
            <th> EDIT </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          { 
                $orden = $row['ID_ORDEN_PRODUCCION_FK_DETALLE_ORDEN_PRODUCCION'];
                $orden_cate = "SELECT * FROM orden_produccion WHERE ID_ORDEN_PRODUCCION='$orden' ";
                $orden_cate_run = mysqli_query($connection, $orden_cate);

                $materia = $row['ID_MATERIA_PRIMA_FK_DETALLE_ORDEN_PRODUCCION'];
                $materia_cate = "SELECT * FROM materia_prima  WHERE ID_MATERIA_PRIMA='$materia' ";
                $materia_cate_run = mysqli_query($connection, $materia_cate);

            ?>
        <tr>
            <td>
                <?php foreach($orden_cate_run as $orden_row) { echo $orden_row['FECHA_ORDEN_PRODUCCION']; } ?>
            </td>
            <td>
                <?php foreach($materia_cate_run as $in_row) { echo $in_row['NOMBRE_MATERIA_PRIMA']; } ?>
            </td>
            <td><?php echo $row['PRODUCTO_DETALLE_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['CANTIDAD_DETALLE_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['VALOR_DETALLE_ORDEN_PRODUCCION']; ?></td>
            <td>
                <form action="detalleProd_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="editarDetalle" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>