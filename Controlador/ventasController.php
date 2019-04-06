<?php

require_once (__DIR__.'/../Modelo/ventas.php');

if(!empty($_GET['action'])){
    ventasController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion...";
}

class ventasController{

    static function main($action){
        if ($action == "crear"){
            ventasController::crear();
        }else if ($action == "editar"){
            ventasController::editar();
        }else if ($action == "buscarID"){
            ventasController::buscarID();
        }else if ($action == "Activarusuario"){
            ventasController::Activarusuario();
        }else if ($action == "Inactivarusuario"){
            ventasController::Inactivarusuario();
        }
    }

    static public function crear (){
        try {
            $arrayventas = array();
            $arrayventas['fechaVenta'] = $_POST['fechaVenta'];
            $arrayventas['precioVenta'] = $_POST['precioVenta'];
            $arrayventas['cantidadV'] = $_POST['cantidadV'];
            $arrayventas['producto'] = $_POST['producto'];
            $arrayventas['usuario'] = $_POST['usuario'];
            $ventas = new ventas ($arrayventas);
            $ventas->insertar();
            header("Location: ../Vista/Modulos/ventas/listarVentas.php?respuesta=correcto");
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
            //header("Location: ../Vista/Modulos/ventas/listarVentas.php?respuesta=error");
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
            $arrayVentas = array();
            $arrayVentas['fechaVenta'] = $_POST['fechaVenta'];
            $arrayVentas['precioVenta'] = $_POST['precioVenta'];
            $arrayVentas['cantidadV'] = $_POST['cantidadV'];
            $arrayVentas['producto'] = $_POST['Producto'];
            $arrayVentas['usuario'] = $_POST['usuario_idusuario'];
            $arrayVentas['idventas'] = $_POST['idventas'];
            $ventas = new ventas($arrayVentas);
            $ventas->editar();
            header("Location: ../Vista/Modulos/ventas/listarVentas.php?respuesta=correcto");
        } catch (Exception $e) {
            echo"<pre>";
            print_r($e);
            echo"<pre>";
            //header("Location: ../Vista/Modulos/ventas/listarVentas.php?respuesta=error");
        }
    }

    static public function Activarventa (){
        try {
            $Objusuario = usuario::buscarForId($_GET['id
            $Objusuario->editar();usuario']);
            $Objusuario->setestado("activo");
            header("Location: ../Vista/gestionarusuario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarusuario.php?respuesta=error");
        }
    }

    static public function Inactivarusuario (){
        try {
            $Objusuario = ventas::buscarForId($_GET['idusuario']);
            $Objusuario->setestado("inactivo");
            $Objusuario->editar();
            header("Location: ../Vista/gestio.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gesti.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return ventas::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/editarventas.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return ventas::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarventa.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return ventas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarventas.php?respuesta=error");
        }
    }

}
?>
