<?php

class Controllers extends Validaciones {

    public function __construct() {
      Session::star();
      $this->view = new Views();
      $this->rol = new Roles();
      $this->usuario = new Usuarios();
      $this->loadClassmodels();
    }

    public function loadClassmodels() {
      $array = explode('Controller', get_class($this)); //Estrayendo el nombre del controlador para luego asociarlo a un Model
      $model = $array[0].'_model';
      $path = 'Models/'.$model.'.php';
      if (file_exists($path)) {
        require $path;
        $this->model = new $model();
      }
    }

  }

?>