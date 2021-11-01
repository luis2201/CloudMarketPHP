<?php

  require_once 'dao/usuarioDAO.php';
  require_once 'dao/rolDAO.php';
  require_once 'dao/usuariorolDAO.php';

  class UsuarioModel extends Model {

    public $idusuario;
    public $nombres;
    public $usuario;
    public $contrasena;
    public $idrol;
    public $foto;
    public $estado;

    public function __construct() {
      parent::__construct();
    }
    
    public function rolesAll() {
      try {
        $query = $this->query('CALL sp_rol_selectAll()');

        $items = [];
        while ($row = $query->fetch()) {
          $item = new RolDAO();
          $item->idrol  = $row['idrol'];
          $item->rol    = $row['rol'];                    

          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::ROLESALL => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function selectId($idusuario){
      $item = new UsuarioDAO();
      try{
          $query = $this->prepare('CALL sp_usuario_selectId(:idusuario)');
          $query->execute([
            'idusuario' => $idusuario
          ]);

          while($row = $query->fetch()){
            $item->idusuario  = $row['idusuario'];
            $item->nombres    = $row['nombres'];
            $item->usuario    = $row['usuario'];
            $item->idrol      = $row['idrol'];            
          }
          
          return $item;
      }catch(PDOException $th){
        error_log('USUARIOMODEL::SELECTID => ¡Error! ' . $th->getMessage());
        return null;
      }
    } 

    public function selectAll() {
      try {
        $query = $this->query('CALL sp_usuario_selectAll()');

        $items = [];
        while($row = $query->fetch()){
          $item = new UsuarioRolDAO();
          $item->idusuario  = $row['idusuario'];
          $item->nombres    = $row['nombres'];
          $item->usuario    = $row['usuario'];
          $item->rol        = $row['rol'];
          $item->estado     = $row['estado'];

          array_push($items, $item);
      }
      return $items;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::SELECTALL => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function existsUsuario($usuario) {
      try {
        $query = $this->prepare('CALL sp_usuario_exists(:usuario)');
        $query->execute([
          'usuario'     => $usuario
        ]);
      
        return $query->rowCount();
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::EXISTSUSUARIO => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function existsUsuarioID($usuario, $idusuario) {
      try {
        $query = $this->prepare('CALL sp_usuarioID_exists(:usuario, :idusuario)');
        $query->execute([
          'usuario'     => $usuario,
          'idusuario'   => $idusuario
        ]);
      
        return $query->rowCount();
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::EXISTSUSUARIOID => ¡Error! ' . $th->getMessage());
        return null;
      }
    }

    public function insert($params) {      
      try {
        $query = $this->prepare('CALL sp_usuario_insert(:nombres, :usuario, :contrasena, :idrol)');
        $query->execute([
          'nombres'     => $params['nombres'],
          'usuario'     => $params['usuario'],
          'contrasena'  => $params['contrasena'],
          'idrol'       => $params['idrol']          
        ]);

        error_log('USUARIOMODEL::INSERT => Registro insertado en la BD');
        return true;
      } catch (PDOException $th) {
        error_log('USUARIOMODEL::INSERT => ¡Error! ' . $th->getMessage());
        return false;
      }
    }
    
    public function update($params) {
      try{
        $query = $this->prepare('CALL sp_usuario_update(:idusuario, :nombres, :usuario, :idrol)');
        $query->execute([
          'idusuario'   => $params['idusuario'],
          'nombres'     => $params['nombres'],
          'usuario'     => $params['usuario'],
          'idrol'       => $params['idrol']          
        ]);

        return true;
      }catch(PDOException $e){
          return false;
      }
    }

    public function delete($params) {
      try{
        $query = $this->prepare('CALL sp_usuario_delete(:idusuario)');
        $query->execute([
          'idusuario'   => $params['idusuario']          
        ]);

        return true;
      }catch(PDOException $e){
          return false;
      }
    }

  }

?>