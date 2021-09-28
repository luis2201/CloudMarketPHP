<?php

  class Views {

    public function Render($controllers, $view, $datos, $valida, $list) {
      $array = explode('Controller', get_class($controllers)); //Extrayendo el nombre del controlador para luego asociarlo a un Model}
      $controller = $array[0];
      require VIEWS.LAYERS."head.php";
      require VIEWS.LAYERS."nav.php";
      require VIEWS.$controller.'/'.$view.'.php';
      require VIEWS.LAYERS."footer.php";
    }

  }

?>