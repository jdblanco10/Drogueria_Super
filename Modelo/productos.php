<?php

require_once('DDBB_Conexion.php');


class productos extends DDBB_Conexion
{

private $idproductos;
private $nombre;
private $presentacion;
private $composicion;
private $indicaciones;
private $dosis;
private $fechaVencimiento;
private $registroInvima;
private $categorias;
private $productocompras;
private $productosventas;


public function __construct($productos_data = array())
{
     parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
     if(count($productos_data)>1){ //
         foreach ($productos_data as $campo => $valor){
             $this->$campo = $valor;
         }
     }else {
         $this->idproductos = "";
         $this->nombre = "";
         $this->presentacion = "";
         $this->composicion = "";
         $this->indicaciones = "";
         $this->dosis = "";
         $this->fechaVencimiento = "";
         $this->registroInvima = "";
         $this->categorias = "";
         $this->productocompras = "";
         $this->productosventas = "";
     }
}
function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
       {
           $pro = new productos();
           if ($id > 0){
               $getrow = $pro->getRow("SELECT * FROM productos WHERE idproductos =?", array($id));
               $pro->idproductos = $getrow['idproductos'];
               $pro->nombre = $getrow['nombre'];
               $pro->presentacion = $getrow['presentacion'];
               $pro->composicion = $getrow['composicion'];
               $pro->indicaciones = $getrow['indicaciones'];
               $pro->dosis = $getrow['dosis'];
               $pro->fechaVencimiento = $getrow['fechaVencimiento'];
               $pro->registroInvima = $getrow['registroInvima'];
               $pro->categorias = $getrow['categorias_idcategorias'];
               $pro->productocompras = $getrow['productoCompras_idproductoCompras'];
               $pro->productosventas = $getrow['productosVentas_idproductosVentas'];
               $pro->Disconnect();
               return $pro;
           }else{
               return NULL;
           }
       }
       public static function buscar($query)
       {
           $arrproductos = array();
           $tmp = new productos();
           $getrows = $tmp->getRows($query);
           foreach ($getrows as $valor) {
               $pro = new productos();
               $pro->idproductos = $valor['idproductos'];
               $pro->nombre = $valor['nombre'];
               $pro->presentacion = $valor['presentacion'];
               $pro->composicion = $valor['composicion'];
               $pro->indicaciones = $valor['indicaciones'];
               $pro->dosis = $valor['dosis'];
               $pro->fechaVencimiento = $valor['fechaVencimiento'];
               $pro->registroInvima = $valor['registroInvima'];
               $pro->categorias = $valor['categorias_idcategorias'];
               $pro->productocompras = $valor['productoCompras_idproductoCompras'];
               $pro->productoventas = $valor['productosVentas_idproductosVentas'];
               array_push($arrproductos, $pro);
           }
           $tmp->Disconnect();
           return $arrproductos;
       }
       public static function getAll()
       {
           return productos::buscar("SELECT * FROM productos");
       }
       public function insertar()
       {
           $this->insertRow("INSERT INTO productos VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                   $this->nombre,
                   $this->presentacion,
                   $this->composicion,
                   $this->indicaciones,
                   $this->dosis,
                   $this->fechaVencimiento,
                   $this->registroInvima,
                   $this->indicaciones,
                   $this->categorias,
                   $this->productocompras,
                   $this->productosventas,
               )
           );
           $this->Disconnect();
       }
       public function editar()
       {
           $this->updateRow("UPDATE productos SET nombre = ?, presentacion = ?, composicion = ?, indicaciones = ?, dosis = ?, fechaVencimiento = ?, registroInvima = ?, categorias_idcategorias = ?, productoCompras_idproductoCompras = ?, productosVentas_idproductosVentas= ? WHERE idproductos = ?", array(
             $this->nombre,
             $this->presentacion,
             $this->composicion,
             $this->indicaciones,
             $this->dosis,
             $this->fechaVencimiento,
             $this->registroInvima,
             $this->categorias,
             $this->productocompras,
             $this->productosventas,
             $this->idproductos,
           ));
           $this->Disconnect();
       }
       protected function eliminar($id)
       {
           // TODO: Implement eliminar() method.
       }


       //getters and setters





    /**
     * Get the value of Idproductos
     *
     * @return mixed
     */
    public function getIdproductos()
    {
        return $this->idproductos;
    }

    /**
     * Set the value of Idproductos
     *
     * @param mixed idproductos
     *
     * @return self
     */
    public function setIdproductos($idproductos)
    {
        $this->idproductos = $idproductos;
    }

    /**
     * Get the value of Nombre
     *
     * @return mixed
     */
    public function getNombre()
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
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of Presentacion
     *
     * @return mixed
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * Set the value of Presentacion
     *
     * @param mixed presentacion
     *
     * @return self
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;
    }

    /**
     * Get the value of Composicion
     *
     * @return mixed
     */
    public function getComposicion()
    {
        return $this->composicion;
    }

    /**
     * Set the value of Composicion
     *
     * @param mixed composicion
     *
     * @return self
     */
    public function setComposicion($composicion)
    {
        $this->composicion = $composicion;
    }

    /**
     * Get the value of Indicaciones
     *
     * @return mixed
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }

    /**
     * Set the value of Indicaciones
     *
     * @param mixed indicaciones
     *
     * @return self
     */
    public function setIndicaciones($indicaciones)
    {
        $this->indicaciones = $indicaciones;
    }

    /**
     * Get the value of Dosis
     *
     * @return mixed
     */
    public function getDosis()
    {
        return $this->dosis;
    }

    /**
     * Set the value of Dosis
     *
     * @param mixed dosis
     *
     * @return self
     */
    public function setDosis($dosis)
    {
        $this->dosis = $dosis;

    }

    /**
     * Get the value of Fecha Vencimiento
     *
     * @return mixed
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set the value of Fecha Vencimiento
     *
     * @param mixed fechaVencimiento
     *
     * @return self
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

    }

    /**
     * Get the value of Registro Invima
     *
     * @return mixed
     */
    public function getRegistroInvima()
    {
        return $this->registroInvima;
    }

    /**
     * Set the value of Registro Invima
     *
     * @param mixed registroInvima
     *
     * @return self
     */
    public function setRegistroInvima($registroInvima)
    {
        $this->registroInvima = $registroInvima;

    }

    /**
     * Get the value of Subcategorias
     *
     * @return mixed
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Set the value of Subcategorias
     *
     * @param mixed subcategorias
     *
     * @return self
     */
    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    public function getProductoCompras()
    {
        return $this->productocompras;
    }


    public function setProductoCompras($productocompras)
    {
        $this->productocompras = $productocompras;
    }

    public function getProductosVentas()
    {
        return $this->productocompras;
    }


    public function setProductosVentas($productosventas)
    {
        $this->productoventas = $productosventas;
    }

}
 ?>
