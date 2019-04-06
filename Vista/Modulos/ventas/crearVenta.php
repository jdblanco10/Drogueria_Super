<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

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

            <form  method="post" action="../../../Controlador/ventasController.php?action=crear">

                <?php require("../../../Controlador/usuarioController.php") ?>

                <?php $arrusuarios = usuario::getAll(); ?>
                <select name="usuario">
                    <?php
                    foreach ($arrusuarios as $usuario){
                        ?>
                        <option value="<?php echo  $usuario->getIdusuario();?> "> <?php echo  $usuario->getNombres();?> <?php echo  $usuario->getRol();?> </option>
                        <?php
                    }
                    ?>


                </select>

                <div class="form-group">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" name="fechaVenta" min="1980-01-01" max="2019-01-01" step="3" id="fechaVenta" class="form-control" placeholder="fechaVenta" required="required">
                                    <label for="fechaVenta">Fecha Venta</label>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="precioVenta" class="form-control" placeholder="precioVenta" required="required" name="precioVenta">
                                <label for="precioVenta">Precio Venta</label>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="cantidadV" class="form-control" placeholder="cantidadV" required="required" name="cantidadV">
                                <label for="cantidadV">Cantidad de Venta</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="producto" class="form-control" placeholder="producto" required="required" name="producto">
                                <label for="producto">Producto</label>
                            </div>
                        </div>
                    </div>
                </div>



                <input type="submit" class="btn btn-primary btn-block" value="enviar">


            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="../../login.html">Login Page</a>
                <a class="d-block small" href="../../forgot-password.html">Forgot Password?</a>
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
