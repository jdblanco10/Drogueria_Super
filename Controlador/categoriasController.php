<?php

require_once (__DIR__.'/../Modelo/categorias.php');

if(!empty($_GET['action'])){
    categoriasController::main($_GET['action']);
}else{
    echo "";
}

class categoriasController{

    static function main($action){
        if ($action == "crear"){
            categoriasController::crear();
        }else if ($action == "editar"){
            categoriasController::editar();
        }else if ($action == "buscarID"){
            categoriasController::buscarID();
        }else if ($action == "Activarcategorias"){
            categoriasController::Activarcategorias();
        }else if ($action == "Inactivarcategorias"){
            categoriasController::Inactivarcategorias();
        }
    }

    static public function crear (){
        try {
            $arraycategorias = array();
            $arraycategorias['nombre'] = $_POST['nombre'];
            $arraycategorias['estado'] = $_POST['estado'];
            $categorias = new categorias ($arraycategorias);
            $categorias->insertar();
            header("Location: ../Vista/Modulos/categorias/listarCategoria.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/categorias/listarCategoria.php?respuesta=error");
        }
    }

    /*
    static public function selectEspecialista ($isRequired=true, $id="idEspecialista", $nombre="idEspecialista", $class=""){
        $arrEspecialistas = Especialista::getAll(); /*  */
        /*$htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrEspecialistas) > 0){
            foreach ($arrEspecialistas as $especialista)
                $htmlSelect .= "<option value='".$especialista->getIdEspecialista()."'>".$especialista->getNombre()." ".$especialista->getApellido()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }*/


    static public function editar (){
        try {
            $arraycategorias = array();
            $arraycategorias['nombre'] = $_POST['nombre'];
            $arraycategorias['estado'] = $_POST['estado'];
            $arraycategorias['idcategorias'] = $_POST['idcategorias'];
            $catego = new categorias($arraycategorias);
            $catego->editar();
            header("Location: ../Vista/Modulos/categorias/listarCategoria.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Modulos/categorias/listarCategoria.php?respuesta=error");
        }
    }

    static public function Activarcategorias (){
        try {
            $Objcategorias = categorias::buscarForId($_GET['idcategorias']);
            $Objcategorias->setestado("activo");
            $Objcategorias->editar();
            header("Location: ../Vista/gestionarcategorias.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarcategorias.php?respuesta=error");
        }
    }

    static public function Inactivarcategorias (){
        try {
            $Objcategorias = categorias::buscarForId($_GET['idcategorias']);
            $Objcategorias->setestado("inactivo");
            $Objcategorias->editar();
            header("Location: ../Vista/gestionarcategorias.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarcategorias.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return categorias::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarcategorias.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return categorias::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarcategorias.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return categorias::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarcategorias.php?respuesta=error");
        }
    }

}
?>
