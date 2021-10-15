<?php

  require_once 'controllers/errores.php';

  class App {
        
    function __construct() {
      //Validación de la url y asignado un valor
      $url = isset($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);
      
      //Si no existe ningún parámetro enviado por url redirija a login
      if (empty($url[0])) {
        error_log("APP::construct -> no hay controlador especificado")        ;
        $fileController = 'controllers/login.php';

        require_once $fileController;
        
        $controller = new Login();
        $controller->loadModel('login');
        $controller->render();

        return false;
      }
      //Si url contiene parámetros validamos que exista el controlador 
      $fileController = 'controllers/' . $url[0] . '.php';
      
      if (file_exists($fileController)) {
        require_once $fileController;
        
        $controller = new $url[0];
        $controller->loadModel($url[0]);

        //comprobamos si existe un parámetro para validar un método o establecemos uno por defecto
        if (isset($url[1])) {
          //comprobamos que el método llamado exista dentro de la clase
          if (method_exists($controller, $url[1])) {
            //comprobamos si existen más parámetros en la url
            if (isset($url[2])) {
              $nparam = count($url) - 2;
              $params = [];

              for ($i=0; $i < $nparam; $i++) { 
                array_push($params, $url[$i]+2);
              }

              $controller->{$url[1]}($params);
            } else {
              //si no hay más parámetros llamamos al método tal cual
              $controller->{$url[1]}();
            }            
          } else {
            //el método no existe
            $controller = new Errores();
            $controller->render();
          }                    
        } else {
          //carga del método por defecto
          $controller->render();
        }        
      } else {
        //no existe el archivo
        $controller = new Errores();
        $controller->render();
      }
      
    }

  }

?>