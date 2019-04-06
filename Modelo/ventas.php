<?php
require_once('DDBB_Conexion.php');

class ventas extends DDBB_Conexion
{

    private $idventas;
    private $fechaVenta;
    private $precioVenta;
    private $cantidadV;
    private $producto;
    private $usuario;

    public function __construct($ventasData = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($ventasData)>1){ //
            foreach ($ventasData as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idventas = "";
            $this->fechaVenta = "";
            $this->precioVenta = "";
            $this->cantidadV = "";
            $this->producto = "";
            $this->usuario = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $ventas = new ventas();
        if ($id > 0){
            $getrow = $ventas->getRow("SELECT * FROM ventas WHERE idventas =?", array($id));
            $ventas->idventas= $getrow['idventas'];
            $ventas->fechaVenta = $getrow['fechaVenta'];
            $ventas->precioVenta = $getrow['precioVenta'];
            $ventas->cantidadV = $getrow['cantidadV'];
            $ventas->producto = $getrow['Producto'];
            $ventas->usuario = $getrow['usuario_idusuario'];
            $ventas->Disconnect();
            return $ventas;
        }else{
            return NULL;
        }
    }
    public static function buscar($query)
    {
        $arrventa = array();
        $tmp = new ventas();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $ventas = new ventas();
            $ventas->idventas = $valor['idventas'];
            $ventas->fechaVenta = $valor['fechaVenta'];
            $ventas->precioVenta = $valor['precioVenta'];
            $ventas->cantidadV = $valor['cantidadV'];
            $ventas->producto = $valor['Producto'];
            $ventas->usuario = $valor['usuario_idusuario'];
            array_push($arrventa,$ventas);
        }
        $tmp->Disconnect();
        return $arrventa;
    }
    public static function getAll()
    {
        return ventas::buscar("SELECT * FROM ventas");
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO ventas VALUES (NULL, ?, ?, ?, ?, ?)", array(
                $this->fechaVenta,
                $this->precioVenta,
                $this->cantidadV,
                $this->producto,
                $this->usuario,
            )
        );
        $this->Disconnect();
    }
    public function editar()
    {
        $this->updateRow("UPDATE ventas SET fechaVenta = ?, precioVenta = ?, cantidadV = ?, Producto = ?, usuario_idusuario = ? WHERE idventas = ?", array(
                $this->fechaVenta,
                $this->precioVenta,
                $this->cantidadV,
                $this->producto,
                $this->usuario,
                $this->idventas,
            )
        );
        $this->Disconnect();
    }
    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }






    //setters and getters





    /**
     * @return string
     */
    public function getIdventas()
    {
        return $this->idventas;
    }

    /**
     * @param string $idventas
     */
    public function setIdventas($idventas)
    {
        $this->idventas = $idventas;
    }

    /**
     * @return string
     */
    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }

    /**
     * @param string $fechaVenta
     */
    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;
    }

    /**
     * @return string
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * @param string $precioVenta
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    /**
     * @return string
     */
    public function getCantidadV()
    {
        return $this->cantidadV;
    }

    /**
     * @param string $cantidadV
     */
    public function setCantidadV($cantidadV)
    {
        $this->cantidadV = $cantidadV;
    }

    /**
     * @return string
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param string $producto
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }



}
