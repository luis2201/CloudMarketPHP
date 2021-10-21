<?php

  class ErrorMessages {

    //ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_SIGNUP_NEWUSER = "18aa0f85e8569aa1025bb07a2b31f9da";
    const ERROR_SIGNUP_NEWUSER_EMPTY = "bf8346dca11e70be4eb718a74530ad81";
    const ERROR_SIGNUP_NEWUSER_EXIST = "9d9c2294c5d29c750c39653d97b4969f";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "bf8346dca11e70be4eb718a74530ad81";
    const ERROR_LOGIN_AUTHENTICATE_DATA = "33f3d9b05a3776239e990c7788fa84cd";
    const ERROR_LOGIN_AUTHENTICATE = "4713c8d14870798aa28165b1c4156245";

    private $errorList = [];

    public function __construct() {
      $this->errorList = [
        ErrorMessages::ERROR_SIGNUP_NEWUSER => 'Error al intentar procesar la solicitud',
        ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY => 'Ingrese usuario y contraseña',
        ErrorMessages::ERROR_SIGNUP_NEWUSER_EXIST => 'El usuario ya existe, ingrese otro',
        ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY => 'Ingrese usuario y contraseña',
        ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => 'Usuario y/o contrase&ntilde;a incorrectos',
        ErrorMessages::ERROR_LOGIN_AUTHENTICATE => 'Error al procesar la solicitud. Ingrese usuario y contrase&ntilde;a'
      ]; 
    }

    //Devuelve el texto del mensaje descifrado
    public function get($hash) {
      return $this->errorList[$hash];
    }

    //Comprobando si existe la clave del arreglo
    public function existsKey($key) {
      if (array_key_exists($key, $this->errorList)) {
        return true;
      } else {
        return false;
      }
    }

  }

?>