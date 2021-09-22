<?php

  class QueryManager {
    
    public $pdo;

    function __construct($USER, $PASS, $DB) {
      try {
        $this->pdo = new PDO('mysql:host=localhost;dbaname='.$DB.';charset=utf8', $USER, $PASS, [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
      } catch (\Throwable $th) {
        print "¡Error!: " . $th->getMessage();
        die();
      }
    }

    public function SelectOne($attr, $tabla, $where, $param) {
      try {
        $where = $where ?? "";
        $sql = "SELECT ".$attr." FROM " .$tabla.$where;
        $sth = $this->pdo->prepare($sql);
        $sth->execute($param);
        $resp = $sth->fetchAll(PDO::FETCH_ASSOC);

        return array("results" => $resp);
      } catch (\Throwable $th) {
        return $th->getMessage();
      }

      $pdo = null;
    }

  }
  

?>