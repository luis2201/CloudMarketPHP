<?php

  class UsuariosController extends Controllers {
    
    public function __construct() {
      parent::__construct();
    }

    public function Add() {
      $roles = $this->rol->ListRoles();      
      echo '<script>alert("kakakak");</script>';
      $this->view->Render($this, "Add", null, null, $roles);
    }

    public function List() {
      $usuarios = $this->usuario->ListUsuarios();
      $this->view->Render($this, "List", null, null, $usuarios);
    }

    public function AddUsuario() {
      $execute = true;
      $foto = null;
      if (empty($_POST['nombres'])) {
        $nombres = '<i class="fas fa-exclamation-circle"></i>  Ingrese nombres y apellidos';
        $execute = false;
      }
      if (empty($_POST['usuario'])) {
        $usuario = '<i class="fas fa-exclamation-circle"></i>  Ingrese usuario';
        $execute = false;
      }
      if ($_POST['rol'] == "") {
        $rol = '<i class="fas fa-exclamation-circle"></i>  Seleccione un rol de usuario';
        $execute = false;
      }
      if (isset($_FILES['foto'])) {
        $file = $_FILES['foto']['tmp_name'];
        if ($file != null) {
          $contents = file_get_contents($file);
          $foto = base64_encode($contents);
        }
      }
      $datos = array(
        $_POST['nombres'],
        $_POST['usuario'],
        $_POST['rol'],
        $foto
      );
      Session::setSession('datos', serialize($datos));
      Session::setSession('valida', serialize(array(
        $nombres,
        $usuario,
        $rol,
        ""    
      )));
      header('Location: Add');
    }

  }
