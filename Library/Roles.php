<?php

  class Roles extends Connection {

    public function __construct() {
      parent::__construct();
    }

    public function SetRoles() {
      try {
        $this->db->pdo->beginTransaction();
        $listaRoles = array("ADMINISTRADOR", "BODEGA", "CAJA");
        $where = "WHERE rol = :rol";
        foreach ($listaRoles as $key => $value) {
          $roles = $this->db->SelectOne("rol", "roles", $where, array('rol' => $value));
        }
      } catch (\Throwable $th) {
        //throw $th;
      }
    }

  }

?>