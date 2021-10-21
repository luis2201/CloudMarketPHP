<?php

  require_once 'controllers/errorcontroller.php';
  
  class App {
        
    function __construct() {      
      //Validación de la url y asignado un valor
      $url = isset($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);
      
      //Si no se ingresó un controlador se visualiza el controlador home por defecto
      if(empty($url[0])) {
        $fileController = 'controllers/homecontroller.php';
        error_log('APP::CONSTRUCT -> Cargando el controlador home por defecto');

        require_once $fileController;
        $controller = new HomeController();
        $controller->loadModel('home');
        $controller->render();

        return false;      
      }

      //Extrayendo el nombre del controlador
      $fileController = 'controllers/' . $url[0] . 'controller.php'; 

      if(file_exists($fileController)) {
        //Si existe el archivo lo mandamos a llamar y cargamos el controlador
        require_once $fileController;
        $controllerName = $url[0] . 'Controller';
        $controller = new $controllerName;
        $controller->loadModel($url[0]);
        error_log('APP::CONSTRUCT -> Cargando ' . $controllerName);

        //Si existe el método lo mandamos a llamar a través del controlador
        if (isset($url[1])) {
          if (method_exists($controller, $url[1])) {
            if (isset($url[2])) {
              $nparam = count($url) - 2;
              $params = [];

              for ($i=0; $i < $params; $i++) { 
                array_push($params, $url[$i]+2);
              }

              $controller->{$url[1]}($params);
            } else {
              error_log('APP::CONSTRUCT -> Método sin parámetros');
              $controller->{$url[1]}();
            }
          } else {
            $controller = new ErrorController();
            $controller->render();
            error_log('APP::CONSTRUCT -> No existe el método');
          }
        } else {
          $controller->render();
        }
      } else {        
        //Si no existe el archivo mandamos a llamar al controlador error                
        $controller = new ErrorController();
        $controller->render();
        error_log('APP::CONSTRUCT -> Cargando el controlador error');
      }
    }

  }

?>