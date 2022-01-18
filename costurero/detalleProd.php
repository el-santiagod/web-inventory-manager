<?php
include('security.php');
include('includes/header1.php'); 
include('includes/navbar1.php'); 
?>


  <div class="container-fluid">

<!-- Header de la pagina -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Panel Costurero
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Detalle Producto</label>
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
include('includes/scripts1.php');
include('includes/footer1.php');
?>