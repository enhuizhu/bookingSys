<?   if(!function_exists("show_errors")){      function show_errors($errors){     ?>       	 <ul class="error">	    		<?  	   foreach($errors as $k=>$v):     ?>             <li><?=$v?></li>    <?    endforeach;   ?>     </ul>   <?   }   }       if(!function_exists("show_success")){	   function show_success($success){	      echo "<div class='success'>$success</div>";	   	   }	 }      ?>