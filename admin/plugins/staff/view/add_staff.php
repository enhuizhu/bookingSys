<?
$action_list=array(
  "addStaff" => "Add Staff",
  "index" => "Manage Staff Information",
);
plugin_sub_header("staff",$action_list); 
?>

<?   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<div class="sec" id="add_country"> 
  <form action="" method="post">      	   
   <div class="row">	    
   <label>Gender:</label>
   <select name="gender">
      <option value="male"<?=$staff["gender"]=="male"?" selected":""?>>male</option>
      <option value="female"<?=$staff["gender"]=="female"?" selected":""?>>female</option>
   </select>   	 
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>First Name:</label>
   <input type="text" name="first_name" value="<?=isset($staff["first_name"])?$staff["first_name"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Family Name:</label>
   <input type="text" name="family_name" value="<?=isset($staff["family_name"])?$staff["family_name"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Email:</label>
   <input type="text" name="email" value="<?=isset($staff["email"])?$staff["email"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   <div class="row">	    
   <label>Telephone:</label>
   <input type="text" name="telephone" value="<?=isset($staff["telephone"])?$staff["telephone"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
     <label>Skills:</label>
	  <?
	     $skill_arr = explode(",",$staff["skills"]);
	  ?>
	 
      <?foreach($all_services as $service):?>
        <input type="checkbox" name="skills[]" value="<?=$service["ser_id"]?>"<?=in_array($service["ser_id"],$skill_arr)?" checked":""?>>
		&nbsp;<?=$service["ser_name"]?>&nbsp;&nbsp;
      <?endforeach;?>
    <div class="clear"></div>	  
   </div>    
   
   <div class="row">	    
   <label>Branch:</label>
      <?
	   $branc_arr = explode(",",$staff["working_branch"]);
	  ?>
      <?foreach($all_branches as $branch):?>
	          <input type="checkbox" name="branches[]" value="<?=$branch["bran_id"]?>"<?=in_array($branch["bran_id"],$branc_arr)?" checked":""?>>
		&nbsp;<?=$branch["bran_name"]?>&nbsp;&nbsp;
	  <?endforeach;?>
	 
   
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Positions:</label>
   <select name="position">
      <?foreach($all_positions as $position):?>
              <option value="<?=$position["position_id"]?>"<?=$position["position_id"]==$staff["position"]?" selected":""?>> <?=$position["position_name"]?> </option>
	  <?endforeach;?>
   </select>   	 
   
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	       
   <input type="hidden" value="1" name="staff">          
   <input type="submit" value="<?=$model=="add"?"Add New Staff":"Update Staff's Information"?>">		   
   <input type="reset" value="reset">	  
   </div>  
   </form>
 </div>