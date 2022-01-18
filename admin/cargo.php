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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codecargo.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Cargo </label>
                <input type="text" name="NOMBRE_CARGO" class="form-control" placeholder="Ingresar Cargo" required>
            </div>      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="ingresarcargo" class="btn btn-primary">Insertar</button>
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
                Nuevo Cargo 
              </button>
      </h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM cargo";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre Cargo </th>
            <th>EDIT </th>
            <th>DELETE </th>
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
            <td><?php echo $row['ID_CARGO']; ?></td>
            <td><?php echo $row['NOMBRE_CARGO']; ?></td>
            <td>
                <form action="cargo_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_CARGO']; ?>">
                    <button  type="submit" name="editarcargo" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
                </form>
            </td>
            <td>
                <form action="codecargo.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['ID_CARGO']; ?>">
                  <button type="submit" name="eliminarcargo" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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