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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Entrada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="codeentradaInv.php" method="POST">

        <div class="modal-body">

            <?php
                $materia = "SELECT * FROM materia_prima";
                $materia_run = mysqli_query($connection, $materia);

                if(mysqli_num_rows($materia_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Materia Prima</label>
                        <select name="insertarM" class="form-control" required>
                            <option value="" >Escoge la materia prima</option>
                            <?php
                                foreach($materia_run as $row)
                                {
                            ?>
                                <option value="<?php echo $row['ID_MATERIA_PRIMA']; ?>"><?php echo $row['NOMBRE_MATERIA_PRIMA']; ?></option>
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
                $inventario = "SELECT * FROM inventario_materia_prima";
                $inventario_run = mysqli_query($connection, $inventario);

                if(mysqli_num_rows($inventario_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Invatario</label>
                        <select name="insertarI" class="form-control" required>
                            <option value="" >Escoge el inventario</option>
                            <?php
                                foreach($inventario_run as $row)
                                {
                            ?>
                                <option value="<?php echo $row['ID_INVENTARIO_MATERIA_PRIMA']; ?>"><?php echo $row['SALDO_INVENTARIO_MATERIA_PRIMA']; ?></option>
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

            <div class="form-group">
                <label> Cantidad </label>
                <input type="text" name="cantidad" class="form-control" placeholder="Ingresar Cantidad" required>
            </div>   
            <div class="form-group">
                <label> Fecha </label>
                <input type="date" name="fecha" class="form-control" required>
            </div>   
            <div class="form-group">
                <label> Saldo</label>
                <input type="text" name="saldo" class="form-control" placeholder="Ingresar Saldo " required>
            </div>     



            <?php
                $estado = "SELECT * FROM estado";
                $estado_run = mysqli_query($connection, $estado);

                if(mysqli_num_rows($estado_run) > 0)
                {   
                    ?>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control" required>
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
            <button type="submit" name="ingresarEntradaIn" class="btn btn-primary">Insertar</button>
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
                Nueva Entrada Inventario
              </button>
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
            <th> EDIT </th>
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
            <td>
                <form action="entradaInv_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="editarEntrada" class="btn btn-secondary"> <i class="fas fa-marker"></i></button>
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