<?   
   include "en.php";
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<style type="text/css">
 #mce_13{float:left;}
</style>
<div class="sec" id="add_country"> 
  <form action="" method="post">      	   
   <div class="row">	    
   <label>Title:</label>
		     <select name="title">
			    <option value="mr"<?=$client["title"]=="mr"?" selected":""?>>Mr</option>
			    <option value="mrs"<?=$client["title"]=="mrs"?" selected":""?>>Mrs</option>
			    <option value="ms"<?=$client["title"]=="ms"?" selected":""?>>Ms</option>
			 </select>  	 
   <div class="clear"></div>	  
   </div>
   
      <div class="row">	    
   <label>Gender:</label>
   <select name="gender">
      <option value="male"<?=$client["gender"]=="male"?" selected":""?>>male</option>
      <option value="female"<?=$client["gender"]=="female"?" selected":""?>>female</option>
   </select>   	 
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>First Name:</label>
   <input type="text" name="first_name" value="<?=isset($client["first_name"])?$client["first_name"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Family Name:</label>
   <input type="text" name="family_name" value="<?=isset($client["family_name"])?$client["family_name"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
  
   <div class="row">	    
   <label>Post Code:</label>
   <input type="text" name="post_code" value="<?=isset($client["post_code"])?$client["post_code"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>

   <div class="row">	    
   <label>Street:</label>
   <input type="text" name="street" value="<?=isset($client["street"])?$client["street"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>   
   
   <div class="row">	    
   <label>City:</label>
   <input type="text" name="city" value="<?=isset($client["city"])?$client["city"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Country:</label>
   		    <select name="country">
			   <?foreach($codes as $k => $v):?>
                 <option value="<?=$v?>"<?=$v==$client["country"]?" selected":""?>><?=$v?></option>
			   <?endforeach;?>
			</select>
   <div class="clear"></div>
   
   <div class="row">	    
   <label>Home Phone:</label>
   <input type="text" name="home_phone" value="<?=isset($client["home_phone"])?$client["home_phone"]:""?>" size="50">
   <div class="clear"></div>
   
   <div class="row">	    
   <label>Mobile Phone:</label>
   <input type="text" name="mobile_phone" value="<?=isset($client["mobile_phone"])?$client["mobile_phone"]:""?>" size="50">
   <div class="clear"></div>
   
   <div class="row">	    
   <label>Email:</label>
   <input type="text" name="email" value="<?=isset($client["email"])?$client["email"]:""?>" size="50">
   <div class="clear"></div>	  
   </div>

   <div class="row">	    
   <label>Branch:</label>
   <select name="working_branch">
      <?foreach($all_branches as $branch):?>
              <option value="<?=$branch["bran_id"]?>"<?=$client["branch_id"]==$branch["bran_id"]?" selected":""?>> <?=$branch["bran_name"]?> </option>
	  <?endforeach;?>
   </select>   	 
   
   <div class="clear"></div>	  
   </div>
    
   <div class="row">	    
    <label>medical record no:</label>
    <input type="text" name="record_no" value="<?=isset($client["record_no"])?$client["record_no"]:""?>" size="50">   	 
    <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
    <label>Case History</label>
    <textarea name="notes" rows="17" cols="46" style="text-align:left;"><?=isset($client["notes"])?$client["notes"]:""?></textarea>   	 
    <div class="clear"></div>	  
   </div>
   
   <div class="row">	       
   <input type="hidden" value="1" name="client">          
   <input type="submit" value="Update Client Information">		   	  
   </div>  
   </form>
 </div>