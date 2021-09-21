<?php

use function PHPSTORM_META\type;

class Controllers {

    public function __construct() {
      $this->view = new Views();
      $this->loadClassmodels();
    }

    public function loadClassmodels() {
      $class = get_class($this);
      $array = explode('Controller', $class); //Estrayendo el nombre del controlador para luego asociarlo a un Model
      $model = $array[0].'_model';
      $path = 'Models/'.$model.'.php';
      if (file_exists($path)) {
        require $path;
        $this->model = new $model();
      }
    }

  }

?>