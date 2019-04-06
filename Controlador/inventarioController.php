<?php

require_once (__DIR__.'/../Modelo/inventario.php');

if(!empty($_GET['action'])){
    inventarioController::main($_GET['action']);
}else{
    echo "";
}

class inventarioController{

    static function main($action){
        if ($action == "crear"){
            inventarioController::crear();
        }else if ($action == "editar"){
            inventarioController::editar();
        }else if ($action == "buscarID"){
            inventarioController::buscarID();
        }else if ($action == "Activarinventario"){
            inventarioController::Activarinventario();
        }else if ($action == "Inactivarinventario"){
            inventarioController::Inactivarinventario();
        }
    }

    static public function crear (){
        try {
            $arrayinventario = array();
            $arrayinventario['cantidad'] = $_POST['cantidad'];
            $arrayinventario['estado'] = $_POST['estado'];
            $arrayinventario['productos'] = $_POST['productos'];
            $inventario = new inventario ($arrayinventario);
            $inventario->insertar();
            header("Location: ../Vista/Modulos/inventario/listarInventario.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/Modulos/inventario/listarInventario.php?respuesta=error");
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
            $arrayinventario = array();
            $arrayinventario['cantidad'] = $_POST['cantidad'];
            $arrayinventario['estado'] = $_POST['estado'];
            $arrayinventario['productos'] = $_POST['productos_idproductos'];
            //var_dump($arrayinventario);
            $arrayinventario['idinventario'] = $_POST['idinventario'];
            $inve = new inventario($arrayinventario);
            $inve->editar();
            header("Location: ../Vista/Modulos/inventario/listarInventario.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            header("Location: ../Vista/Modulos/inventario/listarInventario.php?respuesta=error");
        }
    }

    static public function Activarinventarios (){
        try {
            $Objinventario = inventario::buscarForId($_GET['idinventario']);
            $Objinventario->setestado("activo");
            $Objinventario->editar();
            header("Location: ../Vista/gestionarinventario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarinventario.php?respuesta=error");
        }
    }

    static public function Inactivarinventario (){
        try {
            $Objinventario = inventario::buscarForId($_GET['idinventario']);
            $Objinventario->setestado("inactivo");
            $Objinventario->editar();
            header("Location: ../Vista/gestionarinventario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarinventario.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return inventario::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarinventario.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return inventario::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarinventario.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return inventario::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarinventario.php?respuesta=error");
        }
    }

}
?>
