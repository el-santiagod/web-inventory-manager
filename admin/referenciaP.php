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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Referencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codereferencia.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Talla </label>
                <input type="text" name="TALLA_REFERENCIA_PRODUCTO" class="form-control" placeholder="Ingresar Talla" required>
            </div>   
            <div class="form-group">
                <label> Color </label>
                <input type="text" name="COLOR_REFERENCIA_PRODUCTO" class="form-control" placeholder="Ingresar Color" required>
            </div>    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="ingresarref" class="btn btn-primary">Insertar</button>
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
                Nueva Referencia 
              </button>
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
            <td><?php echo $row['ID_REFERENCIA_PRODUCTO']; ?></td>
            <td><?php echo $row['TALLA_REFERENCIA_PRODUCTO']; ?></td>
            <td><?php echo $row['COLOR_REFERENCIA_PRODUCTO']; ?></td>
            <td>
                <form action="referenciaP_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_REFERENCIA_PRODUCTO']; ?>">
                    <button  type="submit" name="editarref" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
                </form>
            </td>
            <td>
                <form action="codereferencia.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['ID_REFERENCIA_PRODUCTO']; ?>">
                  <button type="submit" name="eliminarref" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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