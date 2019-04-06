<?php

require_once('DDBB_Conexion.php');

/**
 *
 */
class usuario extends DDBB_Conexion
{

public $idusuario;
public $documento;
public $nombres;
public $apellidos;
public $fechaNacimiento;
public $email;
public $telefono;
public $direccion;
public $estado;
public $rol;
public $password;
public $tipoDocumento;
public $nit;

public function __construct($usuarioData = array())
{
     parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
     if(count($usuarioData)>1){ //
         foreach ($usuarioData as $campo => $valor){
             $this->$campo = $valor;
         }
     }else {
         $this->idusuario = "";
         $this->documento = "";
         $this->nombres = "";
         $this->apellidos = "";
         $this->fechaNacimiento = "";
         $this->email = "";
         $this->telefono = "";
         $this->direccion = "";
         $this->estado = "";
         $this->rol = "";
         $this->password = "";
         $this->tipoDocumento = "";
         $this->nit = "";
     }
}
function __destruct() {
        $this->Disconnect();
    }

    public static function buscarForId($id)
       {
           $usuario = new usuario();
           if ($id > 0){
               $getrow = $usuario->getRow("SELECT * FROM usuario WHERE idusuario =?", array($id));
               $usuario->idusuario = $getrow['idusuario'];
               $usuario->documento = $getrow['documento'];
               $usuario->nombres = $getrow['nombres'];
               $usuario->apellidos = $getrow['apellidos'];
               $usuario->fechaNacimiento = $getrow['fechaNacimiento'];
               $usuario->email = $getrow['email'];
               $usuario->telefono = $getrow['telefono'];
               $usuario->direccion = $getrow['direccion'];
               $usuario->estado = $getrow['estado'];
               $usuario->rol = $getrow['rol'];
               $usuario->password = $getrow['password'];
               $usuario->tipoDocumento = $getrow['tipoDocumento'];
               $usuario->nit = $getrow['nit'];
               $usuario->Disconnect();
               return $usuario;
           }else{
               return NULL;
           }
       }
       public static function buscar($query)
       {
           $arrusuario = array();
           $tmp = new usuario();
           $getrows = $tmp->getRows($query);
           foreach ($getrows as $valor) {
                $usu = new usuario();
                $usu->idusuario = $valor['idusuario'];
                $usu->documento = $valor['documento'];
                $usu->nombres = $valor['nombres'];
                $usu->apellidos = $valor['apellidos'];
                $usu->fechaNacimiento = $valor['fechaNacimiento'];
                $usu->email = $valor['email'];
                $usu->telefono = $valor['telefono'];
                $usu->direccion = $valor['direccion'];
                $usu->estado = $valor['estado'];
                $usu->rol = $valor['rol'];
                $usu->password = $valor['password'];
                $usu->tipoDocumento = $valor['tipoDocumento'];
               $usu->nit = $valor['nit'];
               array_push($arrusuario, $usu);
           }
           $tmp->Disconnect();
           return $arrusuario;
       }
       public static function getAll()
       {
           return usuario::buscar("SELECT * FROM usuario");
       }
    public function insertar()
    {
        $this->insertRow("INSERT INTO usuario VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->documento,
                $this->nombres,
                $this->apellidos,
                $this->fechaNacimiento,
                $this->email,
                $this->telefono,
                $this->direccion,
                $this->estado,
                $this->rol,
                $this->password,
                $this->tipoDocumento,
                $this->nit,
            )
        );
        $this->Disconnect();
    }
       public function editar()
       {
           $this->updateRow("UPDATE usuario SET documento = ?, nombres = ?, apellidos = ?, fechaNacimiento = ?, email = ?, telefono = ?, direccion = ?, estado = ?, rol = ?, password = ?, tipoDocumento = ?, nit = ?  WHERE idusuario = ?", array(
             $this->documento,
             $this->nombres,
             $this->apellidos,
             $this->fechaNacimiento,
             $this->email,
             $this->telefono,
             $this->direccion,
             $this->estado,
             $this->rol,
             $this->password,
             $this->tipoDocumento,
             $this->nit,
             $this->idusuario,
           )
           );
           $this->Disconnect();
       }
    public function editarestado()
    {
        $this->updateRow("UPDATE usuario SET documento = ?, nombres = ?, apellidos = ?, fechaNacimiento = ?, email = ?, telefono = ?, direccion = ?, estado = ?, rol = ?, password = ?, tipoDocumento = ?, nit = ?  WHERE idusuario = ?", array(
                $this->documento,
                $this->nombres,
                $this->apellidos,
                $this->fechaNacimiento,
                $this->email,
                $this->telefono,
                $this->direccion,
                $this->estado,
                $this->rol,
                $this->password,
                $this->tipoDocumento,
                $this->nit,
                $this->idusuario,
            )
        );
        $this->Disconnect();
    }
       protected function eliminar($id)
       {
           // TODO: Implement eliminar() method.
       }



       //setters and getter;




    /**
     * Get the value of Idusuario
     *
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of Idusuario
     *
     * @param mixed idusuario
     *
     * @return self
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

    }

    /**
     * Get the value of Documento
     *
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of Documento
     *
     * @param mixed documento
     *
     * @return self
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

    }

    /**
     * Get the value of Nombres
     *
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set the value of Nombres
     *
     * @param mixed nombres
     *
     * @return self
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

    }

    /**
     * Get the value of Apellidos
     *
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of Apellidos
     *
     * @param mixed apellidos
     *
     * @return self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

    }

    /**
     * Get the value of Fecha Nacimiento
     *
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of Fecha Nacimiento
     *
     * @param mixed fechaNacimiento
     *
     * @return self
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * Get the value of Telefono
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of Telefono
     *
     * @param mixed telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }

    /**
     * Get the value of Direccion
     *
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of Direccion
     *
     * @param mixed direccion
     *
     * @return self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

    }

    /**
     * Get the value of Estado
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of Estado
     *
     * @param mixed estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

    }

    /**
     * Get the value of Rol
     *
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of Rol
     *
     * @param mixed rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of Password
     *
     * @param mixed password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

    }

    /**
     * Get the value of Tipo Documento
     *
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set the value of Tipo Documento
     *
     * @param mixed tipoDocumento
     *
     * @return self
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

    }

    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set the value of Nit
     *
     * @param mixed nit
     *
     * @return self
     */
    public function setNit($nit)
    {
        $this->tipoDocumento = $nit;

    }

}




 ?>
