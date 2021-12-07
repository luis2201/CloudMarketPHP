<?php

  /* *************************************************** */
  /* Controlador para la carga de las vistas Empresa     */
  /* *************************************************** */
  class EmpresaController extends Controller {

    function __construct() {
      parent::__construct();      
    }

    function render() {
      $result = $this->model->view();
    
      $this->view->empresa = $result;
      $this->view->render('empresa/index');      
    }

    function register() {      
      $rucempresa         = $this->limpiarCadena($_POST['rucempresa']);
      $logo               = 'empresa-default.png';
      $razonsocial        = $this->limpiarCadena($_POST['razonsocial']);
      $actividadeconomica = $this->limpiarCadena($_POST['actividadeconomica']);
      $ciudad             = $this->limpiarCadena($_POST['ciudad']);
      $direccion          = $this->limpiarCadena($_POST['direccion']);
      $telefono           = $this->limpiarCadena($_POST['telefono']);
      $email              = $this->limpiarCadena($_POST['email']);
      
      if($_FILES['foto']['name'] != ''){
        $logo = $this->uploadImage();
      }                 

      if ($logo != '') {    
        $params = [
          'rucempresa'         => $rucempresa,
          'logo'               => $logo,
          'razonsocial'        => $razonsocial,
          'actividadeconomica' => $actividadeconomica,
          'ciudad'             => $ciudad,
          'direccion'          => $direccion,
          'telefono'           => $telefono,
          'email'              => $email
        ];  

        if($this->model->insert($params)) {
          $mensaje = $this->successMessage('Empresa registrada satisfactoriamente');
        } else {
          $mensaje = $this->errorMessage('Ocurrió un error al intentar guardar el registro');
        }        

      } else {
        $this->view->mensaje = $this->errorMessage('Ocurrió un error al intentar subir la imagen. Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo');
      }

      $result = $this->model->view();
      $this->view->empresa = $result;

      echo $mensaje;
    }

  }

?>