<?php

require_once (__DIR__.'/../Modelo/compras.php');

if(!empty($_GET['action'])){
    comprasController::main($_GET['action']);
}else{
    echo "";
}

class comprasController{

    static function main($action){
        if ($action == "crear"){
            comprasController::crear();
        }else if ($action == "editar"){
            comprasController::editar();
        }else if ($action == "buscarID"){
            comprasController::buscarID();
        }
    }

    static public function crear (){
        try {
            $arraycompras = array();
            $arraycompras['fechaCompra'] = $_POST['fechaCompra'];
            $arraycompras['precioCompra'] = $_POST['precioCompra'];
            $arraycompras['cantidad'] = $_POST['cantidad'];
            $arraycompras['producto'] = $_POST['producto'];
            $arraycompras['usuario'] = $_POST['usuario'];
            $compras = new compras ($arraycompras);
            $compras->insertar();
            header("Location: ../Vista/Modulos/compras/crearCompras.php?respuesta=correcto");
        } catch (Exception $e) {
           echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/compras/crearCompras.php?respuesta=error");
        }
    }


    static public function editar (){
        try {
            $arraycompras = array();
            $arraycompras['fechaCompra'] = $_POST['fechaCompra'];
            $arraycompras['precioCompra'] = $_POST['precioCompra'];
            $arraycompras['cantidad'] = $_POST['cantidad'];
            $arraycompras['producto'] = $_POST['producto'];
            $arraycompras['idusuario'] = $_POST['idusuario_idusuario'];
            $arraycompras['idcompras'] = $_POST['idcompras'];
            $com = new compras($arraycompras);
            $com->editar();
            header("Location: ../Vista/Modulos/compras/listarCompras.php?respuesta=correcto");
        } catch (Exception $e) {
            echo"<pre>";
            print_r($e);
            echo"<pre>";
            header("Location: ../Vista/Modulos/compras/listarCompras.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return compras::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarcompras.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return compras::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarcompras.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return compras::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarcompras.php?respuesta=error");
        }
    }

}
?>
