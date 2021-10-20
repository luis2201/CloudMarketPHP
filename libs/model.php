<?php

   
  class Model {

    function __construct() {      
      $this->db = new Database();
      error_log("LIBS::MODEL -> Carga del modelo base");
    }

    function query($query) {
      return $this->db->connect()->query($query);
    }

    function prepare($query) {
      return $this->db->connect()->prepare($query);
    }

  }

?>