<?
if(!function_exists('site_url')) {
   function site_url($path=""){
       return SITE_URL.$path;
   }
}

if(!function_exists('redirect')) {
   function redirect($path=""){
       if (!headers_sent()) {
	   header("Location:".SITE_URL.$path);
	   }else{
	      echo '
		     <script>
			    location.href="'.SITE_URL.$path.'";
			 </script>
		  ';
	   }
   }
}

if(!function_exists('plugin_redirect')) {
   function plugin_redirect($path=""){
      if (!headers_sent()) {
       header("Location:".SITE_URL."Plugin/".$path);
	  }else{
	    echo '
		     <script>
			    location.href="'.SITE_URL."Plugin/".$path.'";
			 </script>
		  ';
	  }
   }
}


?>