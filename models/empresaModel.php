<?php

  require_once 'dao/empresaDAO.php';

  class EmpresaModel extends Model {

    public function __construct() {
      parent::__construct();
    }

    public function view(){
      $item = new EmpresaDAO();
      try{
          $query = $this->prepare('CALL sp_empresa_view()');
          $query->execute();

          while($row = $query->fetch()){
            $item->rucempresa         = $row['rucempresa'];
            $item->logo               = $row['logo'];
            $item->razonsocial        = $row['razonsocial'];
            $item->actividadeconomica = $row['actividadeconomica'];  
            $item->ciudad             = $row['ciudad']; 
            $item->direccion          = $row['direccion'];
            $item->telefono           = $row['telefono'];
            $item->email              = $row['email']; 
          }
          
          return $item;
      }catch(PDOException $th){
        error_log('USUARIOMODEL::SELECTID => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

  }

?>