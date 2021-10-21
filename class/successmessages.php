<?php

  class SuccessMessages {

    //ERROR_CONTROLLER_METHOD_ACTION
    const SUCCESS_SIGNUP_NEWUSER = "2db0e5c9569cde59550cd3dfd04a4138";

    private $successList = [];

    public function __construct() {
      $this->successList = [
        successMessages::SUCCESS_SIGNUP_NEWUSER => 'Usuario registrado satisfactoriamente'
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