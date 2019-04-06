<?php

require_once('DDBB_Conexion.php');

/**
 *
 */
class productosventas extends DDBB_Conexion
{

    private $idproductosVentas;
    private $cantidad;
    private $precioProducto;
    private $ventas;
    private $categorias;



    public function __construct($productosventas_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($productosventas_data)>1){ //
            foreach ($productosventas_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idproductosVentas = "";
            $this->cantidad = "";
            $this->precioProducto = "";
            $this->ventas = "";
            $this->categorias = "";
        }
    }
    function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
    {
        $productosVentas = new productosventas();
        if ($id > 0){
            $getrow = $productosVentas->getRow("SELECT * FROM productosventas WHERE idproductosVentas =?", array($id));
            $productosVentas->idproductosVentas = $getrow['idproductosVentas'];
            $productosVentas->cantidad = $getrow['cantidad'];
            $productosVentas->precioProducto = $getrow['precioProducto'];
            $productosVentas->ventas = $getrow['ventas_idventas'];
            $productosVentas->categorias = $getrow['categorias_idcategorias'];
            $productosVentas->Disconnect();
            return $productosVentas;
        }else{
            return NULL;
        }
    }
    public static function buscar($query)
    {
        $arrproductosVentas = array();
        $tmp = new productosventas();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $ven = new productosventas();
            $ven->idproductosVentas = $valor['idproductosVentas'];
            $ven->cantidad = $valor['cantidad'];
            $ven->precioProducto = $valor['precioProducto'];
            $ven->ventas = $valor['ventas_idventas'];
            $ven->categorias = $valor['categorias_idcategorias'];
            array_push($arrproductosVentas, $ven);
        }
        $tmp->Disconnect();
        return $arrproductosVentas;
    }
    public static function getAll()
    {
        return productosventas::buscar("SELECT * FROM productosventas");
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO productosventas VALUES (NULL, ?, ?, ?, ?)", array(
                $this->cantidad,
                $this->precioProducto,
                $this->ventas,
                $this->categorias,
            )
        );
        $this->Disconnect();
    }
    public function editar()
    {
        $this->updateRow("UPDATE productosventas SET cantidad = ?, precioProducto = ?, ventas_idventas = ?, categorias_idcategorias = ? WHERE idproductosVentas = ?", array(
            $this->cantidad,
            $this->precioProducto,
            $this->ventas,
            $this->categorias,
            $this->idproductosVentas,
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
    public function getIdproductosVentas()
    {
        return $this->idproductosVentas;
    }

    /**
     * @param string $idproductosVentas
     */
    public function setIdproductosVentas($idproductosVentas)
    {
        $this->idproductosVentas = $idproductosVentas;
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
    public function getVentas()
    {
        return $this->ventas;
    }

    /**
     * @param string $ventas
     */
    public function setVentas($ventas)
    {
        $this->ventas = $ventas;
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
