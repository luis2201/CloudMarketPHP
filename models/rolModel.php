<?php

  require_once 'dao/rolDAO.php';

  class RolModel extends Model {

    public $idrol;
    public $rol;

    function __construct() {
      parent::__construct();
    }

    public function selectAll() {
      try {
        $query = $this->query('CALL sp_rol_selectAll()');

        $items = [];
        while ($row = $query->fetch()) {
          $item = new RolDAO();
          $item->idrol  = $row['idrol'];
          $item->rol    = $row['rol'];                    

          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::SELECTALL => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

  }

?>