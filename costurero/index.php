<?php
include('security.php');
include('includes/header1.php'); 
include('includes/navbar1.php');
?>


<!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Cabezera de la pagina -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

<!-- Content Row -->
    <div class="row">

<!-- Usuarios (Registrados) Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios Registrados</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
      
                  $query="SELECT id FROM register ORDER BY id";

                  $query_run= mysqli_query($connection, $query);
                
                  $row = mysqli_num_rows($query_run);
                  echo "<h1>$row</h1>"
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Productos (Registrados) Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Productos</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
          
                  $query="SELECT ID_PRODUCTO FROM producto ORDER BY ID_PRODUCTO";

                  $query_run= mysqli_query($connection, $query);
                
                  $row = mysqli_num_rows($query_run);
                  echo "<h1>$row</h1>"
              ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Pedidos (Registrados) Card  -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Pedidos</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
                  <?php
          
                      $query="SELECT ID_ORDEN_PRODUCCION FROM orden_produccion ORDER BY ID_ORDEN_PRODUCCION";

                      $query_run= mysqli_query($connection, $query);
                    
                      $row = mysqli_num_rows($query_run);
                      echo "<h1>$row</h1>"
                  ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Empleados (Registrados) Card  -->
  <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Empleados</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
          
                    $query="SELECT ID_EMPLEADO FROM empleado ORDER BY ID_EMPLEADO";

                    $query_run= mysqli_query($connection, $query);
                  
                    $row = mysqli_num_rows($query_run);
                    echo "<h1>$row</h1>"
                ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

<!-- Content Row -->


<?php
include('includes/scripts1.php');
include('includes/footer1.php');
?>