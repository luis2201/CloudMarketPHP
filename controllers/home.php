<?php

  class Home extends Controller {

    function __construct() {
      parent::__construct();
      $this->view->render('home/index');
      error_log("CONTROLLERS::HOME -> Carga del controlador home");
    }
    
  }

?>