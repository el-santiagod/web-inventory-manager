  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Cabezera -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class='bx bx-folder-open'></i>
    </div>
    <div class="sidebar-brand-text mx-3">System <sup>SR</sup></div>
  </a>

<!-- Divider -->
  <hr class="sidebar-divider my-0">

<!-- Item del Nav - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

<!-- Divider -->
  <hr class="sidebar-divider">

<!-- Texto cabezera -->
  <div class="sidebar-heading">
    Interfaz
  </div>





<!-- Item del Nav - Gestion De Usuarios -->
  <li class="nav-item">
    <a class="nav-link" href="register.php">
      <i class='bx bx-grid-alt'></i>
      <span>Gestion De Usuarios</span></a>
  </li>
<!-- Item del Nav - Gestion De Usuarios -->
  <li class="nav-item">
    <a class="nav-link" href="estado.php">
    <i class='bx bx-stats'></i>
      <span>Estado</span></a>
  </li>
<!-- Item del Nav -  Cargo -->  
  <li class="nav-item">
    <a class="nav-link" href="cargo.php">
    <i class='bx bx-repost'></i>
      <span>Cargo</span></a>
  </li>
<!-- Item del Nav -  Referencia Producto -->
  <li class="nav-item">
    <a class="nav-link" href="referenciaP.php">
    <i class='bx bx-search-alt' ></i>
      <span>Referencia Producto</span></a>
  </li>






<!-- Item del Nav -  Materia prima -->  
  <li class="nav-item">
    <a class="nav-link" href="materiaprima.php">
    <i class='bx bx-receipt' ></i>
      <span>Materia prima</span></a>
  </li>

<!-- Item del Nav -  Inventario -->  
  <li class="nav-item">
    <a class="nav-link" href="inventario.php">
    <i class='bx bx-coin-stack'></i>
      <span>Inventario</span></a>
  </li>

<!-- Item del Nav -  Orden Produccion -->   
  <li class="nav-item">
    <a class="nav-link" href="ordenprodu.php">
    <i class='bx bx-list-check' ></i>
      <span>Orden Produccion</span></a>
  </li>


<!-- Item del Nav -  Proveedor -->  
  <li class="nav-item">
    <a class="nav-link" href="proveedor.php">
    <i class='bx bx-basket' ></i>
      <span>Proveedor</span></a>
  </li>

<!-- Item del Nav -  Empleado --> 
  <li class="nav-item">
    <a class="nav-link" href="empleado.php">
    <i class='bx bx-user' ></i>
      <span>Empleado</span></a>
  </li>
<!-- Item del Nav -  Producto -->
  <li class="nav-item">
    <a class="nav-link" href="producto.php">
      <i class='bx bx-box'></i>
      <span>Producto</span></a>
  </li>

<!-- Item del Nav -  Entrada Inventario -->
  <li class="nav-item">
    <a class="nav-link" href="entradaInv.php">
    <i class='bx bx-right-arrow-circle'></i>
      <span>Entrada Inventario</span></a>
  </li>
<!-- Item del Nav -  Salida Inventario -->
  <li class="nav-item">
    <a class="nav-link" href="salidaInv.php">
    <i class='bx bx-left-arrow-circle'></i>
      <span>Salida Inventario</span></a>
  </li>
<!-- Item del Nav -  Detalle Produccion -->
  <li class="nav-item">
    <a class="nav-link" href="detalleProd.php">
      <i class='bx bx-duplicate' ></i>
      <span>Detalle Produccion</span></a>
  </li>




<!-- Divider --> 
  <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Boton (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Boton Responsive (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

        <!-- Topbar Buscador -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscador..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - Informacion del usuario -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $_SESSION['username']; ?>
                </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - Informacion del usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesion
                </a>
              </div>
            </li>

          </ul>

          </nav>
        <!-- End of Topbar -->


  <!-- Boton Scroll Up-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  
  <!-- Modal Cerrar Sesion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Listo para irte?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Cerras sesion si selecciones el boton "Logout". Deseas cerrar sesion?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

            <form action="logout.php" method="POST"> 
            
              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

            </form>


          </div>
        </div>
      </div>
    </div>