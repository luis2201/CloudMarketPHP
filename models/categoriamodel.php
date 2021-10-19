<?php

  class CategoriaModel extends Model implements InterfaceModel {

    private $idcategoria;
    private $categoria;
    private $estado;

    public function __construct() {
      parent::__construct();
    }

    public function setIdCategoria($idcategoria) { $this->idcategoria = $idcategoria; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function setEstado($estado) { $this->estado = $estado; }

    public function getIdCategoria() { return $this->idcategoria; }
    public function getCategoria() { return $this->categoria; }
    public function getEstado() { return $this->estado; }

    public function save() {
      try {
        $query = $this->prepare("CALL sp_categoria_insert(:categoria)");
        $query->execute([
          "categoria"      => $this->categoria          
        ]);

        if($query->rowCount())  return true;

        return false;
      } catch (PDOException $th) {
        error_log('CategoriaModel::save -> Error: ' . $th);
        return false;
      }
    }
    
    public function get($idcategoria) {
      try {
        $query = $this->prepare('CALL sp_categoria_selectId(:idcategoria)');
        $query->execute([
          "idcategoria"   => $idcategoria
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);        
                
        $this->from($result);
        
        return $this;
      } catch (PDOException $th) {
        error_log('CategoriaModel::get -> Error: ' . $th);
        return false;
      }
    }

    public function getAll() {
      $items = [];
      try {
        $query = $this->query('CALL sp_categoria_select();');

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new CategoriaModel();
          $item->from($result);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('CategoriaModel::getAll -> Error: ' . $th);
        return null;
      }
    }

    public function delete($idcategoria) {
      try {
        $query = $this->prepare('CALL sp_categoria_delete(:idcategoria);');
        $query->execute([
          "idcategoria"   => $idcategoria
        ]);
               
        return true;
      } catch (PDOException $th) {
        error_log('CategoriaModel::delete -> Error: ' . $th);
        return false;
      }
    }

    public function update() {
      try {
        $query = $this->prepare("CALL sp_categoria_update(:idcategoria, :categoria)");
        $query->execute([
          "idcategoria"  => $this->idcategoria,
          "categoria"    => $this->categoria
        ]);

        if($query->rowCount())  return true;

        return false;
      } catch (PDOException $th) {
        error_log('ProductoModel::update -> Error: ' . $th);
        return false;
      }
    }

    public function from($array) {
      $this->idcategoria = $array['idcategoria'];
      $this->categoria   = $array['categoria'];
    }

    public function exists($categoria) {
      try {
        $query = $this->prepare("CALL sp_categoria_name(:categoria)");
        $query->execute([
          "categoria"      => $this->categoria          
        ]);

        if($query->rowCount())  return true;

        return false;
      } catch (PDOException $th) {
        error_log('CategoriaModel::save -> Error: ' . $th);
        return false;
      }
    }

  }

?>