<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas default     */
  /* *************************************************** */  

  class UsuarioController extends Controller {

    function __construct() {
      parent::__construct(); 
      $this->view->mensaje = "";      
    }
    
    function render() {
      $result = $this->model->selectAll();
      $this->view->usuarios = $result;
      $this->view->render('usuario/index');
    }
    
    function new() { 
      $result = $this->model->rolesAll();

      $this->view->roles = $result;
      $this->view->render('usuario/new');
    }

    function register() {      
      $nombres    = $this->limpiarCadena($_POST['nombres']);
      $usuario    = $this->limpiarCadena($_POST['usuario']);
      $contrasena = $this->encryption($usuario);
      $idrol      = $this->limpiarCadena($_POST['idrol']);      

      $idrol      = $this->decryption($idrol);

      if($this->model->existsUsuario($usuario) == 0) {                     

        $params = [
          'nombres'     => $nombres,
          'usuario'     => $usuario,
          'contrasena'  => $contrasena,
          'idrol'       => $idrol          
        ];  

        if($this->model->insert($params)) {
          $mensaje = $this->successMessage('Usuario registrado satisfactoriamente');
        } else {
          $mensaje = $this->errorMessage('Ocurrió un error al intentar guardar el registro');
        }        

      } else {
        $mensaje = $this->errorMessage('El usuario ya existe. Ingrese otro');  
      }
  
      $result = $this->model->rolesAll();
      $this->view->roles = $result;

      echo $mensaje;
    }

    function view($idusuario = null) { 
      $idusuario = $this->limpiarCadena($idusuario[0]);
      $idusuario = $this->limpiarCadena($idusuario);

      $idusuario = $this->decryption($idusuario);
      
      $result = $this->model->view($idusuario);
    
      $this->view->usuario = $result;
      $this->view->render('usuario/view');
    }

    function edit($idusuario = null) { 
      $idusuario = $this->limpiarCadena($idusuario[0]);
      $idusuario = $this->limpiarCadena($idusuario);

      $idusuario = $this->decryption($idusuario);
      
      $result = $this->model->view($idusuario);
      
      session_start();
      $_SESSION['idusuario'] = $this->encryption($result->idusuario);
    
      $this->view->roles = $this->model->rolesAll();
      $this->view->usuario = $result;
      $this->view->render('usuario/edit');
    }

    function update() {
      session_start();
      
      $idusuario  = $_SESSION['idusuario'];
      $nombres    = $this->limpiarCadena($_POST['nombres']);
      $usuario    = $this->limpiarCadena($_POST['usuario']);
      $idrol      = $this->limpiarCadena($_POST['idrol']);      

      $idusuario  = $this->decryption($idusuario);
      $idrol      = $this->decryption($idrol);

      unset($_SESSION['idusuario']);

      if($this->model->existsUsuarioID($usuario, $idusuario) == 0) {                     

        $params = [
          'idusuario'   => $idusuario,
          'nombres'     => $nombres,
          'usuario'     => $usuario,          
          'idrol'       => $idrol          
        ];

        if($this->model->update($params)) {
          $mensaje = $this->successMessage('Datos del usuario actualizados satisfactoriamente');            
        } else {
          $mensaje = $this->errorMessage('Ocurrió un error al intentar actualizar el registro');            
        }
        
      } else {
        $mensaje = $this->errorMessage('El usuario ya existe. Ingrese otro');        
      }

      $result = new UsuarioDAO();
      $result->idusuario = $idusuario;
      $result->nombres = $nombres;
      $result->usuario = $usuario;
      $result->idrol = $idrol;      

      $this->view->usuario = $result;    
      $this->view->roles = $this->model->rolesAll();      
      //$this->view->render('usuario/edit');
    
      echo $mensaje;
    }

    function delete($idusuario = null) {            
      $idusuario      = $this->limpiarCadena($idusuario[0]);      

      $idusuario      = $this->decryption($idusuario);

      $params = [
        'idusuario'   => $idusuario                 
      ];             
      
      if($this->model->delete($params)) {
        $mensaje = $this->successMessage('Usuario eliminado satisfactoriamente');
      } else {
        $mensaje = $this->errorMessage('Ocurrió un error al intentar eliminar el registro');
      }
      
      echo $mensaje;  
    }

    function change($idusuario = null) {            
      $idusuario      = $this->limpiarCadena($idusuario[0]);      

      $idusuario      = $this->decryption($idusuario);

      $params = [
        'idusuario'   => $idusuario                 
      ];             
      
      if($this->model->change($params)) {
        $mensaje = $this->successMessage('El estado del usuario fue actualizado satisfactoriamente');
      } else {
        $mensaje = $this->errorMessage('Ocurrió un error al intentar actualizar el registro');
      }
      
      echo $mensaje;  
    }

    
  }
