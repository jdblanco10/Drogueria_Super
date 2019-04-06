<?php

require_once('DDBB_Conexion.php');

/**
 *
 */
class productocompras extends DDBB_Conexion
{

    private $idproductoCompras;
    private $cantidad;
    private $precioProducto;
    private $compras;
    private $categorias;



    public function __construct($productocompras_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($productocompras_data)>1){ //
            foreach ($productocompras_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idproductoCompras = "";
            $this->cantidad = "";
            $this->precioProducto = "";
            $this->compras = "";
            $this->categorias = "";
        }
    }
    function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
    {
        $productoCompras = new productocompras();
        if ($id > 0){
            $getrow = $productoCompras->getRow("SELECT * FROM productocompras WHERE idproductoCompras =?", array($id));
            $productoCompras->idproductoCompras = $getrow['idproductoCompras'];
            $productoCompras->cantidad = $getrow['cantidad'];
            $productoCompras->precioProducto = $getrow['precioProducto'];
            $productoCompras->compras = $getrow['compras_idcompras'];
            $productoCompras->categorias = $getrow['categorias_idcategorias'];
            $productoCompras->Disconnect();
            return $productoCompras;
        }else{
            return NULL;
        }
    }
    public static function buscar($query)
    {
        $arrproductoCompras = array();
        $tmp = new productocompras();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $inv = new productocompras();
            $inv->idproductoCompras = $valor['idproductoCompras'];
            $inv->cantidad = $valor['cantidad'];
            $inv->precioProducto = $valor['precioProducto'];
            $inv->compras = $valor['compras_idcompras'];
            $inv->categorias = $valor['categorias_idcategorias'];
            array_push($arrproductoCompras, $inv);
        }
        $tmp->Disconnect();
        return $arrproductoCompras;
    }
    public static function getAll()
    {
        return productocompras::buscar("SELECT * FROM productocompras");
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO productocompras VALUES (NULL, ?, ?, ?, ?)", array(
                $this->cantidad,
                $this->precioProducto,
                $this->compras,
                $this->categorias,
            )
        );
        $this->Disconnect();
    }
    public function editar()
    {
        $this->updateRow("UPDATE productocompras SET cantidad = ?, precioProducto = ?, compras_idcompras = ?, categorias_idcategorias = ? WHERE idproductoCompras = ?", array(
            $this->cantidad,
            $this->precioProducto,
            $this->compras,
            $this->categorias,
            $this->idproductoCompras,
        ));
        $this->Disconnect();
    }
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }







    //getters and setters







    /**
     * @return string
     */
    public function getIdproductoCompras()
    {
        return $this->idproductoCompras;
    }

    /**
     * @param string $idproductoCompras
     */
    public function setIdproductoCompras($idproductoCompras)
    {
        $this->idproductoCompras = $idproductoCompras;
    }

    /**
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param string $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return string
     */
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * @param string $precioProducto
     */
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }

    /**
     * @return string
     */
    public function getCompras()
    {
        return $this->compras;
    }

    /**
     * @param string $compras
     */
    public function setCompras($compras)
    {
        $this->compras = $compras;
    }

    /**
     * @return string
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @param string $categorias
     */
    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }


}
?>
