<?php

  /* Controlador base del cual todos los controladores estarán heredando sus propiedades */
  class Controller {

    function __construct() {            
      $this->view = new View();
    }

    function loadModel($model) {
      $url = 'models/' . $model . 'model.php';

      //Comprobando que exista la ruta ingresada
      if(file_exists($url)) {
        require $url;

        //Estructurando el nombre del modelo
        $modelName = $model . 'Model';        
        $this->model = new $modelName();
      }
    }

    function existsPOST($params) {
      foreach ($params as $param) {
        if(!isset($_POST[$params])) {
          error_log('CONTROLLER::existsPOST -> No existe el parámetro' . $params);
          return false;
        }
      }

      return true;
    }

    function existsGET($params) {
      foreach ($params as $param) {
        if(!isset($_GET[$params])) {
          error_log('CONTROLLER::existsGET -> No existe el parámetro' . $params);
          return false;
        }
      }

      return true;
    }

    function getPOST($nameparam) {
      return $_POST[$nameparam];
    }

    function getGET($nameparam) {
      return $_GET[$nameparam];
    }

    function redirect($route, $messages) {
      $data = [];
      $params = [];

      foreach ($messages as $key => $mesage) {
        array_push($data, $key . '=' . $mesage);
      }

      $params = join('&', $data);
      if ($params != '') {
        $params = '?' . $params;
      }

      header('Location: ' . constant('URL') . $route . $params);
    }
    
  }

?>