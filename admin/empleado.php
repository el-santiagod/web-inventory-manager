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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codeempleado.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nombre </label>
                <input type="text" name="NOMBRE_EMPLEADO" class="form-control" placeholder="Ingresar Nombre "required>
            </div>   
            <div class="form-group">
                <label> Fecha de Ingreso </label>
                <input type="date" name="FECHA_INGRESO_EMPLEADO" class="form-control" required>
            </div>   
            <div class="form-group">
                <label> Telefono</label>
                <input type="text" name="TELEFONO_EMPLEADO" class="form-control" placeholder="Ingresar Telefono " required>
            </div>     
            <div class="form-group">
                <label> Direccion</label>
                <input type="description" name="DIRECCION_EMPLEADO" class="form-control" placeholder="Ingresar direccion " required>
            </div>  
            <div class="form-group">
                <label> Salario</label>
                <input type="description" name="SALARIO_EMPLEADO" class="form-control" placeholder="Ingresar Salario " required>
            </div>  


            <?php
                $cargo = "SELECT * FROM cargo";
                $cargo_run = mysqli_query($connection, $cargo);

                if(mysqli_num_rows($cargo_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Cargo</label>
                        <select name="ID_CARGO_FK_EMPLEADO" class="form-control" required>
                            <option value="" >Escoge el cargo</option>
                            <?php
                                foreach($cargo_run as $row)
                                {
                            ?>
                                <option value="<?php echo $row['ID_CARGO']; ?>"><?php echo $row['NOMBRE_CARGO']; ?></option>
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
                        <select name="ID_ESTADO_FK_EMPLEADO" class="form-control" required>
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
            <button type="submit" name="ingresarEmpleado" class="btn btn-primary">Insertar</button>
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
                Nuevo Empleado 
              </button>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM  empleado  ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Fecha </th>
            <th> Telefono </th>
            <th> Direccion </th>
            <th> Salario </th>
            <th> Cargo </th>
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
                $cargoid = $row['ID_CARGO_FK_EMPLEADO'];
                $cargo_cate = "SELECT * FROM cargo WHERE ID_CARGO='$cargoid' ";
                $cargo_cate_run = mysqli_query($connection, $cargo_cate);

                $estadoid = $row['ID_ESTADO_FK_EMPLEADO'];
                $estado_cate = "SELECT * FROM estado WHERE id='$estadoid' ";
                $estado_cate_run = mysqli_query($connection, $estado_cate);
            ?>
          <tr>
            <td><?php echo $row['ID_EMPLEADO']; ?></td>
            <td><?php echo $row['NOMBRE_EMPLEADO']; ?></td>
            <td><?php echo $row['FECHA_INGRESO_EMPLEADO']; ?></td>
            <td><?php echo $row['TELEFONO_EMPLEADO']; ?></td>
            <td><?php echo $row['DIRECCION_EMPLEADO']; ?></td>
            <td><?php echo $row['SALARIO_EMPLEADO']; ?></td>
            <td>
                <?php foreach($cargo_cate_run as $cargo_row) { echo $cargo_row['NOMBRE_CARGO'];  }  ?>
            </td>
            <td>
                <?php foreach($estado_cate_run as $estado_row) { echo $estado_row['nombre'];  }  ?>
            </td>
            <td>
                <form action="empleado_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ID_EMPLEADO']; ?>">
                    <button  type="submit" name="editarEmpleado" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
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
    <a href="reporteEmpleado.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
    class="fas fa-download fa-sm text-white-50 "></i> Reporte del Empleado</a>
  </div>  
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>