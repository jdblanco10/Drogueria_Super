<?php

require_once (__DIR__ . '/../Modelo/productosventas.php');

if(!empty($_GET['action'])){
    productoVentasController::main($_GET['action']);
}else{
    echo "";
}

class productoVentasController{

    static function main($action){
        if ($action == "crear"){
            productoVentasController::crear();
        }else if ($action == "editar"){
            productoVentasController::editar();
        }else if ($action == "buscarID"){
            productoVentasController::buscarID();
        }
    }

    static public function crear (){
        try {
            $arrayproductoCompras = array();
            $arrayproductoCompras['cantidad'] = $_POST['cantidad'];
            $arrayproductoCompras['precioProducto'] = $_POST['precioProducto'];
            $arrayproductoCompras['ventas'] = $_POST['ventas'];
            $arrayproductoCompras['categorias'] = $_POST['categorias'];
            $productoventas = new productosventas ($arrayproductoCompras);
            $productoventas->insertar();
            header("Location: ../Vista/Modulos/productoVentas/crearProductoVentas.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/productoVentas/crearProductoVentas.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayproductoVentas = array();
            $arrayproductoVentas['cantidad'] = $_POST['cantidad'];
            $arrayproductoVentas['precioProducto'] = $_POST['precioProducto'];
            $arrayproductoVentas['ventas'] = $_POST['ventas_idventas'];
            $arrayproductoVentas['categorias'] = $_POST['categorias_idcategorias'];
            $arrayproductoVentas['idproductosVentas'] = $_POST['idproductosVentas'];
            $pv = new productosventas($arrayproductoVentas);
            $pv->editar();
            header("Location: ../Vista/Modulos/productoVentas/listarProductosVentas.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/productoVentas/listarProductosVentas.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return productosventas::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return productosventas::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return productosventas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarproductoCompras.php?respuesta=error");
        }
    }

}
?>
