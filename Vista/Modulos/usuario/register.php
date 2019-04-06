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

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <?php if(!empty($_GET['respuesta'])){ ?>
                        <?php if ($_GET['respuesta'] == "correcto"){ ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>el usuario se creo correctamente</strong> se ha creado correctamente.
                            </div>
                        <?php }else {?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se pudo ingresar el usuario intentalo nuevamente!!
                            </div>
                        <?php } ?>
  <?php } ?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Datos de usuario</div>
      <div class="card-body">

        <form  method="post" action="../../../Controlador/usuarioController.php?action=crear">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nombres" class="form-control" placeholder="nombres" required="required" name="nombres">
                  <label for="nombres">Nombres</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="apellidos" class="form-control" placeholder="apellidos" required="required" name="apellidos">
                  <label for="apellidos">Apellidos</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="fechaNacimiento" min="1980-01-01" max="2019-01-01" step="3" id="FcehaNacimiento" class="form-control" placeholder="fechaNacimiento" required="required">
                  <label for="fechaNacimiento">Fecha de Nacimiento</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="email" class="form-control" placeholder="Email" required="required" name="email">
                  <label for="email">Email</label>
                </div>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="telefono" class="form-control" placeholder="telefono" required="required" name="telefono">
                  <label for="telefono">Telefono</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="direccion" class="form-control" placeholder="direccion" required="required" name="direccion">
                  <label for="direccion">Direccion</label>
                </div>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select id="tipoDocumento" name="tipoDocumento" class="form-control">
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Cedula">Cedula</option>
                    <option value="Extranjera">Extranjera</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>

                <div class="col-md-6">
                    <div class="form-label-group">
                        <input type="text" id="documento" class="form-control" placeholder="documento" required="required" name="documento">
                        <label for="documento">Documento</label>
                    </div>
                </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select id="estado" name="estado" class="form-control">
                    <option value="activo" name="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select id="rol" name="rol" class="form-control">
                    <option value="Administrador">Administrador</option>
                    <option value="Farmaceuta">Farmaceuta</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Proveedor">Proveedor</option>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="Password" class="form-control" placeholder="Confirm password" required="required" name="password">
                  <label for="Password">Password</label>
                </div>
              </div>
                <div class="col-md-6">
                    <div class="form-label-group">
                        <input type="text" id="nit" class="form-control" placeholder="nit" required="required" name="nit">
                        <label for="nit">Nit</label>
                    </div>
                </div>
            </div>
          </div>


          <input type="submit" class="btn btn-primary btn-block" value="enviar">


        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="../../login.html">Inicar Sesion</a>
          <a class="d-block small" href="../../forgot-password.html">¿Olvido su calve?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
