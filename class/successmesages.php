<?php

  class SuccessMessages {

    //ERROR_CONTROLLER_METHOD_ACTION
    const PRUEBA = "0093b1c8b43c45fbbd2a36a7c246ef3d";

    private $successList = [];

    public function __construct() {
      $this->successList = [
        successMessages::PRUEBA => 'Mensaje de exito';
      ]; 
    }

    public function get($hash) {
      return $this->successList[$hash];
    }

    public function existsKey($key) {
      if (array_key_exists($key, $this->successList)) {
        return true;
      } else {
        return false;
      }
    }
    
  }

?>