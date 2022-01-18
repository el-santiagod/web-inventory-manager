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
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Ordenes de Produccion</label>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM orden_produccion  ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Fecha </th>
            <th> Cantidad </th>
            <th> Observacion </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
            <td><?php echo $row['ID_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['FECHA_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['CANTIDAD_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['OBSERVACION_ORDEN_PRODUCCION']; ?></td>
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
    <a href="reporteOrden.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
    class="fas fa-download fa-sm text-white-50 "></i> Reporte de la Orden</a>
  </div> 
<!-- /.container-fluid -->

<?php
include('includes/scripts1.php');
include('includes/footer1.php');
?>