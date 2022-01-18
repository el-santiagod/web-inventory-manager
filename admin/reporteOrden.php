<?php
ob_start();
?>

<?php
include('security.php');
include('includes/header.php'); 
?>

<?php
$query = "SELECT * FROM  orden_produccion  ";
$query_run = mysqli_query($connection, $query);
?>



<!-- Grilla de la pagina -->
    <h1 class="float-right">REPORTE ORDEN PRODUCCION </h1>  
    <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/aplicativo-web-sr/img/Logo_SR2.jpg" class="w-25 p-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Fecha </th>
            <th> Cantidad </th>
            <th> Observacion </th>
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
            <td><?php echo $row['ID_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['FECHA_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['CANTIDAD_ORDEN_PRODUCCION']; ?></td>
            <td><?php echo $row['OBSERVACION_ORDEN_PRODUCCION']; ?></td>
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

$dompdf->stream("Reporte_Orden_Produccion.pdf", array("Attachment" => false));



?>