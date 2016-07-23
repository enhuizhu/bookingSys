<script language="javascript">
    var services=new Array();
    <?foreach($services as $ser):?>
	 services[<?=$ser["ser_id"]?>]="<?=$ser["description"]?>"
	<?endforeach?>
</script>

<script language="javascript" src="<?=$theme->themePath("js/appointment.js")?>"> </script>
<h3 class="page_title">WELCOME TO GINSEN ............. <?=$brach?> .... ONLINE BOOKING SYSTEM</h3>
<div class="section">
   <div class="section_info">
   <table class="branh_table short">
	    <tr>
		  <td rowspan="2"><span class="st">CLINIC OPENING TIMES: </span></td>
		  <td>
		     Monday to Saturday: 10.00 am -8:00 pm
		  </td>
		 </tr>
		 <tr>
		   <td>Sunday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.00 am -9.00 pm</td>
		 </tr>
     </table>
	 <?if(isset($errors) && !empty($errors)):?>
	    <?foreach($errors as $k=>$error):?>
		 <?
		 //var_dump($errors);
		 if($k=="no_avilable_staff_on_date"){
		   $message='We regret that '.$error.' ,please re-book. If not please telephone 02075867348 to make another appointment.';
		 }else if($k=="avilable_staff_no_skill"){
		   $message='We regret that '.$error.' ,please re-book. If not please telephone 02075867348 to make another appointment.';
		 }else if($k=="some_body_already_book"){
		   $message='We regret that '.$error.' ,please re-book. If not please telephone 02075867348 to make another appointment.';
		 }else if($k=="schedule_empty"){
		   $message='We regret that '.$error.' ,please re-book. If not please telephone 02075867348 to make another appointment.';
		 }
		 echo "<p><br>".$message."</p>";
		 break;
		?>
		<?endforeach;?>
	 <?elseif(isset($success) && !empty($success)):?>
	     <p>
		 <br>
		 <?=$success?>
		 </p>
	 <?else:?>
	 <p>
	   <br>
	   To make an appointment, please select date, time, type of service (appointment with Practitioner or Masseur) and time of appointment.
	 </p>
	 <form action="" method="post" id="booking_form">
	  <table class="branh_table short2 tab_left">
	    <tr>
		  <td><span class="st">Select Date:</span></td>
		  <td>
		    <input type="text" name="booking_date" id="booking_date">
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Select Service:</span></td>
		  <td>
		     <select name="service">
			    <option value="0">Please select your service.</option>
			    <?foreach($services as $ser):?>
				 <option value="<?=$ser["ser_id"]?>">
				 <?=$ser["ser_name"]?>
				 </option>
			    <?endforeach;?>
			</select>
		  </td>
		</tr>
	     <tr>
		  <td><span class="st">Select Time:  </span></td>
		  <td>
		     <select name="app_time">
 <option value="0">Please select your time.</option>
 <?for($i=10;$i<=19;$i++):?>
  <option value="<?=$i?>"><?=$i.":00"?>-<?=($i+1).":00"?></option>
 <?endfor;?>
  </select>
		  </td>
		</tr>
	    <tr>
		  <td colspan="2" class="cen">
		     <input type="hidden" name="appointment" value="1">
		     <input type="hidden" name="branch_id" value="<?=$branch_id?>">
		     <input type="submit" value="NEXT">
		  </td>
		</tr>
     </table>
	 <div id="service_description">
	 </div>
	 <div class="clear"></div>
	 </form>
	<?endif;?>
   </div>
</div>