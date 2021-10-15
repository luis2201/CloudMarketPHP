<?php

  class Dashboard extends SessionController {

    function __construct() {
      error_log('Dashboard::construct -> Inicio de Dashboard');
      parent::__construct();
    }

    function render() {      
      error_log('Dashboard::render -> Carga el index del Dashboard');
      $this->view->render('dashboard/index');
    }

    public function getProducto() {
      
    }

    public function getCategoria() {
      
    }
    
  }

?>