<?php

  class ErrorController extends Controller{

    function __construct() {
      parent::__construct();
    }

    function render() {
      $this->view->errcode = '404';
      $this->view->errmsj = "La p&aacute;gina solicitada no existe";
      $this->view->render('error/index');
      
      error_log("CONTROLLERS::ERROR -> Carga del controlador Error");
    }
    
  }

?>