<?php

  class Connection {
    
    function __construct() {
      $this->db = new QueryManager("root", "", "cloudmarket");
      //$this->db = new QueryManager("cloudmarket", "cloudmarket", "cloudmarket");
    }

  }
  

?>