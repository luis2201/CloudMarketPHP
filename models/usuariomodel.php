<?php

  class UsuarioModel extends Model implements InterfaceModel {

    private $idusuario;
    private $nombres;
    private $usuario;
    private $contrasena;
    private $rol;
    private $foto;
    private $estado;

    public function __construct() {
      parent::__construct();
      $this->nombres = '';
      $this->usuario = '';
      $this->contrasena = '';
      $this->rol = '';
      $this->foto = '';
      $this->estado = '';
    }
    
    public function save() {
      try {
        $query = $this->prepare('INSERT INTO usuarios(nombres, usuario, contrasena, rol, foto) VALUES(:nombres, :usuario, :contrasena, :rol, :foto);');
        $query->execute([
          'nombres'     => $this->nombres,
          'usuario'     => $this->usuario,
          'contrasena'  => $this->contrasena,
          'rol'         => $this->rol,
          'foto'        => $this->foto
        ]);

        return true;
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
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
        $this->setRol($result['rol']);
        $this->setFoto($result['foto']);
        $this->setEstado($result['estado']);
        
        return $this;
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
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
          $item->setRol($result['rol']);
          $item->setFoto($result['foto']);
          $item->setEstado($result['estado']);

          array_push($items, $item);
        }

        return $items;
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
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
        error_log('¡Error! ' . $th);
        return false;
      }
    }

    public function update() {
      try {
        $query = $this->prepare('UPDATE usuarios SET nombres = :nombres, usuario = :usuario, rol = :rol, foto = :foto WHERE idusuario = :idusuario');
        $query->execute([
          "idusuario"   => $this->idusuario,
          "nombres"     => $this->nombres,
          "usuario"     => $this->usuario,
          "rol"       => $this->rol,
          "foto"        => $this->foto          
        ]);        
        
        return true;
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
        return false;
      }
    }

    public function from($array) {
      $this->idusuario  = $array['idusuario'];
      $this->nombres    = $array['nombres'];
      $this->usuario    = $array['usuario'];
      $this->contrasena = $array['contrasena'];
      $this->rol        = $array['rol'];
      $this->foto       = $array['foto'];
      $this->estado     = $array['estado'];
    }

    public function exists($usuario) {
      try {
        $query = $this->prepare("SELECT usuario FROM usuarios WHERE usuario = :usuario");
        $query->execute([
          "usuario"     => $usuario
        ]);
        if ($query->rowCount() > 0) {
          return true;
        } else {
          return false;
        }
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
        return false;
      }
    }

    public function compareContrasena($contrasena, $idusuario) {
      try {
        $result = $this->get($idusuario);

        return password_verify($contrasena, $result->getContrasena());
      } catch (PDOException $th) {
        error_log('¡Error! ' . $th);
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

    public function setRol($rol) {
      $this->rol = $rol;
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

    public function getRol() {
      return $this->rol;
    }

    public function getFoto() {
      return $this->foto;
    }

    public function getEstado() {
      return $this->estado;
    }

  }

?>