<?php

require_once (__DIR__ . '/../Modelo/productocompras.php');

if(!empty($_GET['action'])){
    productoComprasController::main($_GET['action']);
}else{
    echo "";
}

class productoComprasController{

    static function main($action){
        if ($action == "crear"){
            productoComprasController::crear();
        }else if ($action == "editar"){
            productoComprasController::editar();
        }else if ($action == "buscarID"){
            productoComprasController::buscarID();
        }
    }

    static public function crear (){
        try {
            $arrayproductoCompras = array();
            $arrayproductoCompras['cantidad'] = $_POST['cantidad'];
            $arrayproductoCompras['precioProducto'] = $_POST['precioProducto'];
            $arrayproductoCompras['compras'] = $_POST['compras'];
            $arrayproductoCompras['categorias'] = $_POST['categorias'];
            $productocompras = new productocompras ($arrayproductoCompras);
            $productocompras->insertar();
            header("Location: ../Vista/Modulos/productoCompras/crearProductoCompras.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/productoCompras/crearProductoCompras.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayproductoCompras = array();
            $arrayproductoCompras['cantidad'] = $_POST['cantidad'];
            $arrayproductoCompras['precioProducto'] = $_POST['precioProducto'];
            $arrayproductoCompras['compras'] = $_POST['compras_idcompras'];
            $arrayproductoCompras['categorias'] = $_POST['categorias_idcategorias'];
            $arrayproductoCompras['idproductoCompras'] = $_POST['idproductoCompras'];
            $pc = new productocompras($arrayproductoCompras);
            $pc->editar();
            header("Location: ../Vista/Modulos/productoCompras/listarProductoCompras.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Modulos/productoCompras/listarProductoCompras.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return productocompras::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return productocompras::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return productocompras::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

}
?>
