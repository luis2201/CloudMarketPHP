<?php

  class JoinProductoCategoriaModel extends Model {

    private $idproducto;
    private $codigo;
    private $descripcion;
    private $idcategoria;
    private $categoria;
    private $unidad;
    private $stock;
    private $stockmin;
    private $stockmax;
    private $pcosto;
    private $ppublico;
    private $iva;
    private $estado;

    public function __construct() {
      parent::__construct();
    }    

    public function setIdProducto($idproducto) { $this->idproducto = $idproducto; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setIdCategoria($idcategoria) { $this->idcategoria = $idcategoria; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function setUnidad($unidad) { $this->unidad = $unidad; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setStockMin($stockmin) { $this->stockmin = $stockmin; }
    public function setStockMax($stockmax) { $this->stockmax = $stockmax; }
    public function setPCosto($pcosto) { $this->pcosto = $pcosto; }
    public function setPPublico($ppublico) { $this->ppublico = $ppublico; }
    public function setIva($iva) { $this->iva = $iva; }
    public function setEstado($estado) { $this->estado = $estado; }

    public function getIdProducto() { return $this->idcategoria; }
    public function getCodigo() { return $this->codigo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getIdCategoria() { return $this->idcategoria; }
    public function getCategoria() { return $this->categoria; }
    public function getUnidad() { return $this->unidad; }
    public function getStock() { return $this->stock; }
    public function getStockMin() { return $this->stockmin; }
    public function getStockMax() { return $this->stockmax; }
    public function getPCosto() { return $this->pcosto; }
    public function getPPublico() { return $this->ppublico; }
    public function getIva() { return $this->iva; }
    public function getEstado() { return $this->estado; }

    public function getAll() {
      $items = [];
      try {
        $query = $this->query('CALL sp_producto_categoria();');

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new JoinProductoCategoriaModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('JoinProductoCategoriaModel::getAll -> Error: ' . $th);
        return null;
      }
    }

    public function from($array) {
      $this->idproducto   = $array['idproducto'];
      $this->codigo       = $array['codigo'];
      $this->descripcion  = $array['descripcion'];
      $this->idcategoria  = $array['idcategoria'];
      $this->categoria    = $array['categoria'];
      $this->unidad       = $array['unidad'];
      $this->stock        = $array['stock'];
      $this->stockmin     = $array['stockmin'];
      $this->stockmax     = $array['stockmax'];
      $this->pcosto       = $array['pcosto'];
      $this->ppublico     = $array['ppublico'];
      $this->iva          = $array['iva'];
      $this->estado       = $array['estado'];
    }

    public function toArray() {
      $array = [];
      $array['idproducto']  = $this->idproducto;
      $array['codigo']      = $this->codigo;
      $array['descripcion'] = $this->descripcion;
      $array['idcategoria'] = $this->idcategoria;
      $array['categoria']   = $this->categoria;
      $array['unidad']      = $this->unidad;
      $array['stock']       = $this->stock;
      $array['stockmin']    = $this->stockmin;
      $array['stockmax']    = $this->stockmax;
      $array['pcosto']      = $this->pcosto;
      $array['ppublico']    = $this->ppublico;      
      $array['iva']         = $this->iva;
      $array['estado']      = $this->estado;

      return $array;
    }

  }


?>