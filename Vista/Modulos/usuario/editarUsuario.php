<!DOCTYPE html>
<html lang="en">
<?php require "../../../Controlador/usuarioController.php"; ?>
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
            $usuario = usuarioController::buscarID($_GET["id"]);
            ?>
                <form  method="post" action="../../../Controlador/usuarioController.php?action=editar">
                    <div class="form-group row">
                        <input type="hidden" value="<?php echo $usuario->getIdusuario()?>" class="form-control" id="idusuario" name="idusuario" >
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="nombres" value="<?php echo $usuario->getNombres()?>" class="form-control" placeholder="nombres" required="required" name="nombres">
                                    <label for="nombres">Nombres</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="apellidos" value="<?php echo $usuario->getApellidos()?>" class="form-control" placeholder="apellidos" required="required" name="apellidos">
                                    <label for="apellidos">Apellidos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="date" name="fechaNacimiento" value="<?php echo $usuario->getFechaNacimiento()?>" min="1980-01-01" max="2019-01-01" step="3" id="FcehaNacimiento" class="form-control" placeholder="fechaNacimiento" required="required">
                                    <label for="fcehaNacimiento">Fceha de Nacimiento</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="email" value="<?php echo $usuario->getEmail()?>" class="form-control" placeholder="Email" required="required" name="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="telefono" value="<?php echo $usuario->getTelefono()?>" class="form-control" placeholder="telefono" required="required" name="telefono">
                                    <label for="telefono">Telefono</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="direccion" value="<?php echo $usuario->getDireccion()?>" class="form-control" placeholder="direccion" required="required" name="direccion">
                                    <label >Direccion</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select id="tipoDocumento" name="tipoDocumento" class="form-control">
                                        <option <?php if($usuario->getTipoDocumento() == "Tarjeta"){ echo "selected"; } ?>>Tarjeta</option>
                                        <option <?php if($usuario->getTipoDocumento() == "Cedula"){ echo "selected"; } ?>>Cedula</option>
                                        <option <?php if($usuario->getTipoDocumento() == "Extranjera"){ echo "selected"; } ?>>Extranjera</option>
                                        <option <?php if($usuario->getTipoDocumento() == "Otro"){ echo "selected"; } ?>>Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="documento" value="<?php echo $usuario->getDocumento()?>" class="form-control" placeholder="documento" required="required" name="documento">
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
                                        <option <?php if($usuario->getEstado() == "activo"){ echo "selected"; } ?>>Activo</option>
                                        <option <?php if($usuario->getEstado() == "inactivo"){ echo "selected"; } ?>>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <select id="rol" name="rol" class="form-control">
                                        <option <?php if($usuario->getRol() == "Administrador"){ echo "selected"; } ?>>Administrador</option>
                                        <option <?php if($usuario->getRol() == "Farmaceuta"){ echo "selected"; } ?>>Farmaceuta</option>
                                        <option <?php if($usuario->getRol() == "Cliente"){ echo "selected"; } ?>>Cliente</option>
                                        <option <?php if($usuario->getRol() == "Proveedor"){ echo "selected"; } ?>>Proveedor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="Password" value="<?php echo $usuario->getPassword()?>" class="form-control" placeholder="Confirm password" required="required" name="password">
                                    <label for="Password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="nit" value="<?php echo $usuario->getNit()?>" class="form-control" placeholder="nit" required="required" name="nit">
                                    <label for="nit">Nit</label>
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
