<?php

  class View {

    function __construct() {
      
    }

    function render($view, $data = []) {
      $this->d = $data;

      $this->handleMessages();

      require 'views/layers/head.php';
      //require 'views/layers/nav.php';
      require 'views/' . $view . '.php';
      require 'views/layers/footer.php';
    }

    private function handleMessages() {
      if (isset($_GET['success']) && isset($_GET['error'])) {
        
      } elseif (isset($_GET['success'])) {
        $this->handleSuccess();
      } elseif (isset($_GET['error'])) {
        $this->handleError();
      }
    }

    public function handleError() {
      $hash = $_GET['error'];
      $error = new ErrorMessages();

      if ($error->existsKey(($hash))) {
        $this->d['error'] = $error->get($hash);
      }
    }

    public function handleSuccess() {
      $hash = $_GET['success'];
      $success = new SuccessMessages();

      if ($success->existsKey(($hash))) {
        $this->d['success'] = $success->get($hash);
      }
    }

    public function showMessagess() {
      $this->showErrors();
      $this->showSuccess();
    }

    public function showErrors() {
      if (array_key_exists('error', $this->d)) {
        echo '<script>
                $.alert({ 
                  title   : "Ocurrió un error", 
                  icon    : "fas fa-exclamation-circle",
                  content : "' . $this->d['error'] . '",
                  type    : "orange",
                  theme   : "supervan",                            
              });
              </script>';
      }
    }

    public function showSuccess() {
      if (array_key_exists('success', $this->d)) {
        echo '<script>
                $.alert({ 
                  title   : "Operaci&oacute;n satisfactoria", 
                  icon    : "fas fa-check-circle",
                  content : "' . $this->d['success'] . '",
                  type    : "blue",
                  theme   : "supervan",                            
              });
              </script>';
      }
    }

  }
  
?>