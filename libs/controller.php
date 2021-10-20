<?php

  /* Controlador base del cual todos los controladores estarán heredando sus propiedades */
  class Controller {

    function __construct() {            
      $this->view = new View();
      
      error_log("LIBS::CONTROLLER -> Carga del controlador base");
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
    
  }

?>