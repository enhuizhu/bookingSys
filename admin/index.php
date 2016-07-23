<?php
error_reporting(0);
ini_set('display_errors', '0');
if(isset($_GET["debug"])){
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
}

include(dirname(__FILE__)."/configs/paths.php");
include(dirname(__FILE__)."/configs/database.php");
include(dirname(__FILE__)."/configs/site.php");

session_start();
if(isset($_REQUEST["theme"]) && !empty($_REQUEST["theme"])){
    $_SESSION["theme"]=$_REQUEST["theme"];
}

if(isset($_SESSION["theme"]) && !empty($_SESSION["theme"])){
  define("THEME", $_SESSION["theme"]);
 }else{
  define("THEME", "default");
 }

function __autoload($class) {
   //echo "$class<br>";
   if(file_exists(DOC_ROOT.'lib/' . $class . '.class.php')){
		require_once DOC_ROOT.'lib/' . $class . '.class.php';
		//echo DOC_ROOT.'lib/' . $class . '.class.php<br>';
   }else{
       //echo DOC_ROOT.'lib/' . $class . '.class.php<br>';
   }
   
   if(file_exists(DOC_ROOT.'core/' . $class . '.class.php')){
	    require_once DOC_ROOT.'core/' . $class . '.class.php';
		//echo DOC_ROOT.'core/' . $class . '.class.php<br>';
   }else{
       //echo DOC_ROOT.'core/' . $class . '.class.php<br>';
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
ob_end_flush(); //store the contents
//ob_end_clean();
//echo $output;

?>