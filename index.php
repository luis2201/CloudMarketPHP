<?php

  //* ************************************************************ */
  //* Mostrando todos los errores en las páginas                   */
  //* ************************************************************ */  
  /*error_reporting(E_ALL); 
  ini_set('ignore_repeated_errors', TRUE); //always use TRUE
  ini_set('display_errors', FALSE);
  ini_set('log_errors', TRUE);
  ini_set("error_log", "/var/www/html/CloudMarketPHP/php-error.log");
  error_log("Inicio de la aplicación web");*/

  require_once 'libs/database.php';
  require_once 'libs/controller.php';
  require_once 'libs/model.php';
  require_once 'libs/view.php';
  require_once 'libs/app.php';

  require_once 'config/config.php';

  $app = new App();  

?>