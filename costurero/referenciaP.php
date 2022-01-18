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
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Referencias Productos</label>
      </h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM referencia_producto ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Talla </th>
            <th> Color </th>
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
            <td><?php echo $row['ID_REFERENCIA_PRODUCTO']; ?></td>
            <td><?php echo $row['TALLA_REFERENCIA_PRODUCTO']; ?></td>
            <td><?php echo $row['COLOR_REFERENCIA_PRODUCTO']; ?></td>
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