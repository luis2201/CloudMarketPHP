<?php

  class View {

    function __construct() {
      error_log("LIBS::VIEW -> Carga de la vista base");
    }

    function render($view) {            
      require 'views/layers/head.php';
      require 'views/layers/nav.php';
      require 'views/' . $view . '.php';
      require 'views/layers/footer.php';
    }

  }
  
?>