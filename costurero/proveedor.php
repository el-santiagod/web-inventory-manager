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
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Proveedores</label>
      </h6>
    </div>
    <div class="card-body">


      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM  proveedor   ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Telefono </th>
            <th> Direccion </th>
            <th> Materia Prima </th>
            <th> Estado </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          { 
                $materiaid = $row['ID_MATERIA_PRIMA_FK_PROVEEDOR'];
                $materia_cate = "SELECT * FROM materia_prima WHERE ID_MATERIA_PRIMA='$materiaid' ";
                $materia_cate_run = mysqli_query($connection, $materia_cate);

                $estadoid = $row['ID_ESTADO_FK_PROVEEDOR'];
                $estado_cate = "SELECT * FROM estado WHERE id='$estadoid' ";
                $estado_cate_run = mysqli_query($connection, $estado_cate);
            ?>
          <tr>
            <td><?php echo $row['ID_PROVEEDOR']; ?></td>
            <td><?php echo $row['NOMBRE_PROVEEDOR']; ?></td>
            <td><?php echo $row['TELEFONO_PROVEEDOR']; ?></td>
            <td><?php echo $row['DIRECCION_PROVEEDOR']; ?></td>
            <td>
                <?php foreach($materia_cate_run as $materiarow) { echo $materiarow['NOMBRE_MATERIA_PRIMA'];  }  ?>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts1.php');
include('includes/footer1.php');
?>