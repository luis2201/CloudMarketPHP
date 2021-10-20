<?php

  require_once 'controllers/error.php';
  
  class App {
        
    function __construct() {      
      //Validación de la url y asignado un valor
      $url = isset($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);
      
      //Si no se ingresó un controlador se visualiza el controlador home por defecto
      if(empty($url[0])) {
        $fileController = 'controllers/home.php';
        require_once $fileController;
        $controller = new Home();
        
        error_log('APP::CONSTRUCT -> Cargando la vista home por defecto');
        return false;      
      }

      //Extrayendo el nombre del controlador
      $fileController = 'controllers/' . $url[0] . '.php';      

      if(file_exists($fileController)) {
        //Si existe el archivo lo mandamos a llamar y cargamos el controlador
        require_once $fileController;
        $controller = new $url[0];

        error_log('APP::CONSTRUCT -> Cargando la vista');
        //Si existe el método lo mandamos a llamar a través del controlador
        if (isset($url[1])) {
          $controller->{$url[1]}();

          error_log('APP::CONSTRUCT -> Cargando el método');
        }        
      } else {        
        //Si no existe el archivo mandamos a llamar al controlador error                
        $controller = new Errors();

        error_log('APP::CONSTRUCT -> Cargando la vista error');
      }
    }

  }

?>