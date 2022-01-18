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
      <label class=" text-primary float-right" data-toggle="modal" data-target="#addadminprofile">Tabla Entrada Inventario</label>
      </h6>
    </div>
    <div class="card-body">

      <div class="table-responsive">

      <?php

        $query = "SELECT * FROM  entrada_inventario   ";
        $query_run = mysqli_query($connection, $query);

      ?>

<!-- Grilla de la pagina -->
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Materia Prima </th>
            <th> Inventario </th>
            <th> Cantidad </th>
            <th> Fecha </th>
            <th> Saldo </th>
            <th> Estado </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          { 
                $materia = $row['ID_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO'];
                $materia_cate = "SELECT * FROM materia_prima WHERE ID_MATERIA_PRIMA='$materia' ";
                $materia_cate_run = mysqli_query($connection, $materia_cate);

                $inventario = $row['ID_INVENTARIO_MATERIA_PRIMA_FK_ENTRADA_INVENTARIO'];
                $inventario_cate = "SELECT * FROM inventario_materia_prima WHERE ID_INVENTARIO_MATERIA_PRIMA='$inventario' ";
                $inventario_cate_run = mysqli_query($connection, $inventario_cate);

                $estadoid = $row['ID_ESTADO_FK_ENTRADA_INVENTARIO'];
                $estado_cate = "SELECT * FROM estado WHERE id='$estadoid' ";
                $estado_cate_run = mysqli_query($connection, $estado_cate);
            ?>
        <tr>
            <td>
                <?php foreach($materia_cate_run as $materia_row) { echo $materia_row['NOMBRE_MATERIA_PRIMA']; } ?>
            </td>
            <td>
                <?php foreach($inventario_cate_run as $in_row) { echo $in_row['SALDO_INVENTARIO_MATERIA_PRIMA']; } ?>
            </td>
            <td><?php echo $row['CANTIDAD_ENTRADA_INVENTARIO']; ?></td>
            <td><?php echo $row['FECHA_ENTRADA_INVENTARIO']; ?></td>
            <td><?php echo $row['SALDO_ENTRADA_INVENTARIO']; ?></td>
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