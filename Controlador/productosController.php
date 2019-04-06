<?php

require_once (__DIR__.'/../Modelo/productos.php');

if(!empty($_GET['action'])){
    productosController::main($_GET['action']);
}else{
    echo "";
}

class productosController{

    static function main($action){
        if ($action == "crear"){
            productosController::crear();
        }else if ($action == "editar"){
            productosController::editar();
        }else if ($action == "buscarID"){
            productosController::buscarID();
        }
    }

    static public function crear (){
        try {
            $arrayproductos = array();
            $arrayproductos['nombre'] = $_POST['nombre'];
            $arrayproductos['presentacion'] = $_POST['presentacion'];
            $arrayproductos['composicion'] = $_POST['composicion'];
            $arrayproductos['indicaciones'] = $_POST['indicaciones'];
            $arrayproductos['dosis'] = $_POST['dosis'];
            $arrayproductos['fechaVencimiento'] = $_POST['fechaVencimiento'];
            $arrayproductos['registroInvima'] = $_POST['registroInvima'];
            $arrayproductos['categorias'] = $_POST['categorias'];
            $arrayproductos['productocompras'] = $_POST['productocompras'];
            $arrayproductos['$productosventas'] = $_POST['$productosventas'];
            $productos = new productos ($arrayproductos);
            $productos->insertar();
            header("Location: ../Vista/Modulos/Productos/crearProducto.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Modulos/Productos/crearProducto.php?respuesta=error");
}
}

    static public function editar (){
        try {
            $arrayproductos = array();
            $arrayproductos['nombre'] = $_POST['nombre'];
            $arrayproductos['presentacion'] = $_POST['presentacion'];
            $arrayproductos['composicion'] = $_POST['composicion'];
            $arrayproductos['indicaciones'] = $_POST['indicaciones'];
            $arrayproductos['dosis'] = $_POST['dosis'];
            $arrayproductos['fechaVencimiento'] = $_POST['fechaVencimiento'];
            $arrayproductos['registroInvima'] = $_POST['registroInvima'];
            $arrayproductos['categorias'] = $_POST['categorias_idcategorias'];
            $arrayproductos['productocompras'] = $_POST['productoCompras_idproductoCompras'];
            $arrayproductos['productosventas'] = $_POST['productosVentas_idproductosVentas'];
            $arrayproductos['idproductos'] = $_POST['idproductos'];
            $productos = new productos($arrayproductos);
            $productos->editar();
            header("Location: ../Vista/Modulos/Productos/listarProductos.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/Productos/listarProductos.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return productos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionaproductos.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return productos::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarproductos.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return productos::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarproductos.php?respuesta=error");
        }
    }

}
?>
