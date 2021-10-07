<?php

  class View {

    function __construct() {
      
    }

    function render($view, $data = []) {
      $this->d = $data;

      require 'views/layers/head.php';
      //require 'views/layers/nav.php';
      require 'views/' . $view . '.php';
      require 'views/layers/footer.php';
    }

  }
  
?>