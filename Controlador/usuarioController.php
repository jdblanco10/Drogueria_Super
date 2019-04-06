<?php

require_once (__DIR__ . '/../Modelo/usuario.php');

if(!empty($_GET['action'])){
    usuarioController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion...";
}

class usuarioController{

    static function main($action){
        if ($action == "crear"){
            usuarioController::crear();
        }else if ($action == "editar"){
            usuarioController::editar();
        }else if ($action == "buscarID"){
            usuarioController::buscarID();
        }else if ($action == "Activarusuario"){
            usuarioController::Activarusuario();
        }else if ($action == "Inactivarusuario"){
            usuarioController::Inactivarusuario();
        }
    }

    static public function crear (){
        try {
            $arrayUsuarios = array();
            $arrayUsuarios['documento'] = $_POST['documento'];
            $arrayUsuarios['nombres'] = $_POST['nombres'];
            $arrayUsuarios['apellidos'] = $_POST['apellidos'];
            $arrayUsuarios['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $arrayUsuarios['email'] = $_POST['email'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['estado'] = $_POST['estado'];
            $arrayUsuarios['rol'] = $_POST['rol'];
            $arrayUsuarios['password'] = $_POST['password'];
            $arrayUsuarios['tipoDocumento'] = $_POST['tipoDocumento'];
            $arrayUsuarios['nit'] = $_POST['nit'];


            $usuarios = new usuario ($arrayUsuarios);
            $usuarios->insertar();
            header("Location: ../Vista/Modulos/usuario/listarUsuario.php?respuesta=correcto");
        } catch (Exception $e) {
            /*echo "<pre>";
            print_r($e);
            echo "</pre>";*/
            header("Location: ../Vista/Modulos/usuario/listarUsuario.php?respuesta=error");
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
            $arrayusuario = array();
            $arrayusuario['documento'] = $_POST['documento'];
            $arrayusuario['nombres'] = $_POST['nombres'];
            $arrayusuario['apellidos'] = $_POST['apellidos'];
            $arrayusuario['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $arrayusuario['email'] = $_POST['email'];
            $arrayusuario['telefono'] = $_POST['telefono'];
            $arrayusuario['direccion'] = $_POST['direccion'];
            $arrayusuario['estado'] = $_POST['estado'];
            $arrayusuario['rol'] = $_POST['rol'];
            $arrayusuario['password'] = $_POST['password'];
            $arrayusuario['tipoDocumento'] = $_POST['tipoDocumento'];
            $arrayusuario['nit'] = $_POST['nit'];
            $arrayusuario['idusuario'] = $_POST['idusuario'];
            $usu = new usuario($arrayusuario);
            $usu->editar();
            header("Location: ../Vista/Modulos/usuario/listarUsuarios.php?respuesta=correcto");
        } catch (Exception $e) {
            /*echo"<pre>";
            print_r($e);
            echo"<pre>";*/
            header("Location: ../Vista/Modulos/usuario/listarUsuarios.php?respuesta=error");
        }
    }

    static public function Activarusuario (){
        try {
            $Objusuario = usuario::buscarForId($_GET['idusuario']);
            $Objusuario->setEstado("activo");
            $Objusuario->editar();
            header("Location: ../../../Vista/listarUsuarios.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarusuario.php?respuesta=error");
        }
    }

    static public function Inactivarusuario (){
        try {
            $Objusuario = usuario::buscarForId($_GET['idusuario']);
            $Objusuario->setEstado("inactivo");
            $Objusuario->editar();
            header("Location: ../Vista/gestionarusuario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarusuario.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return usuario::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/editarUsuario.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return usuario::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarusuario.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return usuario::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarusuario.php?respuesta=error");
        }
    }

}
?>
