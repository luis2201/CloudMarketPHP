<?php

  /* Controlador base del cual todos los controladores estarán heredando sus propiedades */
  class Controller {

    function __construct() {
      $this->view = new View();
    }

    //Función para cargar el modelo
    function loadModel($model) {
      $url = 'models/' . $model . 'model.php';

      if (file_exists($url)) {
        require_once $url;

        $modelName = $model.'Model';
        $this->model = new $modelName();
      }
    }

    //Función para comprobar si existen parámetros enviados por POST
    function existsPOST($params) {
      foreach ($params as $param) {
        if (!isset($_POST[$param])) {
          return false;
        }
      }

      return true;
    }

    //Función para comprobar si existen parámetros enviados por GET
    function existsGET($params) {
      foreach ($params as $param) {
        if (!isset($_POST[$param])) {
          return false;
        }
      }

      return true;
    }

    function getPOST($name) {
      return $_POST[$name];
    }

    function getGET($name) {
      return $_GET[$name];
    }

    function redirect($url, $mensajes) {
      $data = [];
      $params = '';

      foreach ($mensajes as $key => $mensaje) {
        array_push($data, $key . '=' . $mensaje);
      }
      //preparo los parámetros para ser enviados por la URL
      $params = join('&', $data);
      
      if ($params != '') {
        $params = '?' . $params;
      }

      header('Location: ' . constant(URL) . $url . $params);
    }

  }

?>