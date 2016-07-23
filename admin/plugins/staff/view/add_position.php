<?$action_list=array(  "addPostion" => "Add Position",  "managePosition" => "Manage Position",);plugin_sub_header("staff",$action_list); ?><?      if(isset($errors) && !empty($errors)){       show_errors($errors);   	}   	if(isset($success) && !empty($success)){ 	show_success($success);   	}   ?>
<div class="sec" id="add_country">   
<form action="" method="post">      	      
<div class="row">	       
<label>Position Name:</label>		     
<input type="text" name="position_name" value="<?=isset($position["position_name"])?$position["position_name"]:""?>" size="50">		   
 <div class="clear"></div>	 
 </div>
 <div class="row">	          
 <input type="hidden" value="1" name="position">             
 <input type="submit" value="<?=$model=="add"?"Add Position":"Update Position"?>">		      
 <input type="reset" value="reset">	    
 </div>     
 </form> 
 </div>