<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




  <div class="container-fluid">

<!-- Header de la pagina -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Panel Admin 
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Estados</label>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM estado";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre Estado </th>
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
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
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