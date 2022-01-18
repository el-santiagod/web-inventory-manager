<?php
ob_start();
?>

<?php
include('security.php');
include('includes/header1.php'); 
?>

<?php
$query = "SELECT * FROM  empleado  ";
$query_run = mysqli_query($connection, $query);
?>



<!-- Grilla de la pagina -->
  <h1 class="float-right">REPORTE EMPLEADO </h1>
  <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/aplicativo-web-sr/img/Logo_SR2.jpg" class="w-25 p-3">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Fecha </th>
            <th> Telefono </th>
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
<?php
$html = ob_get_clean();
// echo $html;


require_once '../libereria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

// $dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("Reporte_Empleado.pdf", array("Attachment" => false));



?>