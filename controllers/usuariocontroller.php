<?php

  class UsuarioController extends Controller {
    
    function __construct() {
      parent::__construct();
      $this->view->render('usuarios/new');
      error_log("CONTROLLERS::HOME -> Carga del controlador usuarios");
    }

    function register() {
      $nombres = $_POST['nombres'];
      $usuario = $_POST['usuario'];
      $idrol = $_POST['idrol'];

      $params = [
        'nombres'   => $nombres,
        'usuario'   => $usuario,
        'idrol'     => $idrol
      ];

      if($this->model->insert($params)) {
        echo "Usuario registrado satisfactoriamente";
      } else {
        echo "Algo pasó";
      }
    }

    function list() {
      echo 'aquí el list';
    }

  }

?>