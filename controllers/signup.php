<?php

  class Signup extends SessionController {

    function __construct() {
      parent::__construct();
    }

    function render() {
      $this->view->render('login/signup', []);
    }

    function nuevoUsuario() {
      if ($this->existsPOST(['usuario', 'contrasena'])) {
        # code...
      } else {
        $this->redirect('signup', ['error' ])
      }
    }

  }

?>