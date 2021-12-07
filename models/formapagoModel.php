<?php

  require_once 'dao/formapagoDAO.php';

  class FormapagoModel extends Model {

    public function __construct() {
      parent::__construct();
    }

    public function selectAll() {
      try {
        $query = $this->query('CALL sp_formapago_selectAll()');

        $items = [];
        while($row = $query->fetch()){
          $item = new FormapagoDAO();
          $item->idformapago  = $row['idformapago'];
          $item->formapago    = $row['formapago'];
          $item->estado       = $row['estado'];

          array_push($items, $item);
      }
      return $items;
      } catch (PDOException $th) {
        error_log('FORMAPAGO::SELECTALL => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function existsFormaPago($formapago) {
      try {
        $query = $this->prepare('CALL sp_formapago_exists(:formapago)');
        $query->execute([
          'formapago'     =>$formapago
        ]);
      
        return $query->rowCount();
      } catch (PDOException $th) {
        error_log('FORMAPAGO::EXISTSFORMAPAGO => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function insert($params) {      
      try {
        $query = $this->prepare('CALL sp_formapago_insert(:formapago)');
        $query->execute([
          'formapago'     => $params['formapago']          
        ]);

        error_log('FORMAPAGOMODEL::INSERT => Registro insertado en la BD');
        return true;
      } catch (PDOException $th) {
        error_log('FORMAPAGOMODEL::INSERT => ¡Error! ' . $th->getMessage());
        return false;
      }
    }

    public function view($idformapago){
      $item = new FormapagoDAO();
      try{
          $query = $this->prepare('CALL sp_formapago_view(:idformapago)');
          $query->execute([
            'idformapago' => $idformapago
          ]);

          while($row = $query->fetch()){
            $item->idformapago  = $row['idformapago']; 
            $item->formapago    = $row['formapago']; 
            $item->estado       = $row['estado'];         
          }
          
          return $item;
      }catch(PDOException $th){
        error_log('FORMAPAGOMODEL::SELECTID => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function existsFormapagoID($formapago, $idformapago) {
      try {
        $query = $this->prepare('CALL sp_formapagoID_exists(:formapago, :idformapago)');
        $query->execute([
          'formapago'     => $formapago,
          'idformapago'   => $idformapago
        ]);
      
        return $query->rowCount();
      } catch (PDOException $th) {
        error_log('FORMAPAGOMODEL::EXISTSFORMAPAGOID => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function update($params) {
      try{
        $query = $this->prepare('CALL sp_formapago_update(:idformapago, :formapago)');
        $query->execute([
          'idformapago'   => $params['idformapago'],
          'formapago'     => $params['formapago']        
        ]);

        return true;
      }catch(PDOException $e){
          return false;
      }
    }

    public function delete($params) {
      try{
        $query = $this->prepare('CALL sp_formapago_delete(:idformapago)');
        $query->execute([
          'idformapago'   => $params['idformapago']          
        ]);

        return true;
      }catch(PDOException $e){
          return false;
      }
    }

    public function change($params) {
      try{
        $query = $this->prepare('CALL sp_formapago_change(:idformapago)');
        $query->execute([
          'idformapago'   => $params['idformapago']          
        ]);

        return true;
      }catch(PDOException $e){
          return false;
      }
    }

  }

?>