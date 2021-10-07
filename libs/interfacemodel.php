<?php

  interface InterfaceModel {

    public function save();
    
    public function get($id);

    public function getAll();

    public function delete($id);

    public function update();

    public function from($array);

  }

?>