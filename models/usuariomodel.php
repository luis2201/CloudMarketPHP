<?php

  class UsuarioModel extends Model implements InterfaceModel {

    private $idusuario;
    private $nombres;
    private $usuario;
    private $contrasena;
    private $idrol;
    private $foto;
    private $estado;

    public function __construct() {
      parent::__construct();
      $this->nombres = '';
      $this->usuario = '';
      $this->contrasena = '';
      $this->idrol = '';
      $this->foto = '';
      $this->estado = false;
    }
    
    public function save() {
      try {
        $query = $this->prepare('INSERT INTO usuarios(nombres, usuario, contrasena, idrol, foto) VALUES(:nombres, :usuario, :contrasena, :idrol, :foto);');
        $query->execute([
          'nombres'     => $this->nombres,
          'usuario'     => $this->usuario,
          'contrasena'  => $this->contrasena,
          'idrol'       => $this->idrol,
          'foto'        => $this->foto
        ]);

        return true;
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
        return false;        
      }
    }
    
    public function get($idusuario){      
      try {
        $query = $this->prepare('SELECT * FROM usuarios WHERE idusuario = :idusuario');
        $query->execute([
          "idusuario"   => $idusuario
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);        
                
        $this->setIdUsuario($result['idusuario']);
        $this->setNombres($result['nombres']);
        $this->setUsuario($result['usuario']);
        $this->setContrasena($result['contrasena']);
        $this->setIdRol($result['idrol']);
        $this->setFoto($result['foto']);
        $this->setEstado($result['estado']);
        
        return $this;
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
      }
    }

    public function getAll(){
      $items = [];
      try {
        $query = $this->query('SELECT * FROM usuarios ORDER BY nombres');

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
          $item = new UsuarioModel();
          $item->setIdUsuario($result['idusuario']);
          $item->setNombres($result['nombres']);
          $item->setUsuario($result['usuario']);
          $item->setContrasena($result['contrasena']);
          $item->setIdRol($result['idrol']);
          $item->setFoto($result['foto']);
          $item->setEstado($result['estado']);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
      }
    }    

    public function delete($idusuario) {
      try {
        $query = $this->prepare('DELETE FROM usuarios WHERE idusuario = :idusuario');
        $query->execute([
          "idusuario"   => $idusuario
        ]);

        return true;
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
        return false;
      }
    }

    public function update() {
      try {
        $query = $this->prepare('UPDATE usuarios SET nombres = :nombres, usuario = :usuario, idrol = :idrol, foto = :foto WHERE idusuario = :idusuario');
        $query->execute([
          "idusuario"   => $this->idusuario,
          "nombres"     => $this->nombres,
          "usuario"     => $this->usuario,
          "idrol"       => $this->idrol,
          "foto"        => $this->foto          
        ]);        
        
        return true;
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
        return false;
      }
    }

    public function from($array) {
      $this->idusuario  = $array['idusuario'];
      $this->nombres    = $array['nombres'];
      $this->usuario    = $array['usuario'];
      $this->contrasena = $array['contrasena'];
      $this->idrol      = $array['idrol'];
      $this->foto       = $array['foto'];
      $this->estado     = $array['estado'];
    }

    public function exists($usuario) {
      try {
        $query = $this->prepare("SELECT usuario WHERE usuario = :usuario");
        $query->execute([
          "usuario"     => $usuario
        ]);
        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
        return false;
      }
    }

    public function compareContrasena($contrasena, $idusuario) {
      try {
        $result = $this->get($idusuario);

        return password_verify($contrasena, $result->getContrasena());
      } catch (PDOException $th) {
        echo '¡Error! ' . $th;
        return false;
      }
    }

    private function getHashedContrasena($contrasena) {
      return password_hash($contrasena, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function setIdUsuario($idusuario) {
      $this->idusuario = $idusuario;
    }

    public function setNombres($nombres) {
      $this->nombres = $nombres;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function setContrasena($contrasena) {
      $this->contrasena = $this->getHashedContrasena($contrasena);
    }

    public function setIdRol($idrol) {
      $this->idrol = $idrol;
    }

    public function setFoto($foto) {
      $this->foto = $foto;
    }

    public function setEstado($estado) {
      $this->estado = $estado;
    }    
    
    public function getIdUsuario() {
      return $this->idusuario;
    }

    public function getNombres() {
      return $this->nombres;
    }

    public function getUsuario() {
      return $this->usuario;
    }
    
    public function getContrasena() {
      return $this->contrasena;
    }

    public function getIdRol() {
      return $this->idrol;
    }

    public function getFoto() {
      return $this->foto;
    }

    public function getEstado() {
      return $this->estado;
    }

  }

?>