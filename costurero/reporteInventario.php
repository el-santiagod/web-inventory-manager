<?php
ob_start();
?>

<?php
include('security.php');
include('includes/header1.php'); 
?>

<?php
$query = "SELECT * FROM  inventario_materia_prima ";
$query_run = mysqli_query($connection, $query);
?>



<!-- Grilla de la pagina -->
    <h1 class="float-right">REPORTE INVETARIO</h1>
    <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/aplicativo-web-sr/img/Logo_SR2.jpg" class="w-25 p-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Saldo </th>
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
            <td><?php echo $row['ID_INVENTARIO_MATERIA_PRIMA']; ?></td>
            <td><?php echo $row['SALDO_INVENTARIO_MATERIA_PRIMA']; ?></td>
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

$dompdf->stream("Reporte_Inventario.pdf", array("Attachment" => false));



?>