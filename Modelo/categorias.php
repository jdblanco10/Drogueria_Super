<?php

require_once('DDBB_Conexion.php');

/**
 *
 */
class categorias extends DDBB_Conexion
{

private $idcategorias;
private $nombre;
private $estado;

public function __construct($categorias_data = array())
{
     parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
     if(count($categorias_data)>1){ //
         foreach ($categorias_data as $campo => $valor){
             $this->$campo = $valor;
         }
     }else {
         $this->idcategorias = "";
         $this->nombre = "";
         $this->estado = "";
     }
}
function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
       {
           $categorias = new categorias();
           if ($id > 0){
               $getrow = $categorias->getRow("SELECT * FROM categorias WHERE idcategorias =?", array($id));
               $categorias->idcategorias = $getrow['idcategorias'];
               $categorias->nombre = $getrow['nombre'];
               $categorias->estado = $getrow['estado'];
               $categorias->Disconnect();
               return $categorias;
           }else{
               return NULL;
           }
       }
       public static function buscar($query)
       {
           $arrcategorias = array();
           $tmp = new categorias();
           $getrows = $tmp->getRows($query);
           foreach ($getrows as $valor) {
               $catego = new categorias();
               $catego->idcategorias = $valor['idcategorias'];
               $catego->nombre = $valor['nombre'];
               $catego->estado = $valor['estado'];
               array_push($arrcategorias, $catego);
           }
           $tmp->Disconnect();
           return $arrcategorias;
       }
       public static function getAll()
       {
           return categorias::buscar("SELECT * FROM categorias");
       }
       public function insertar()
       {
           $this->insertRow("INSERT INTO categorias VALUES (NULL, ?, ?)", array(
                   $this->nombre,
                   $this->estado,
               )
           );
           $this->Disconnect();
       }
       public function editar()
       {
           $this->updateRow("UPDATE categorias SET nombre = ?, estado = ? WHERE idcategorias = ?", array(
               $this->nombre,
               $this->estado,
               $this->idcategorias,
           ));
           $this->Disconnect();
       }
       protected function eliminar($id)
       {
           // TODO: Implement eliminar() method.
       }





    /**
     * Get the value of Idcategorias
     *
     * @return mixed
     */
    public function getidcategorias()
    {
        return $this->idcategorias;
    }

    /**
     * Set the value of Idcategorias
     *
     * @param mixed idcategorias
     *
     * @return self
     */
    public function setidcategorias($idcategorias)
    {
        $this->idcategorias = $idcategorias;
    }

    /**
     * Get the value of Nombre
     *
     * @return mixed
     */
    public function getnombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @param mixed nombre
     *
     * @return self
     */
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;

    }

    /**
     * Get the value of Estado
     *
     * @return mixed
     */
    public function getestado()
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
    public function setestado($estado)
    {
        $this->estado = $estado;

    }

}




 ?>
