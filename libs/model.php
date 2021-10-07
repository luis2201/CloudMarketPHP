<?php

  include_once 'libs/interfacemodel.php';
  
  class Model {

    function __construct() {
      $this->db = new Database();
    }

    function query($sql) {
      return $this->db->connect()->query($sql);
    }

    function prepare($sql) {
      return $this->db->connect()->prepare($sql);
    }



  }

?>