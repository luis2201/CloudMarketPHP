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
        require_once $fileController;
        $controller = new HomeController();
        error_log('APP::CONSTRUCT -> Cargando la vista home por defecto');

        //Cargamos el modelo
        $controller->loadModel('home');
        error_log('APP::CONSTRUCT -> Cargando el modelo');

        return false;      
      }

      //Extrayendo el nombre del controlador
      $fileController = 'controllers/' . $url[0] . 'controller.php'; 

      if(file_exists($fileController)) {
        //Si existe el archivo lo mandamos a llamar y cargamos el controlador
        require_once $fileController;
        $controllerName = $url[0] . 'Controller';
        $controller = new $controllerName;
        error_log('APP::CONSTRUCT -> Cargando el controlador');

        //Cargamos el modelo
        $controller->loadModel($url[0]);
        error_log('APP::CONSTRUCT -> Cargando el modelo');

        //Si existe el método lo mandamos a llamar a través del controlador
        if (isset($url[1])) {
          $controller->{$url[1]}();
          error_log('APP::CONSTRUCT -> Cargando el método');
        }
      } else {        
        //Si no existe el archivo mandamos a llamar al controlador error                
        $controller = new ErrorController();
        error_log('APP::CONSTRUCT -> Cargando el controlador error');
      }
    }

  }

?>