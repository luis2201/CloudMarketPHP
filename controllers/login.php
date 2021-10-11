<?php

  class Login extends SessionController {

    function __construct() {
      parent::__construct();
    }
    
    /*function loadModel() {

    }*/

    function render() {
      $this->view->render('login/index');
    }
    
  }

?>