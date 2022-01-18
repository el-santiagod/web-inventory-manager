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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Usuario </label>
                <input type="text" name="usuario" class="form-control" placeholder="Ingresar Usuario" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Ingresar Email" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="contraseña" class="form-control" placeholder="Ingresar Contraseña" required>
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirmarcontra" class="form-control" placeholder="Confirmar Contraseña" required>
            </div>
            
            <input type="hidden" name="usertype" value="Administrador">

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Insertar</button>
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
              <button type="button"  class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
                Nuevo Usuario 
              </button>
      </h6>
    </div>
    <div class="card-body">

    

      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Usuario </th>
            <th>Email </th>
            <th>Contraseña</th>
            <th>Tipo de usuario</th>
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
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['usertype']; ?></td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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