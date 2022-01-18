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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Materia Prima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codemateria.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nombre </label>
                <input type="text" name="ingresarN" class="form-control" placeholder="Ingresar Nombre" required>
            </div>   
            <div class="form-group">
                <label> Cantidad </label>
                <input type="text" name="ingresarC" class="form-control" placeholder="Ingresar Cantidad" required>
            </div>   
            <div class="form-group">
                <label> Valor</label>
                <input type="text" name="ingresarV" class="form-control" placeholder="Ingresar Precio" required>
            </div>     
            <div class="form-group">
                <label> Descripcion</label>
                <input type="description" name="ingresarD" class="form-control" placeholder="Ingresar Descripcion" required>
            </div>  

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="ingresarMateria" class="btn btn-primary">Insertar</button>
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
                Nueva Materia Prima 
              </button>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM materia_prima ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Cantidad </th>
            <th> Valor </th>
            <th> Descripcion </th>
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
            <td><?php echo $row['ID_MATERIA_PRIMA']; ?></td>
            <td><?php echo $row['NOMBRE_MATERIA_PRIMA']; ?></td>
            <td><?php echo $row['CANTIDAD_MATERIA_PRIMA']; ?></td>
            <td><?php echo $row['VALOR_MATERIA_PRIMA']; ?></td>
            <td><?php echo $row['DESCRIPCION_MATERIA_PRIMA']; ?></td>
            <td>
                <form action="materiaprima_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_MATERIA_PRIMA']; ?>">
                    <button  type="submit" name="editarMateria" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
                </form>
            </td>
            <td>
                <form action="codemateria.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['ID_MATERIA_PRIMA']; ?>">
                  <button type="submit" name="eliminarMateria" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
    <a href="reporteMateria.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
    class="fas fa-download fa-sm text-white-50 "></i> Reporte de la Materia</a>
  </div>  
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>