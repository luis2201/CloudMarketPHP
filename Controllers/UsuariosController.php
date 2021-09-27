<?php

  class UsuariosController extends Controllers {
    
    public function __construct() {
      parent::__construct();
    }

    public function Add() {
      $roles = $this->rol->ListRoles();
      $this->view->Render($this, "add", $roles);
    }

    public function List() {
      $usuarios = $this->usuario->ListUsuarios();
      $this->view->Render($this, "list", $usuarios);
    }

    public function AddUsuarios() {

    }

  }

?>