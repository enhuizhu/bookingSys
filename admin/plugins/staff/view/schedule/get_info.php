<script language="javascript" src="<?=load_plugin_source("staff/js/schedule.js")?>"></script>
<div class="sec" id="add_country"> 
  <form action="" method="post" id="schedule_form">      	   
   <div class="row">	    
   <label style="width:546px; font-size:18px">
   <strong>
    It only can set one week shedule.if you want to set two week sechedule,
    you can add another schedule, set the start time as monday of second week, and end time as sunday of second week.
   </strong>
   </label>		  	 
   <div class="clear"></div>	  
   </div>
  <?
   /*<div class="row">	    
   <label>Please select the branch you want to set schedule:</label>		  
   <select name="branch">
      <?foreach($all_branches as $branch):?>
              <option value="<?=$branch["bran_id"]?>"> <?=$branch["bran_name"]?> </option>
	  <?endforeach;?>
   </select>   	 		 
   <div class="clear"></div>	  
   </div>
   */
   ?>
   <div class="row">	    
   <label>Please Chose The Start date(it must be monday):</label>		  
   <input type="text" name="start_date" id="start_date">		 
   <div class="clear"></div>	  
   </div>
   <div class="row">	    
   <label>Please Chose The End date(it must be sunday):</label>		  
   <input type="text" name="end_date" id="end_date">		 
   <div class="clear"></div>	  
   </div>      
   <div class="row">	       
   <input type="hidden" value="1" name="schedule">          
   <input type="submit" value="Load Schedule Form">		     
   </div>  
   </form>
 </div>