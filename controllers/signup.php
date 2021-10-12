<?php

  class Signup extends SessionController {

    function __construct() {
      parent::__construct();
    }

    function render() {
      $this->view->render('login/signup', []);
    }

    function newUser() {
      if ($this->existsPOST(['usuario', 'contrasena'])) {
        $usuario = $this->getPost('usuario');
        $contrasena = $this->getPost('contrasena');

        if ($usuario == '' || empty($usuario) || $contrasena == '' || empty($contrasena)) {
          $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
        }

        $user = new UsuarioModel();
        $user->setUsuario($usuario);
        $user->setContrasena($contrasena);
        $user->setRol('user');

        if ($user->exists($usuario)) {
          $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXIST]);
        } else if ($user->save()) {
          $this->redirect('', ['success' => SuccessMessages::SUCCESS_SIGNUP_NEWUSER]);
        } else {
          $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
      } else {
        $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
      }
    }

  }

?>