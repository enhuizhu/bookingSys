<?
$action_list=array(
  "addbranch" => "Add Branch",
  "managebranch" => "Manage Branch",
);
plugin_sub_header("staff",$action_list); 
//var_dump($branch);
?>
<?   
function getTime($time_str,$option){
   //var_dump($time_str);
   $time_obj=json_decode($time_str,false);
   //var_dump($time_obj);
   //return false;
   if($option=="open"){
       if($time_obj->start==0){
	      return "open time";
	   }else{
	      return $time_obj->start; 
	   }
   }else{
       if($time_obj->end==0){
	      return "close time";
	   }else{
	      return $time_obj->end; 
	   }
   }
}
   
//echo getTime($branch["monday"],"open");   
   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<div class="sec" id="add_country"> 
  <form action="" method="post" id="branch_from">      	   
   <div class="row">	    
   <label>Brachch Name:</label>		  
   <input type="text" name="bran_name" value="<?=isset($branch["bran_name"])?$branch["bran_name"]:""?>" size="50">		 
   <div class="clear"></div>	  
   </div>

   <div class="row">	    
   <label class="bold">Business Hours (the value should be between 7 to 23):</label>		  
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Monday :</label>
    <input type="text" value="<?=getTime($branch["monday"],"open")?>" name="mon_start" class="gray" data-open="<?=getTime($branch["monday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["monday"],"close")?>" name="mon_end" class="gray" data-open="<?=getTime($branch["monday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Tuesday :</label>
    <input type="text" value="<?=getTime($branch["tuesday"],"open")?>" name="tue_start" class="gray" data-open="<?=getTime($branch["tuesday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["tuesday"],"close")?>" name="tue_end" class="gray" data-open="<?=getTime($branch["tuesday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Wednesday :</label>
    <input type="text" value="<?=getTime($branch["wednesday"],"open")?>" name="wed_start" class="gray" data-open="<?=getTime($branch["wednesday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["wednesday"],"close")?>" name="wed_end" class="gray" data-open="<?=getTime($branch["wednesday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Thursday :</label>
    <input type="text" value="<?=getTime($branch["thursday"],"open")?>" name="thu_start" class="gray" data-open="<?=getTime($branch["thursday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["thursday"],"close")?>" name="thu_end" class="gray" data-open="<?=getTime($branch["thursday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
  
   <div class="row">	    
   <label>Friday :</label>
    <input type="text" value="<?=getTime($branch["friday"],"open")?>" name="fri_start" class="gray" data-open="<?=getTime($branch["friday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["friday"],"close")?>" name="fri_end" class="gray" data-open="<?=getTime($branch["friday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Saterday :</label>
    <input type="text" value="<?=getTime($branch["saturday"],"open")?>" name="sat_start" class="gray" data-open="<?=getTime($branch["saturday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["saturday"],"close")?>" name="sat_end" class="gray" data-open="<?=getTime($branch["saturday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	    
   <label>Sunday :</label>
    <input type="text" value="<?=getTime($branch["sunday"],"open")?>" name="sun_start" class="gray" data-open="<?=getTime($branch["sunday"],"open")?>">&nbsp;&nbsp;&nbsp;
    <input type="text" value="<?=getTime($branch["sunday"],"close")?>" name="sun_end" class="gray" data-open="<?=getTime($branch["sunday"],"close")?>">	
   <div class="clear"></div>	  
   </div>
   
   <div class="row">	       
   <input type="hidden" value="1" name="branch">          
   <input type="submit" value="<?=$model=="add"?"Add Branch":"Update Branch"?>">		   
   <input type="reset" value="reset">	  
   </div>  
   </form>
 </div>
 
 <script language="javascript">
    /*validate the form*/
	jQuery("#branch_from").submit(function(){
	     var bran_name=jQuery("input[name=bran_name]").val();
	     var open=jQuery("input[name=mon_start]").val();   
	     var end=jQuery("input[name=mon_end]").val();
		 
		 if(bran_name==""){
		   alert("branch name can not be empty");
		   return false;
		 }
		 
		 if(compare(open,end)){
		     alert("plase input proper open time or close time for monday business hours");
             return false;			 
         }

         open=jQuery("input[name=tue_start]").val();   
	     end=jQuery("input[name=tue_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for tuesday business hours");
             return false;			 
         }
    
         open=jQuery("input[name=wed_start]").val();   
	     end=jQuery("input[name=wed_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for wednesday business hours");
             return false;			 
         }

         open=jQuery("input[name=thu_start]").val();   
	     end=jQuery("input[name=thu_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for thursday business hours");
             return false;			 
         }

         open=jQuery("input[name=fri_start]").val();   
	     end=jQuery("input[name=fri_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for friday business hours");
             return false;			 
         }

         open=jQuery("input[name=sat_start]").val();   
	     end=jQuery("input[name=sat_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for saturday business hours");
             return false;			 
         }

         open=jQuery("input[name=sun_start]").val();   
	     end=jQuery("input[name=sun_end]").val();
         if(compare(open,end)){
		     alert("plase input proper open time or close time for sunday business hours");
             return false;			 
         }

        return true;		 
		 
	});
 
    function compare(val1,val2){
	    var condition1= !/\D/.test(val1) && /\D/.test(val2);
		var condition2= /\D/.test(val1) && !/\D/.test(val2);
		if(!/\D/.test(val1) && !/\D/.test(val2)){
		    if(val2<=val1){
			   return true;
			}
			
			if(val1<7){
			    return true;
			}
			
			if(val2>23){
			    return true;
			}
		}
	    return (condition1 || condition2);
	}
 </script>