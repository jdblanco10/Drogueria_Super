<!DOCTYPE html>
<html lang="en">
<?php require "../../../Controlador/productoComprasController.php"; ?>
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
            <strong>el usuario!</strong> se ha creado correctamente.
        </div>
    <?php }else {?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> no se pudo ingresar el usuario intente nuevamente...
        </div>
    <?php } ?>
<?php } ?>


<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Datos de usuario</div>
        <div class="card-body">
            <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                <?php
                $productoCompras = productoComprasController::buscarID($_GET["id"]);
                ?>

                <form  method="post" action="../../../Controlador/productoComprasController.php?action=editar">

                    <div class="form-group row">
                        <input type="hidden" value="<?php echo $productoCompras->getIdproductoCompras()?>" class="form-control" id="idproductoCompras" name="idproductoCompras" >

                    </div>

                    <?php require("../../../Controlador/categoriasController.php") ?>


                    <?php $arrcategorias = categorias::getAll(); ?>
                    <select name="categorias_idcategorias" id="categorias_idcategorias">
                        <?php
                        foreach ($arrcategorias as $categorias){
                            ?>
                            <option value="<?php echo  $categorias->getidcategorias();?> "> <?php echo  $categorias->getnombre();?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <?php require("../../../Controlador/comprasController.php") ?>


                    <?php $arrcompras = compras::getAll(); ?>
                    <select name="compras_idcompras" id="compras_idcompras">
                        <?php
                        foreach ($arrcompras as $compras){
                            ?>
                            <option value="<?php echo  $compras->getIdcompras();?> "> <?php echo  $compras->getFechaCompra();?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productoCompras->getCantidad();?>"  id="cantidad" class="form-control" placeholder="cantidad" required="required" name="cantidad">
                                    <label for="cantidad">Cantidad</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productoCompras->getPrecioProducto();?>" id="precioProducto" class="form-control" placeholder="precioProducto" required="required" name="precioProducto">
                                    <label for="precioProducto">PrecioProducto</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="enviar">


                </form>
            <?php }else{ ?>
                <?php if (empty($_GET["respuesta"])){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> No se encontro ningun Usuario con el parametro de busqueda.
                    </div>
                <?php } ?>
            <?php } ?>
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
