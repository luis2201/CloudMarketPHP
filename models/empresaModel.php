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
        error_log('EMPRESAMODEL::VIEW => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function insert($params) {      
      try {
        $query = $this->prepare('CALL sp_empresa_insert(:rucempresa, :logo, :razonsocial, :actividadeconomica, :ciudad, :direccion, :telefono, :email)');
        $query->execute([
          'rucempresa'        => $params['rucempresa'],
          'logo'              => $params['logo'],
          'razonsocial'       => $params['razonsocial'],
          'actividadeconomica'=> $params['actividadeconomica'],
          'ciudad'            => $params['ciudad'],
          'direccion'         => $params['direccion'],
          'telefono'          => $params['telefono'],
          'email'             => $params['email'],          
        ]);

        error_log('USUARIOMODEL::INSERT => Registro insertado en la BD');
        return true;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::INSERT => ¡Error! ' . $th->getMessage());
        return false;
      }
    }

  }

?>