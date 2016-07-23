<?
$action_list=array(
  "addTimetable" => "Add New Schedule",
  "manageTimetable" => "Modify Schedule",
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

<link rel="stylesheet" type="text/css" href="<?=load_plugin_source("staff/css/schedule.css")?>"/>
 <?if(isset($errors) && !empty($errors)):?>
   <script language="javascript">
   <!--
     jQuery(document).ready(function(){
	    <?foreach($errors as $k =>$v):?>
	     jQuery("#<?=$k?>").addClass("s_error");
	  <?endforeach;?>
	 });
   //-->
   </script>   
 <?endif;?>   
<div class="sec">
<form action="" method="post" id="schedule_table">
<table class="common schedule">
<tr>
  <th colspan="8" class="pad">
  <?//var_dump($branch)?>
     <?=$branch[0]["bran_name"]?> Schedule from <?=$schedule["start"]?> to <?=$schedule["end"]?>
  </th>
</tr>
<tr>
<td class="ce">Staff</td>
<?
  /*get start date*/
  $start_date_arr=explode("-",$schedule["start"]);
  $month=$start_date_arr[1];
  $date=$start_date_arr[2];
  $year=$start_date_arr[0];
  //var_dump($start_date_arr);
  $day_week_arr=array(
   0 =>"Monday",
   1 =>"Tuesday",
   2 =>"Wednesday",
   3 =>"Thursday",
   4 =>"Friday",
   5 =>"Saterday",
   6 =>"Sunday");
  // var_dump($day_week_arr);
  
  for($i=0;$i<7;$i++){
     $current_mk_time=mktime(0,0,0,$month,$date+$i,$year);
     $current_date=date("d/m/Y",$current_mk_time);
	 $titles=$current_date."<br>".$day_week_arr[$i];
?>
   <td class="ce"><?=$titles?></td>
<?
  }
?>
</tr>
<?foreach($staff_ses as $staff_se):?>
  	  <?
	     $staff_json_obj=json_decode($staff_se["staff_schedule_val"],false);  
	     //var_dump($staff_json_obj);
	  ?>
<tr>
   <td data="<?=json_encode($staffs[$staff_se["staff_id"]])?>">
      <?=$staffs[$staff_se["staff_id"]]["first_name"]."&nbsp".$staffs[$staff_se["staff_id"]]["family_name"]?>
   </td>
   <?for($i=0;$i<7;$i++):?>
      <td id="<?=$staff_se["staff_id"]."_".$i?>">
	  <?
	     $current_obj=json_decode(str_replace("'","\"",$staff_json_obj[$i]));
	     //$current_obj=json_decode('{"start":"10"}');
		 //var_dump($current_obj);
		 $start_select=$current_obj->start;
		 $end_select=$current_obj->finish;
	     //echo $start_select."<br>";
		 //echo $end_select."<br>";*/
	  ?>
	  Start:<select name="staff_schedule_start<?=$staff_se["staff_id"]?>[]"><?option_time($start_select)?></select><br>
	  Finsish:<select name="staff_schedule_finish<?=$staff_se["staff_id"]?>[]"><?option_time($end_select)?></select>
	  </td>
   <?endfor;?>
</tr>
<?endforeach;?>
<tr>
 <td colspan="8" class="ce pad">
   <input type="hidden" name="schedule_table" value=1>
   <input type="hidden" name="branch_id" value="<?=$branch["bran_id"]?>">
   <input type="hidden" name="model" value="edit">
   <input type="submit" value="update Schedule">
 </td>
</tr>
</table>
</form>
</div>
