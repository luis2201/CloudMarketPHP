<?php

  //* ************************************************** */
  //* Archivo de rutas de la aplicación                  */
  //* ************************************************** */
  require_once 'controllers/errorController.php';

  class Routes {

    function __construct() {
      
      $url = isset($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      if(empty($url[0])){
        $fileController = 'controllers/homeController.php';
        
        require $fileController;
        $controller = new HomeController();
        $controller->loadModel('home');
        $controller->render();
        return false;
      }else{
          $fileController = 'controllers/' . $url[0] . 'Controller.php';
      }
      
      $nameController = ucfirst($url[0]).'Controller';      

      if (file_exists($fileController)) {
        require_once $fileController;      
        $controller = new $nameController();
        $controller->loadModel($url[0]);
        // Se obtienen el número de param
        $nparam = sizeof($url);
        // si se llama a un método
        if($nparam > 1){
            // hay parámetros
            if($nparam > 2){
                $param = [];
                for($i = 2; $i < $nparam; $i++){
                  array_push($param, $url[$i]);
                }                 
                $controller->{$url[1]}($param);
            }else{
                // solo se llama al método
                $controller->{$url[1]}();
            }            
        }else{
            // si se llama a un controlador
            $controller->render(); 
        }
      } else {
        $controller = new ErrorController();
        $controller->render();
      }


    }


  }

?>