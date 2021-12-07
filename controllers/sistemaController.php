<?php

  /* *************************************************** */
  /* Controlador para la carga de las vista Sisetma      */
  /* *************************************************** */  

  class SistemaController extends Controller {

    function __construct() {
      parent::__construct(); 
      $this->view->mensaje = "";      
    }
    
    function render() {
      //$result = $this->model->selectAll();
      //$this->view->usuarios = $result;
      $this->view->render('sistema/index');
    }

  }

?>