<?php

  class UsuarioController extends Controllers {
    
    public function __construct() {
      parent::__construct();
    }

    public function Usuarios() {
      $this->view->Render($this, "Add", null);
    }

  }

?>