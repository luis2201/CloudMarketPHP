<?php

  declare (strict_types = 1);

  class Validaciones {

    public function Usuario(array $array) {
      return new class($array) {
        public $nombres;
        public $usuario;
        public $contrasena;
        public $rol;
        public $foto;

        function __construct($array) {
          if (count($array) > 0) {
            $this->nombres = $array[0];
            $this->usuario = $array[1];
            $this->rol = $array[2];
            $this->foto = $array[3];
          }
        }
      };
    }

  }

?>