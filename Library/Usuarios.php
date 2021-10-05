<?php 

  declare(strict_types = 1);

  class Usuarios extends Connection {

    public function __construct() {
      parent::__construct();
    }

    public function ListUsuarios() {
      $usuarios = $this->db->SelectAll('U.idusuario, U.nombres, U.usuario, R.rol, U.estado', 'usuarios U INNER JOIN roles R ON U.idrol = R.idrol ORDER BY U.nombres');
      if(is_array($usuarios)) {
        if (count($usuarios['results']) > 0) {          
          return $usuarios['results'];
        } else {          
          return $usuarios;
        }
      }
    }

  }

?>