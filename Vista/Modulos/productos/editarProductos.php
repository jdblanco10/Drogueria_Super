<!DOCTYPE html>
<html lang="en">
<?php require "../../../Controlador/productosController.php"; ?>
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
                $productos = productosController::buscarID($_GET["id"]);
                ?>

                <form  method="post" action="../../../Controlador/productosController.php?action=editar">

                    <div class="form-group row">
                        <input type="hidden" value="<?php echo $productos->getIdproductos()?>" class="form-control" id="idproductoCompras" name="idproductoCompras" >

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

                    <?php require("../../../Controlador/productoComprasController.php") ?>


                    <?php $arrproductocompras = productocompras::getAll(); ?>
                    <select name="productoCompras_idproductoCompras" id="productoCompras_idproductoCompras">
                        <?php
                        foreach ($arrproductocompras as $productocompras){
                            ?>
                            <option value="<?php echo  $productocompras->getIdproductoCompras();?> "> <?php echo  $productocompras->getPrecioProducto();?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <?php require("../../../Controlador/productoVentasController.php") ?>


                    <?php $arrproductosventas= productosventas::getAll(); ?>
                    <select name="productosVentas_idproductosVentas" id="productosVentas_idproductosVentas">
                        <?php
                        foreach ($arrproductosventas as $productosventas){
                            ?>
                            <option value="<?php echo  $productosventas->getIdproductosVentas();?> "><?php echo  $productosventas->getPrecioProducto();?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productos->getNombre();?>" id="nombre" class="form-control" placeholder="nombre" required="required" name="nombre">
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <div class="form-label-group">
                                        <input type="text" value="<?php echo  $productos->getPresentacion();?>" id="presentacion" class="form-control" placeholder="presentacion" required="required" name="presentacion">
                                        <label for="presentacion">Presentacion</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productos->getComposicion();?>" id="composicion" class="form-control" placeholder="composicion" required="required" name="composicion">
                                    <label for="composicion">Composicion</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <div class="form-label-group">
                                        <input type="text" value="<?php echo  $productos->getIndicaciones();?>" id="indicaciones" class="form-control" placeholder="indicaciones" required="required" name="indicaciones">
                                        <label for="indicaciones">Indicaciones</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productos->getDosis();?>" id="dosis" class="form-control" placeholder="dosis" required="required" name="dosis">
                                    <label for="dosis">Dosis</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" value="<?php echo  $productos->getFechaVencimiento();?>" name="fechaVencimiento" min="1980-01-01" max="2019-01-01" step="3" id="fechaVencimiento" class="form-control" placeholder="fechaVencimiento" required="required">
                                    <label for="fechaVencimiento">fecha de Vencimiento</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo  $productos->getRegistroInvima();?>" id="registroInvima" class="form-control" placeholder="registroInvima" required="required" name="registroInvima">
                                    <label for="registroInvima">Registro Invima</label>
                                </div>
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
