<?php

  /* ********************************************************* */
  /* Controlador para la carga de las vistas Forma de Pago     */
  /* ********************************************************* */  

  class FormapagoController extends Controller {

    function __construct() {
      parent::__construct(); 
      $this->view->mensaje = "";      
    }
    
    function render() {
      $result = $this->model->selectAll();
      $this->view->formapagos = $result;
      $this->view->render('formapago/index');
    }

    function new() { 
      $this->view->render('formapago/new');
    }

    function register() {      
      $formapago    = $this->limpiarCadena($_POST['formapago']);

      if($this->model->existsFormaPago($formapago) == 0) {                     

        $params = [
          'formapago'     => $formapago        
        ];  

        if($this->model->insert($params)) {
          $mensaje = $this->successMessage('Forma de Pago registrada satisfactoriamente');
        } else {
          $mensaje = $this->errorMessage('Ocurrió un error al intentar guardar el registro');
        }        

      } else {
        $mensaje = $this->errorMessage('La Forma de Pago ya existe. Ingrese otro');  
      }

      echo $mensaje;
    }

    function view($idformapago = null) { 
      $idformapago = $this->limpiarCadena($idformapago[0]);
      $idformapago = $this->limpiarCadena($idformapago);

      $idformapago = $this->decryption($idformapago);
      
      $result = $this->model->view($idformapago);
    
      $this->view->formapago = $result;
      $this->view->render('formapago/view');
    }

    function edit($idformapago = null) { 
      $idformapago = $this->limpiarCadena($idformapago[0]);

      $idformapago = $this->decryption($idformapago);
      
      $result = $this->model->view($idformapago);

      session_start();
      $_SESSION['idformapago'] = $this->encryption($result->idformapago);
    
      $this->view->formapago = $result;
      $this->view->render('formapago/edit');
    }

    function update() {
      session_start();
      
      $idformapago  = $_SESSION['idformapago'];
      $formapago    = $this->limpiarCadena($_POST['formapago']);     

      $idformapago  = $this->decryption($idformapago);

      unset($_SESSION['idformapago']);

      if($this->model->existsFormapagoID($formapago, $idformapago) == 0) {                     

        $params = [
          'idformapago'   => $idformapago,
          'formapago'     => $formapago       
        ];

        if($this->model->update($params)) {
          $mensaje = $this->successMessage('Datos de la Forma de Pago actualizados satisfactoriamente');            
        } else {
          $mensaje = $this->errorMessage('Ocurrió un error al intentar actualizar el registro');            
        }
      
      } else {
        $mensaje = $this->errorMessage('La Forma de Pago ya existe. Ingrese otro');        
      }

      $result = new FormapagoDAO();
      $result->idformapago = $idformapago;
      $result->formapago = $formapago;
 
      $this->view->formapago = $result;
    
      echo $mensaje;
    }

    function delete($idformapago = null) {            
      $idformapago      = $this->limpiarCadena($idformapago[0]);      

      $idformapago      = $this->decryption($idformapago);

      $params = [
        'idformapago'   => $idformapago                 
      ];             
      
      if($this->model->delete($params)) {
        $mensaje = $this->successMessage('Forma de pago eliminada satisfactoriamente');
      } else {
        $mensaje = $this->errorMessage('Ocurrió un error al intentar eliminar el registro');
      }
      
      echo $mensaje;  
    }

    function change($idformapago = null) {            
      $idformapago      = $this->limpiarCadena($idformapago[0]);      

      $idformapago      = $this->decryption($idformapago);

      $params = [
        'idformapago'   => $idformapago                 
      ];             
      
      if($this->model->change($params)) {
        $mensaje = $this->successMessage('El estado de la forma de pago fue actualizado satisfactoriamente');
      } else {
        $mensaje = $this->errorMessage('Ocurrió un error al intentar actualizar el registro');
      }
      
      echo $mensaje;  
    }
  
  }
    
?>