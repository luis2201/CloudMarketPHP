<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas default     */
  /* *************************************************** */
  class EmpresaController extends Controller {

    function __construct() {
      parent::__construct();      
    }

    function render() {
      $result = $this->model->view();
    
      $this->view->empresa = $result;
      $this->view->render('empresa/index');      
    }

  }

?>