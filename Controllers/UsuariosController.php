<?php

  class UsuariosController extends Controllers {
    
    public function __construct() {
      parent::__construct();
    }

    public function Add() {
      $this->view->Render($this, "add", null);
    }

    public function List() {
      $this->view->Render($this, "list", null);
    }

    public function AddUsuarios() {

    }

  }

?>