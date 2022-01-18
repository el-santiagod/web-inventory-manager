<?php
ob_start();
?>

<?php
include('security.php');
include('includes/header1.php'); 
?>

<?php
$query = "SELECT * FROM  producto  ";
$query_run = mysqli_query($connection, $query);
?>



<!-- Grilla de la pagina -->
    <h1 class="float-right">REPORTE PRODUCTO </h1>
    <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/aplicativo-web-sr/img/Logo_SR2.jpg" class="w-25 p-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Cantidad Min </th>
            <th> Cantidad Max </th>
            <th> Proveedor </th>
            <th> Referencia </th>
            <th> Empleado </th>
            <th> Estado </th>
          </tr>
        </thead>
        <tbody>

        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          { 
                $proveedor = $row['ID_PROVEEDOR_FK_PRODUCTO'];
                $proveedor_cate = "SELECT * FROM proveedor WHERE ID_PROVEEDOR='$proveedor' ";
                $proveedor_cate_run = mysqli_query($connection, $proveedor_cate);

                $empleado = $row['ID_EMPLEADO_FK_PRODUCTO'];
                $empleado_cate = "SELECT * FROM empleado WHERE ID_EMPLEADO='$empleado' ";
                $empleado_cate_run = mysqli_query($connection, $empleado_cate);

                $estadoid = $row['ID_ESTADO_FK_PRODUCTO'];
                $estado_cate = "SELECT * FROM estado WHERE id='$estadoid' ";
                $estado_cate_run = mysqli_query($connection, $estado_cate);
            ?>
          <tr>
            <td><?php echo $row['ID_PRODUCTO']; ?></td>
            <td><?php echo $row['NOMBRE_PRODUCTO']; ?></td>
            <td><?php echo $row['CANTIDAD_MIN_PRODUCTO']; ?></td>
            <td><?php echo $row['CANTIDAD_MAX_PRODUCTO']; ?></td>
            <td>
                <?php foreach($proveedor_cate_run as $proveedor_row) { echo $proveedor_row['NOMBRE_PROVEEDOR'];  }  ?>
            </td>
            <td><?php echo $row['ID_REFERENCIA_PRODUCTO_FK_PRODUCTO']; ?></td>
            <td>
                <?php foreach($empleado_cate_run as $empleado_row) { echo $empleado_row['NOMBRE_EMPLEADO'];  }  ?>
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

$dompdf->stream("Reporte_Producto.pdf", array("Attachment" => false));



?>