<!DOCTYPE html>
<html lang="en">
<?php require "../../../Controlador/comprasController.php"; ?>
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
                $compras = comprasController::buscarID($_GET["id"]);
                ?>

                <form  method="post" action="../../../Controlador/comprasController.php?action=editar">

                    <div class="form-group row">
                        <input type="hidden" value="<?php echo $compras->getIdcompras()?>" class="form-control" id="getidcompras" name="getidcompras" >

                    </div>

                    <?php require("../../../Controlador/usuarioController.php") ?>


                    <?php $arrusuario = usuario::getAll(); ?>
                    <select name="usuario_idusuario" id="usuario_idusuario">
                        <?php
                        foreach ($arrusuario as $usuario){
                            ?>
                            <option value="<?php echo  $usuario->getIdusuario();?> "> <?php echo  $usuario->getNombres();?></option>
                            <?php
                        }
                        ?>
                    </select>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="fechaCompra" value="<?php echo $compras->getFechaCompra()?>" class="form-control" placeholder="fechaCompra" required="required" name="fechaCompra">
                                    <label for="fechaCompra">Fecha de la Compra</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="precioCompra" value="<?php echo $compras->getPrecioCompra()?>" class="form-control" placeholder="precioCompra" required="required" name="precioCompra">
                                    <label for="precioCompra">PrecioCompra</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="cantidad" value="<?php echo $compras->getCantidad()?>" class="form-control" placeholder="cantidad" required="required" name="cantidad">
                                    <label for="cantidad">Cantidad</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="producto" value="<?php echo $compras->getProducto()?>"  class="form-control" placeholder="producto" required="required" name="producto">
                                    <label for="producto">Producto</label>
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
