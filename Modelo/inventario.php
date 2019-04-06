<?php

require_once('DDBB_Conexion.php');

/**
 *
 */
class inventario extends DDBB_Conexion
{

private $idinventario;
private $cantidad;
private $estado;
private $productos;



public function __construct($inventario_data = array())
{
     parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
     if(count($inventario_data)>1){ //
         foreach ($inventario_data as $campo => $valor){
             $this->$campo = $valor;
         }
     }else {
         $this->idinventario = "";
         $this->cantidad = "";
         $this->estado = "";
         $this->productos = "";
     }
}
function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
       {
           $inventario = new inventario();
           if ($id > 0){
               $getrow = $inventario->getRow("SELECT * FROM inventario WHERE idinventario =?", array($id));
               $inventario->idinventario = $getrow['idinventario'];
               $inventario->cantidad = $getrow['cantidad'];
               $inventario->estado = $getrow['estado'];
               $inventario->productos = $getrow['productos_idproductos'];
               $inventario->Disconnect();
               return $inventario;
           }else{
               return NULL;
           }
       }
       public static function buscar($query)
       {
           $arrinventario = array();
           $tmp = new inventario();
           $getrows = $tmp->getRows($query);
           foreach ($getrows as $valor) {
               $inv = new inventario();
               $inv->idinventario = $valor['idinventario'];
               $inv->cantidad = $valor['cantidad'];
               $inv->estado = $valor['estado'];
               $inv->productos = $valor['productos_idproductos'];
               array_push($arrinventario, $inv);
           }
           $tmp->Disconnect();
           return $arrinventario;
       }
       public static function getAll()
       {
           return inventario::buscar("SELECT * FROM inventario");
       }
       public function insertar()
       {
           $this->insertRow("INSERT INTO inventario VALUES (NULL, ?, ?, ?)", array(
                   $this->cantidad,
                   $this->estado,
                   $this->productos,
               )
           );
           $this->Disconnect();
       }
       public function editar()
       {
           $this->updateRow("UPDATE inventario SET cantidad = ?, estado = ?, productos_idproductos = ? WHERE idinventario = ?", array(
               $this->cantidad,
               $this->estado,
               $this->productos,
               $this->idinventario,
           ));
           $this->Disconnect();
       }
       protected function eliminar($id)
       {
           // TODO: Implement eliminar() method.
       }


       //getters and setters





    /**
     * Get the value of Idinventario
     *
     * @return mixed
     */
    public function getIdinventario()
    {
        return $this->idinventario;
    }

    /**
     * Set the value of Idinventario
     *
     * @param mixed idinventario
     *
     * @return self
     */
    public function setIdinventario($idinventario)
    {
        $this->idinventario = $idinventario;

    }

    /**
     * Get the value of Cantidad
     *
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of Cantidad
     *
     * @param mixed cantidad
     *
     * @return self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

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


    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set the value of productos
     *
     * @param mixed productos
     *
     * @return self
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;
    }

}
 ?>
