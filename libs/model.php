<?php

   
  class Model {

    function __construct() {      
      $this->db = new Database();
      error_log("LIBS::MODEL -> Carga del modelo base");
    }
    
  }

?>