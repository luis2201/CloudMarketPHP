<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas default     */
  /* *************************************************** */
  class HomeController extends Controller {

    function __construct() {
      parent::__construct();      
    }

    function render() {
      $this->view->render('home/index');      
    }

  }

?>