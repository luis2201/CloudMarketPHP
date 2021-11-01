<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas default     */
  /* *************************************************** */  

  class DatosuarioController extends Controller {

    function __construct() {
      parent::__construct(); 
      $this->view->mensaje = "";
      //$this->view->usuarios = [];    
    }
    
    function render() {
      $result = $this->model->selectAll();

      $this->view->usuarios = $result;
      $this->view->render('usuario/index');
    }
    
    function new() {   
      $this->view->render('usuario/new');
    }

    function register() {      
      $nombres    = $this->limpiarCadena($_POST['nombres']);
      $usuario    = $this->limpiarCadena($_POST['usuario']);
      $contrasena = $this->encryption($usuario);
      $idrol      = $this->limpiarCadena($_POST['idrol']);
      $foto       = 'user-default.png';

      if($this->model->existsUsuario($usuario) == 0) {     

        if($_FILES['foto']['name'] != ''){
         $foto = $this->uploadImage();
        }                 

        if ($foto != '') {           

          $params = [
            'nombres'     => $nombres,
            'usuario'     => $usuario,
            'contrasena'  => $contrasena,
            'idrol'       => $idrol,
            'foto'        => $foto
          ];  

          if($this->model->insert($params)) {
            $this->view->mensaje = $this->successMessage('Usuario registrado satisfactoriamente');            
          } else {
            $this->view->mensaje = $this->errorMessage('Ocurrió un error al intentar guardar el registro');            
          }

        } else {
          $this->view->mensaje = $this->errorMessage('Ocurrió un error al intentar subir la imagen. Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo');          
        }

      } else {
        $this->view->mensaje = $this->errorMessage('El usuario ya existe. Ingrese otro');        
      }
      
      $this->view->render('usuario/new');
    }

    function view($idusuario = null) { 
      $idusuario = $this->limpiarCadena($idusuario[0]);
      $idusuario = $idusuario;
      
      $result = $this->model->selectId($idusuario);

      session_start();
      $_SESSION['idusuario'] = $this->encryption($result->idusuario);
    
      $this->view->usuario = $result;
      $this->view->render('usuario/edit');
    }

    function update() {
      session_start();
      
      $idusuario  = $this->decryption($_SESSION['idusuario']);
      $nombres    = $this->limpiarCadena($_POST['nombres']);
      $usuario    = $this->limpiarCadena($_POST['usuario']);
      $idrol      = $this->limpiarCadena($_POST['idrol']);
      $foto       = 'user-default.png';

      unset($_SESSION['idusuario']);

      $result = new UsuarioDAO();
      $result->idusuario = $idusuario;
      $result->nombres = $nombres;
      $result->usuario = $usuario;
      $result->idrol = $idrol;
      $result->foto = $foto;

      $this->view->usuario = $result;
      $this->view->mensaje = $this->successMessage('Usuario actualizado satisfactoriamente'); 
      $this->view->render('usuario/edit');
    }

    
  }
