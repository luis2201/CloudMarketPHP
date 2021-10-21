<?php

  class View {

    function __construct() {
      error_log("LIBS::VIEW -> Carga de la vista base");
    }

    function render($view, $data = []) {         
      $this->d = $data;

      $this->handleMessages();

      require 'views/layers/head.php';
      require 'views/layers/nav.php';
      require 'views/' . $view . '.php';
      require 'views/layers/footer.php';
    }

    private function handleMessages() {
      if (isset($_GET['success'])) {
        $this->handleSuccess();
      } elseif (isset($_GET['error'])) {
        $this->handleError();
      }
    }

    private function handleSuccess(){
      $hash = $_GET['success'];
      $success = new SuccessMessages();

      if ($success->existsKey($hash)) {
        $this->d['success'] = $success->get($hash);
      }
    }

    private function handleError() {
      $hash = $_GET['error'];
      $error = new ErrorMessages();

      if ($error->existsKey($hash)) {
        $this->d['error'] = $error->get($hash);
      }
    }

    public function showMessages() {
      $this->showSuccess();
      $this->showErrors();
    }

    public function ShowSuccess() {
      if (array_key_exists('success', $this->d)) {
        echo "<script>
                $.alert({
                  icon    : 'fas fa-thumbs-up',
                  title   : 'CloudMarket 1.0',
                  content : '". $this->d['success'] ."',
                  theme   : 'modern',
                  type    : 'blue'
                });
              </script>";
      }
    }

    public function ShowErrors() {
      if (array_key_exists('error', $this->d)) {
        echo "<script>
                $.alert({
                  title   : 'CloudMarket 1.0',
                  content : '". $this->d['error'] ."',
                  theme   : 'modern',
                  type    : 'orange'
                });
              </script>";
      }
    }

  }
  
?>