<?php

  class UsuariosController extends Controllers {
    
    public function __construct() {
      parent::__construct();
    }

    public function Add() {
      $roles = $this->rol->ListRoles();      
      $datos = Session::getSession("datos");
      $valida = Session::getSession("valida");       
      if ($datos != null || $valida != null) {
        $array1 = unserialize($datos);
        $array2 = unserialize($valida);        
        if($array1 != null && $array2 != null){
          $datos = $this->Usuario($array1);
          $valida = $this->Usuario($array2);          
          Session::setSession('datos', "");
          Session::setSession('valida', "");
          $this->view->Render($this, "Add", $datos, $valida, $roles);
        } else {
          $this->view->Render($this, "Add", null, null, $roles);
        }
      } else {
        $this->view->Render($this, "Add", null, null, $roles);
      }
      
    }

    public function List() {
      $usuarios = $this->usuario->ListUsuarios();
      $this->view->Render($this, "List", null, null, $usuarios);
    }

    public function AddUsuario() {
      /*$foto = null;
      if (isset($_FILES['foto'])) {
        $file = $_FILES['file']['tmp_name'];
        if ($file != null) {
          $contents = file_get_contents($file);
          $foto = base64_encode($contents);
        }
      }*/
      $execute = true;
      if (empty($_POST['nombres'])) {
        $nombres = '<i class="fas fa-exclamation-circle"></i>  Ingrese nombres y apellidos';
        $execute = false;
      }
      if (empty($_POST['usuario'])) {
        $usuario = '<i class="fas fa-exclamation-circle"></i>  Ingrese usuario';
        $execute = false;
      }
      if (empty($_POST['idrol'])) {
        $idrol = '<i class="fas fa-exclamation-circle"></i>  Seleccione un rol de usuario';
        $execute = false;
      }
      $datos = array(
        $_POST['nombres'],
        $_POST['usuario'],
        $_POST['idrol']        
      );
      Session::setSession('datos', serialize($datos));
      Session::setSession('valida', serialize(array(
        $nombres,
        $usuario,
        $idrol        
      )));
      header('Location: Add');
    }

  }

?>