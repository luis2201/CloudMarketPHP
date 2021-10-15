<?php

  class ProductoModel extends Model implements InterfaceModel {

    private $idproducto;
    private $codigo;
    private $descripcion;
    private $idcategoria;
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

    public function save() {
      try {
        $query = $this->prepare("CALL sp_productos_insert(:codigo, :descripcion, :idcategoria, :unidad, :stock, :stockmin, :stockmax, :pcosto, :ppublico, :iva)");
        $query->execute([
          "codigo"      => $this->codigo,
          "descripcion" => $this->descripcion,
          "idcategoria" => $this->idcategoria,
          "unidad"      => $this->unidad,
          "stock"       => $this->stock,
          "stockmin"    => $this->stockmin,
          "stockmax"    => $this->stockmax,
          "pcosto"      => $this->pcosto,
          "ppublico"    => $this->ppublico,
          "iva"         => $this->iva
        ]);

        if($query->rowCount())  return true;

        return false;
      } catch (PDOException $th) {
        error_log('ProductoModel::save -> Error: ' . $th);
        return false;
      }
    }
    
    public function get($idproducto) {
      try {
        $query = $this->prepare('SELECT * FROM usuarios WHERE idusuario = :idusuario');
        $query->execute([
          "idusuario"   => $idusuario
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);        
                
        $this->setIdUsuario($result['idusuario']);
        $this->setNombres($result['nombres']);
        $this->setUsuario($result['usuario']);
        $this->setContrasena($result['contrasena']);
        $this->setRol($result['rol']);
        $this->setFoto($result['foto']);
        $this->setEstado($result['estado']);
        
        return $this;
      } catch (PDOException $th) {
        error_log('ProductoModel::get -> Error: ' . $th);
      }
    }

    public function getAll() {
      $items = [];
      try {
        $query = $this->query('SELECT * FROM productos ORDER BY descripcion');

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new ProductoModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('ProductoModel::getAll -> Error: ' . $th);
        return false;
      }
    }

    public function delete($id) {}

    public function update(){}

    public function from($array) {}

    public function setIdProducto($idproducto) { 
      $this->idproducto = $idproducto; 
    }

    public function setCodigo($codigo) { 
      $this->codigo = $codigo; 
    }

    public function setDescripcion($descripcion) { 
      $this->descripcion = $descripcion; 
    }

    public function setIdCategoria($idcategoria) { 
      $this->idcategoria = $idcategoria; 
    }

    public function setUnidad($unidad) { 
      $this->unidad = $unidad; 
    }

    public function setStock($stock) { 
      $this->stock = $stock; 
    }

    public function setStockMin($stockmin) { 
      $this->stockmin = $stockmin; 
    }

    public function setStockMax($stockmax) { 
      $this->stockmax = $stockmax; 
    }

    public function setPCosto($pcosto) { 
      $this->pcosto = $pcosto; 
    }

    public function setPPublico($ppublico) { 
      $this->ppublico = $ppublico; 
    }

    public function setIva($iva) { 
      $this->iva = $iva; 
    }

    public function setEstado($estado) { 
      $this->estado = $estado; 
    }

    public function getIdProducto() {
      return $this->idcategoria;
    }

    public function getCodigo() {
      return $this->codigo;
    }

    public function getDescripcion() {
      return $this->descripcion;
    }

    public function getIdCategoria() {
      return $this->idcategoria;
    }

    public function getUnidad() {
      return $this->unidad;
    }

    public function getStock() {
      return $this->stock;
    }

    public function getStockMin() {
      return $this->stockmin;
    }

    public function getStockMax() {
      return $this->stockmax;
    }

    public function getPCosto() {
      return $this->pcosto;
    }

    public function getPPublico() {
      return $this->ppublico;
    }

    public function getIva() {
      return $this->iva;
    }

    public function getEstado() {
      return $this->estado;
    }

  }

?>