<?php
ob_start();

define('DIR','http://localhost/Io-framework/');
define('DOCROOT', dirname(__FILE__));

define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','database name');
define('DB_USER','username');
define('DB_PASS','password');

function __autoload($class) {

   $filename = DOCROOT . "/core/" . strtolower($class) . ".php";
   if(file_exists($filename)){
      require $filename;
   }

   $filename = DOCROOT . "/helpers/" . strtolower($class) . ".php";
   if(file_exists($filename)){
      require $filename;
   } 
 
}
set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

$app = new Bootstrap();
$app->setController('welcome');
$app->setTemplate('default');
$app->init();

ob_flush();

?>
