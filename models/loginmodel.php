<?php

  require_once 'models/usuariomodel.php';
  
  class LoginModel extends Model {

    function __construct() {
      parent::__construct();
    }
    
    function login($usuario, $contrasena) {
      try {
        $query = $this->prepare("CALL sp_login(:usuario)");
        $query->execute(['usuario' => $usuario]);

        if($query->rowCount() == 1) {
          $item = $query->fetch(PDO::FETCH_ASSOC);

          $user = new UsuarioModel();
          $user->from($item);
          
          if (password_verify($contrasena, $user->getContrasena())) {
            return $user;
          } else {
            return null;
          }
        }
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
        return null;
      }
    }
  }

?>