<?
 if(isset($_REQUEST["theme"]) && !empty($_REQUEST["theme"])){
    $_SESSION["theme"]=$_REQUEST["theme"];
 }

 if(isset($_SESSION["theme"]) && !empty($_SESSION["theme"])){
   define("THEME", $_SESSION["theme"]);
  }else{
   define("THEME", "new2");
  }
  
  define("DEFAULT_LANG","en");
?>