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
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Empleados</label>
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
include('includes/scripts1.php');
include('includes/footer1.php');
?>