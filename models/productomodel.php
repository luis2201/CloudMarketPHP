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

    public function setIdProducto($idproducto) { $this->idproducto = $idproducto; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setIdCategoria($idcategoria) { $this->idcategoria = $idcategoria; }
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
    public function getUnidad() { return $this->unidad; }
    public function getStock() { return $this->stock; }
    public function getStockMin() { return $this->stockmin; }
    public function getStockMax() { return $this->stockmax; }
    public function getPCosto() { return $this->pcosto; }
    public function getPPublico() { return $this->ppublico; }
    public function getIva() { return $this->iva; }
    public function getEstado() { return $this->estado; }

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
        $query = $this->prepare('CALL sp_producto_selectId(:idproducto)');
        $query->execute([
          "idproducto"   => $idproducto
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);        
                
        $this->from($result);
        
        return $this;
      } catch (PDOException $th) {
        error_log('ProductoModel::get -> Error: ' . $th);
        return false;
      }
    }

    public function getAll() {
      $items = [];
      try {
        $query = $this->query('CALL sp_producto_select();');

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new ProductoModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('ProductoModel::getAll -> Error: ' . $th);
        return null;
      }
    }

    public function delete($idproducto) {
      try {
        $query = $this->prepare('CALL sp_producto_delete(:idproducto);');
        $query->execute([
          "idproducto"   => $idproducto
        ]);        
        
        return true;
      } catch (PDOException $th) {
        error_log('ProductoModel::delete -> Error: ' . $th);
        return false;
      }
    }

    public function update(){
      try {
        $query = $this->prepare("CALL sp_producto_update(:idproducto, :codigo, :descripcion, :idcategoria, :unidad, :stock, :stockmin, :stockmax, :pcosto, :ppublico, :iva)");
        $query->execute([
          "idproducto"  => $this->idproducto,
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
        error_log('ProductoModel::update -> Error: ' . $th);
        return false;
      }
    }

    public function from($array) {
      $this->idproducto   = $array['idproducto'];
      $this->codigo       = $array['codigo'];
      $this->descripcion  = $array['descripcion'];
      $this->idcategoria  = $array['idcategoria'];
      $this->unidad       = $array['unidad'];
      $this->stock        = $array['stock'];
      $this->stockmin     = $array['stockmin'];
      $this->stockmax     = $array['stockmax'];
      $this->pcosto       = $array['pcosto'];
      $this->ppublico     = $array['ppublico'];
      $this->iva          = $array['iva'];
      $this->estado       = $array['estado'];
    }

    public function getAllByUserId($idusuario) {
      $item = [];
      try {
        $query = $this->query('CALL sp_producto_usuarioId(:idusuario);');      
        $query->execute([
          "idusuario"   => $idusuario
        ]);

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new ProductoModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('ProductoModel::getAllByUserId -> Error: ' . $th);
        return [];
      }
    }

    public function getByUserIdAndLimit($idusuario, $limit) {
      $item = [];
      try {
        $query = $this->query('CALL sp_producto_usuarioIdLimit(:idusuario, :limit);');      
        $query->execute([
          "idusuario"   => $idusuario,
          "limit"       => $limit
        ]);

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new ProductoModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('ProductoModel::getAllByUserIdLimit -> Error: ' . $th);
        return [];
      }
    }

  }

?>