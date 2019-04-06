<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Drogueria-Super</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">


  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../../index.php">Drogueria Super</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>



  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="../../login.html">Login</a>
          <a class="dropdown-item" href="../../register.html">Register</a>
          <a class="dropdown-item" href="../../forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="../../404.php">404 Page</a>
          <a class="dropdown-item" href="../../blank.php">Blank Page</a>
        </div>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Añadir</span>
            </a>
            //aca
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Modelos para añadir:</h6>
                <a class="dropdown-item" href="Modulos/usuario/register.php">Usuarios</a>
                <a class="dropdown-item" href="Modulos/categorias/crearCategorias.php">Categorias</a>
                <a class="dropdown-item" href="Modulos/inventario/crearInventario.php">Inventario</a>
                <a class="dropdown-item" href="Modulos/compras/crearCompras.php">Compras</a>
                <a class="dropdown-item" href="Modulos/ventas/crearVenta.php">Ventas</a>
                <a class="dropdown-item" href="Modulos/productoCompras/crearProductoCompras.php">Producto de Compras</a>
                <a class="dropdown-item" href="Modulos/productoVentas/crearProductoVentas.php">Producto de Ventas</a>
                <a class="dropdown-item" href="Modulos/productos/crearProductos.php">Productos</a>
                <a class="dropdown-item" href="Modulos/inventario/crearInventario.php">Inventario</a>
            </div>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="../../charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>

      <!-- /.container-fluid -->

      <?php require("../../../Controlador/usuarioController.php") ?>

      <section>


          <div class="col-lg-40">
              <div class="card">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                  <th>IdUsuario</th>
                                  <th>Documento</th>
                                  <th>Nombres</th>
                                  <th>Apellidos</th>
                                  <th>Fecha Nacimiento</th>
                                  <th>Email</th>
                                  <th>Telefono</th>
                                  <th>Direccion</th>
                                  <th>Estado</th>
                                  <th>Rol</th>
                                  <th>Password</th>
                                  <th>Tipo Documento</th>
                                  <th>Nit</th>
                                  <th>Eliminar</th>
                                  <th>Editar</th>>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $arrUsuario = usuario::getAll();
                              foreach ($arrUsuario as $usuario){
                                  ?>
                                  <tr>
                                      <td><?php echo $usuario->getIdusuario();?></td>
                                      <td><?php echo $usuario->getDocumento(); ?></td>
                                      <td><?php echo $usuario->getNombres(); ?></td>
                                      <td><?php echo $usuario->getApellidos(); ?></td>
                                      <td><?php echo $usuario->getFechaNacimiento(); ?></td>
                                      <td><?php echo $usuario->getEmail(); ?></td>
                                      <td><?php echo $usuario->getTelefono(); ?></td>
                                      <td><?php echo $usuario->getDireccion(); ?></td>
                                      <td><?php echo $usuario->getEstado(); ?></td>
                                      <td><?php echo $usuario->getRol(); ?></td>
                                      <td><?php echo $usuario->getPassword(); ?></td>
                                      <td><?php echo $usuario->getTipoDocumento(); ?></td>
                                      <td><?php echo $usuario->getNit(); ?></td>
                                      <td><a href="eliminarUsuario.php">Eliminar</a></td>
                                      <td><a href="editarUsuario.php?id=<?php echo $usuario->getIdusuario(); ?> ">Editar</a></td>
                                  </tr>
                              <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

      </section>

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Drogueria-Super 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->




  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../../login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.map"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
