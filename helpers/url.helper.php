<?
if(!function_exists('site_url')) {
   function site_url($path=""){
       return SITE_URL.$path;
   }
}

if(!function_exists('redirect')) {
   function redirect($path=""){
       if(preg_match("/http|https/i",$path)){
	      $url=$path;
	   }else{
	      $url=SITE_URL.$path;
	   }
	   
	   if (!headers_sent()) {
	   header("Location:".$url);
	   }else{
	      echo '
		     <script>
			    location.href="'.$url.'";
			 </script>
		  ';
	   }
   }
}

if(!function_exists('curPageURL')) {
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
}

?>