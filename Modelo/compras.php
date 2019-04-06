<?php
require_once('DDBB_Conexion.php');

class compras extends DDBB_Conexion
{

    private $idcompras;
    private $fechaCompra;
    private $precioCompra;
    private $cantidad;
    private $producto;
    private $usuario;

    public function __construct($comprasData = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($comprasData)>1){ //
            foreach ($comprasData as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idcompras = "";
            $this->fechaCompra = "";
            $this->precioCompra = "";
            $this->cantidad = "";
            $this->producto = "";
            $this->usuario = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $compras = new compras();
        if ($id > 0){
            $getrow = $compras->getRow("SELECT * FROM compras WHERE idcompras =?", array($id));
            $compras->idcompras = $getrow['idcompras'];
            $compras->fechaCompra = $getrow['fechaCompra'];
            $compras->precioCompra = $getrow['precioCompra'];
            $compras->cantidad = $getrow['cantidad'];
            $compras->producto = $getrow['producto'];
            $compras->usuario = $getrow['usuario_idusuario'];
            $compras->Disconnect();
            return $compras;
        }else{
            return NULL;
        }
    }
    public static function buscar($query)
    {
        $arrcompras = array();
        $tmp = new compras();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $compras = new compras();
            $compras->idcompras = $valor['idcompras'];
            $compras->fechaCompra = $valor['fechaCompra'];
            $compras->precioCompra = $valor['precioCompra'];
            $compras->cantidad = $valor['cantidad'];
            $compras->producto = $valor['producto'];
            $compras->usuario = $valor['usuario_idusuario'];
            array_push($arrcompras,$compras);
        }
        $tmp->Disconnect();
        return $arrcompras;
    }
    public static function getAll()
    {
        return compras::buscar("SELECT * FROM compras");
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO compras VALUES (NULL, ?, ?, ?, ?, ?)", array(
                $this->fechaCompra,
                $this->precioCompra,
                $this->cantidad,
                $this->producto,
                $this->usuario,
            )
        );
        $this->Disconnect();
    }
    public function editar()
    {
        $this->updateRow("UPDATE compras SET fechaCompra = ?, precioCompra = ?, cantidad = ?, producto = ?, usuario_idusuario = ? WHERE idcompras = ?", array(
                $this->fechaCompra,
                $this->precioCompra,
                $this->cantidad,
                $this->producto,
                $this->usuario,
                $this->idcompras,
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
    public function getIdcompras()
    {
        return $this->idcompras;
    }

    /**
     * @param string $idcompras
     */
    public function setIdcompras($idcompras)
    {
        $this->idcompras = $idcompras;
    }

    /**
     * @return string
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * @param string $fechaCompra
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
    }

    /**
     * @return string
     */
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    /**
     * @param string $precioCompra
     */
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;
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
