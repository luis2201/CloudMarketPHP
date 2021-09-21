<?php

  class Views {

    public function Render($controllers, $view) {
      $array = explode('Controller', $controllers); //Estrayendo el nombre del controlador para luego asociarlo a un Model}
      $controller = $array[0];
      echo $controller;
    }

  }

?>