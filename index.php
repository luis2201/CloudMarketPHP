<?php

  //* ************************************************************ */
  //* Mostrando todos los errores en las páginas                   */
  //* ************************************************************ */  
  error_reporting(E_ALL); 
  ini_set('ignore_repeated_errors', TRUE); //always use TRUE
  ini_set('display_errors', FALSE);
  ini_set('log_errors', TRUE);    
  ini_set("error_log", "/var/www/html/CloudMarketPHP/logs/php-errors.log");  
  
  require_once 'libs/database.php';
  require_once 'libs/controller.php';
  require_once 'libs/model.php';
  require_once 'libs/view.php';
  require_once 'libs/app.php';
                           
  require_once 'class/errormessages.php';
  require_once 'class/successmessages.php';
  require_once 'class/sessioncontroller.php';

  require_once 'config/config.php';

  $app = new App();  

  error_log('INICIO DE EJECUCIÓN');

?>