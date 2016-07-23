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
<?foreach($all_branches as $branch):?> 
<div class="sec">
<form action="" method="post" id="schedule_table">
<table class="common schedule">
<tr>
  <th colspan="8" class="pad noborder">
     <?=$branch["bran_name"]?>
  </th>
</tr>
<tr>
  <th colspan="8" class="pad">
     Schedule from <?=$start_date?> to <?=$end_date?>
  </th>
</tr>
<tr>
<td class="ce">Staff</td>
<?
  /*get start date*/
  $start_date_arr=explode("/",$start_date);
  $month=intval($start_date_arr[1]);
  $date=intval($start_date_arr[0]);
  $year=intval($start_date_arr[2]);
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
<?foreach($allstaffs[$branch["bran_id"]] as $staff):?>
<tr>
   <td data="<?=json_encode($staff)?>">
      <?=$staff["first_name"]."&nbsp".$staff["family_name"]?>
   </td>
   <?for($i=0;$i<7;$i++):?>
      <td id="<?=$staff["staff_id"]."_".$i?>">
	  Start:<select name="staff_schedule_start<?=$staff["staff_id"]?>[]"><?option_time($_POST["staff_schedule_start".$staff["staff_id"]][$i])?></select><br>
	  Finsish:<select name="staff_schedule_finish<?=$staff["staff_id"]?>[]"><?option_time($_POST["staff_schedule_finish".$staff["staff_id"]][$i])?></select>
	  </td>
   <?endfor;?>
</tr>
<?endforeach;?>
<tr>
 <td colspan="8" class="ce pad">
   <input type="hidden" name="schedule_table" value=1>
   <input type="hidden" name="branch_id" value="<?=$branch["bran_id"]?>">
   <input type="submit" value="Generate Schedule">
 </td>
</tr>
</table>
</form>
</div>
<?endforeach;?>
