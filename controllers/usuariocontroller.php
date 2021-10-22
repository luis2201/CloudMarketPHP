<?php

  class UsuarioController extends Controller {
    
    function __construct() {
      parent::__construct();
    }

    function render() {
      $this->view->render('usuarios/new');
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
        $this->redirect('', ['success' => SuccessMessages::SUCCESS_NEW_USER]);
      } else {
        echo "Algo pasó";
      }
    }

    function list() {
      echo 'aquí el list';
    }

  }

?>