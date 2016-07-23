<?
   if(!function_exists("get_plugins")){
     function get_plugins($current_plugin){
	     //global $current_plugin;
         $header_str="";
		 $file=fopen(PLUGIN_ROOT."plugins.txt","r");
		 $header_str.="<ul class='item_wrapper'>"; 
		 while(!feof($file)){
		   $plugin_str=fgets($file);
		   $plugin_array=explode("=",$plugin_str);
		   $mid=$plugin_array[1];
	       if($mid==1){ 
		     $plugin_name=str_replace(array("[","]"),array("",""),$plugin_array[0]); 
		     /*check if the plugin already exsists*/
			  if(is_dir(PLUGIN_ROOT.$plugin_name)){
			     $exsit_plugin=true;
			  }else{
			     $exsit_plugin=false;
			  }
			 /*end check*/
			 $header_str.="<li>"; 
			 if($exsit_plugin){
	            /*include secition php*/		 
			       include(PLUGIN_ROOT."$plugin_name/sections.php");
			       if($current_plugin==$plugin_name){
			         $plugin_link="<a href='".SITE_URL."Plugin/$plugin_name' class='active'>".strtoupper($section[$plugin_name]["nav_title"])."</a>";
				   }else{
				     $plugin_link="<a href='".SITE_URL."Plugin/$plugin_name'>".strtoupper($section[$plugin_name]["nav_title"])."</a>";
				   }
				   $header_str.=$plugin_link; 
		        }
			$header_str.="</li>"; 
			}
		   }
          $header_str.="</ul>"; 		   
		  $header_str.='<div class="clear"></div>';
		  echo $header_str;		 
		  fclose($file);
      }
   }
   
   if(!function_exists("plugins_url")){
      function plugins_url($path){
         return THEME_URL."plugins/".$path;  
      }
   }
   
      if(!function_exists("change_date_formate")){
      function change_date_formate($date){
         $da_arr=explode("/",$date);
		 $new_da=$da_arr[2]."-".$da_arr[1]."-".$da_arr[0];
         return $new_da;
	  }
   }
   
   if(!function_exists("load_plugin_source")){
      function load_plugin_source($path){
         echo plugins_url($path);  
      }
   }
   
   
   if(!function_exists("plugins_action_url")){
      function plugins_action_url($path){
         return SITE_URL."Plugin/".$path;  
      }
   }
   
  if(!function_exists("plugin_sub_header")){
      function plugin_sub_header($plugin,$action_list){
	     $content='<div class="tab">   
         <ul class="section_menu">'; 
         foreach($action_list as $k => $v){		 
            $content.='<li><a href="'.plugins_action_url($plugin."/".$k).'">'.$v.'</a></li>'; 
		  }   
          $content.='</ul>   
         <div class="clear"></div>
          </div>'; 
	     echo $content;
      }
   }
   
   if(!function_exists("plugins_action_url")){
      function plugins_action_url($path){
         return SITE_URL."Plugin/".$path;  
      }
   }
   
   if(!function_exists("option_time")){
      function option_time($select_item){
	     $opt_str="";
		 $opt_str.="<option value='0'>off</option>";
         for($i=10;$i<=21;$i++){
		   if($select_item==$i){
		    $opt_str.="<option value='$i' selected>$i:00</option>";
		   }else{
            $opt_str.="<option value='$i'>$i:00</option>";
		   }
		 }
         echo $opt_str;		 
      }
   }
   
      if(!function_exists("formate_month")){
      function formate_month($month){
	     $current_month=$month<10?"0".$month:$month;
		 return $current_month;
      }
   }
   
/* 
 * days_in_month($month, $year) 
 * Returns the number of days in a given month and year, taking into account leap years. 
 * 
 * $month: numeric month (integers 1-12) 
 * $year: numeric year (any integer) 
 * 
 * Prec: $month is an integer between 1 and 12, inclusive, and $year is an integer. 
 * Post: none 
 */ 
// corrected by ben at sparkyb dot net 
   if(!function_exists("days_in_month")){
    function days_in_month($month, $year) 
    { 
     // calculate number of days in a month 
     return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
    } 
   }

?>