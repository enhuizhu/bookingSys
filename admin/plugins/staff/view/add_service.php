<?$action_list=array(  "addServices" => "Add Service",  "manageServices" => "Manage Services",);plugin_sub_header("staff",$action_list); ?><?      if(isset($errors) && !empty($errors)){       show_errors($errors);   	}   	if(isset($success) && !empty($success)){ 	show_success($success);   	}   ?><div class="sec" id="add_country">   
<form action="" method="post">      	      
<div class="row">	       
<label>Service Name:</label>		     
<input type="text" name="ser_name" value="<?=isset($service["ser_name"])?$service["ser_name"]:""?>" size="50">		   
 <div class="clear"></div>	 
 </div>
<div class="row">	       
<label>Service Description:</label>		     
<textarea  name="description">
<?=isset($service["description"])?$service["description"]:""?>
</textarea>		   
 <div class="clear"></div>	 
 </div> 
 <div class="row">	          
 <input type="hidden" value="1" name="service">             
 <input type="submit" value="<?=$model=="add"?"Add Service":"Update Service"?>">		      
 <input type="reset" value="reset">	    
 </div>     
 </form> 
 </div>