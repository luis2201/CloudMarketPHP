<?php

  declare (strict_types = 1);

  class Validaciones {

    public function Usuario(array $array) {
      return new class($array) {
        public $nombres;
        public $usuario;
        public $contrasena;
        public $idrol;
        public $foto;

        function __construct($array) {
          if (count($array) > 0) {
            $this->nombres = $array[0];
            $this->usuario = $array[1];
            //$this->contrasena = $array[2];
            $this->idrol = $array[3];
            //$this->foto = $array[4];
          }
        }
      };
    }

  }

?>