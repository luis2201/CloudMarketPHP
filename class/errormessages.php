<?php

  class ErrorMessages {

    //ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "0093b1c8b43c45fbbd2a36a7c246ef3d";

    private $errorList = [];

    public function __construct() {
      $this->errorList = [
        ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'La categoría ya existe, ingrese otra'
      ]; 
    }

    public function get($hash) {
      return $this->errorList[$hash];
    }

    public function existsKey($key) {
      if (array_key_exists($key, $this->errorList)) {
        return true;
      } else {
        return false;
      }
    }

  }

?>