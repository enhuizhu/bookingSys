<?php
error_reporting(0);
ini_set('display_errors', '0');
if(isset($_GET["debug"])){
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
}

session_start();

include(dirname(__FILE__)."/configs/path.php");
include(dirname(__FILE__)."/configs/site.php");
include(dirname(__FILE__)."/configs/database.php");


function __autoload($class) {
   if(file_exists(DOC_ROOT.'lib/' . $class . '.class.php')){
		require_once DOC_ROOT.'lib/' . $class . '.class.php';
   }elseif(file_exists(DOC_ROOT.'core/' . $class . '.class.php')){
	    require_once DOC_ROOT.'core/' . $class . '.class.php';
   }
}
//die(DOC_ROOT);
$uri=new uri();

//$uri->print_uri();
//die();

if(!empty($uri->segments)){
  $controller=ucfirst($uri->segments[0]);
  if(!file_exists(DOC_ROOT.'controllers/' . $controller . 'Controller.class.php')){
   $controller="PageNotFound";  
  }
}else{
  $controller="HomePage";
}
//die($controller);
//echo $controller;
if(file_exists(DOC_ROOT.'controllers/' . $controller . 'Controller.class.php')){
   require_once DOC_ROOT.'controllers/' . $controller . 'Controller.class.php';
   $cot=$controller."Controller";
   new $cot();
}else{
   echo "file not exsit.";
}
ob_start("ob_gzhandler");
ob_end_flush();

?>