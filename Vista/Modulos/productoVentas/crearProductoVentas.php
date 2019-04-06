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

            <form  method="post" action="../../../Controlador/productoVentasController.php?action=crear">



                <?php require("../../../Controlador/ventasController.php") ?>


                <?php $arrventas = ventas::getAll(); ?>
                <select name="ventas">
                    <?php
                    foreach ($arrventas as $ventas){
                        ?>
                        <option value="<?php echo  $ventas->getIdventas();?> "> <?php echo  $ventas->getCantidadV();?></option>
                        <?php
                    }
                    ?>
                </select>



                <?php require("../../../Controlador/categoriasController.php") ?>


                <?php $arrcategorias = categorias::getAll(); ?>
                <select name="categorias">
                    <?php
                    foreach ($arrcategorias as $categorias){
                        ?>
                        <option value="<?php echo  $categorias->getidcategorias();?> "> <?php echo  $categorias->getnombre();?></option>
                        <?php
                    }
                    ?>
                </select>

                </select>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="cantidad" class="form-control" placeholder="cantidad" required="required" name="cantidad">
                                <label for="cantidad">Cantidad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="text" id="precioProducto" class="form-control" placeholder="precioProducto" required="required" name="precioProducto">
                                <label for="precioProducto">PrecioProducto</label>
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
