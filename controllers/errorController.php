<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas default     */
  /* *************************************************** */
  class ErrorController extends Controller {

    function __construct() {
      parent::__construct();      
    }

    function render() {
      $this->view->code = "404";
      $this->view->mensaje = "Error al cargar el recurso";
      $this->view->render('error/index');
    }

  }

?>