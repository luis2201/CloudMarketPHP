<?php

  class Login extends SessionController {

    function __construct() {
      error_log('Login::construct -> inicio de Login');
      parent::__construct();
    }

    function render() {
      $this->view->render('login/index');
    }

    function authenticate() {
      if ($this->existsPOST(['usuario', 'contrasena'])) {
        $usuario = $this->getPOST('usuario');
        $contrasena = $this->getPOST('contrasena');

        if ($usuario == '' || empty($usuario) || $contrasena == '' || empty($contrasena)) {
          $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
        } else {

          $user = $this->model->login($usuario, $contrasena);

          if ($user != null) {
            $this->initialize($user);
          } else {
            $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
          }
        }
      } else {
        $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE]);
      }
    }
    
  }

?>