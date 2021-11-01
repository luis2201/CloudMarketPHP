<?php 

  class View {

    function __construct() {
      
    }

    function render($view) {

      require 'views/' . $view . '.php';
    }
  }

?>