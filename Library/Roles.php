<?php

  declare(strict_types = 1);

  class Roles extends Connection {

    public function __construct() {
      parent::__construct();
    }

    public function SetRoles() {
      try {
        $this->db->pdo->beginTransaction();
        $listaRoles = array("ADMINISTRADOR", "BODEGA", "CAJA");
        $where = " WHERE rol = :rol";
        foreach ($listaRoles as $key => $value) {
          $roles = $this->db->SelectOne("rol", "roles", $where, array('rol' => $value));
          if (is_array($roles)) {
            if (0 == count($roles['results'])) {
              $sql = "INSERT INTO roles(rol) VALUES(:rol)";
              $sth = $this->db->pdo->prepare($sql);
              $sth->execute((array)$this->roles(array($value)));
            }
          } else {
            break;
            return $roles;
          }          
        }
        $this->db->pdo->commit();
      } catch (\Throwable $th) {
        $this->db->pdo->rollBack();
        return $th->getMessage();
      }
    }

    public function Roles(array $array) {
      return new class($array) { //clase anónima que devuelve un array
        var $rol;

        function __construct($array) {
          if (0 < count($array)) {
            $this->rol = $array[0];
          }
        }

      };
    }

    public function ListRoles() {
      $roles = $this->db->SelectAll('*', 'roles');
      if(is_array($roles)) {
        if (0 < count($roles['results'])) {
          return $roles['results'];
        } else {
          return $roles;
        }
      }
    }

  }

?>