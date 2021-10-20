<?php

  class UsuarioModel extends Model {

    public function __construct() {
      parent::__construct();
      error_log("CONTROLLERS::HOME -> Carga del modelo usuarios");
    }

    public function insert($params) {
      $query = 'CALL sp_usuario_insert(:nombres, :usuario, :contrasena, :idrol);';
      try {
        $query = $this->db->prepare($query);
        $query->execute([
          'nombres'     => $params['nombres'],
          'usuario'     => $params['usuario'],
          'contrasena'  => $params['usuario'],
          'idrol'       => $params['idrol'],
        ]);

        return true;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::INSERT -> ERROR! ' . $th->getMessage());
        return false;
      }
    }

  }

?>