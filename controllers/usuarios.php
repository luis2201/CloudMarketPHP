<?php

  class Usuarios extends Controller {

    function __construct() {
      parent::__construct();
      $this->view->render('usuarios/new');
      error_log("CONTROLLERS::HOME -> Carga del controlador usuarios");
    }

  }

?>