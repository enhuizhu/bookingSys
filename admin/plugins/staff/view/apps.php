<link rel="stylesheet" type="text/css" href="<?load_plugin_source("staff/css/calendar.css")?>"/>
<script language="javascript">
<!--
   var action_url="<?=plugins_action_url("staff/")?>";
//-->
</script>
<script language="javascript" src="<?load_plugin_source("staff/js/calendar.js")?>"></script>
<script language="javascript" src="<?load_plugin_source("staff/js/helper.js")?>"></script>
    <div id="calendar">
	</div>
	<div class="tip">
	<span class="square"></span>&nbsp;Means it has appointments.
    </div>

 <div id="cal_container">
	<?
	  $app_with_key=array();
	  foreach($apps as $app){
       $date_time_arr=explode(" ",$app["app_datetime"]);
	   $date_arr=explode("-",$date_time_arr[0]);
	   $day_of_month=$date_arr[2];
	   if(!isset($app_with_key[$day_of_month])){
	     $app_with_key[$day_of_month]=array();
	   }
	   array_push($app_with_key[$day_of_month],$app);
      }
	?>
   	<?
	 $first_record=true;
	 foreach($app_with_key as $k => $v):
	?>
	  <?
	    if($first_record){
		  $extra_class=" active";
		  $first_record=false;
		}else{
		  $extra_class=""; 
		}
	  
	  ?> 
	   <table class="cal_detail<?=$extra_class?>" data-day="<?=$k?>">
       <tr>
	      <th colspan="2"><?=$k."/".formate_month($month)."/".$year?></th>
	   </tr>
	   <?
	    $time_has_app=array();
	    foreach($v as $subv){
	        $date_time_arr=explode(" ",$subv["app_datetime"]);
			$time_arr=explode(":",$date_time_arr[1]);
			$hour=$date_time_arr[1];
			if(!isset($time_has_app[$hour])){
			   $time_has_app[$hour]=array();
			}
			$current_des="<span class='client' date-client-id='".$subv["user_id"]."'>".$subv["first_name"]." ".$subv["family_name"]."&nbsp;(".$subv["record_no"].")&nbsp;</span> want to have ".$subv["ser_name"]." in <span>".$subv["bran_name"]." </span>";
			array_push($time_has_app[$hour],$current_des);
	    }
	   ?>
	   <?for($i=10;$i<=21;$i++):?>
	     <tr>
		   <td><?=$i.":00"?>-<?=$i.":30"?></td>
		   <td>
		     <?
			   if(isset($time_has_app[$i.":00:00"])){
			     foreach($time_has_app[$i.":00:00"] as $event){
				    echo $event."<br>";
				 }
			   }
			 ?>
		   </td>
		 </tr>
		  <tr>
		   <td><?=$i.":30"?>-<?=($i+1).":00"?></td>
		   <td>
		     <?
			   if(isset($time_has_app[$i.":30:00"])){
			     foreach($time_has_app[$i.":30:00"] as $event){
				    echo $event."<br>";
				 }
			   }
			 ?>
		   </td>
		 </tr>
	   <?endfor;?>
      </table>
	 
	<?endforeach;?>
  </div>

  <div class="lay"></div>
  <div id="window">
    <div class="info"></div>
	<div class="button_container">
	  <a href="javascript:close_pop_up()" class="btn">Close Pop Up Window</a>
	</div>
  </div>
  
  <script language="javascript">
    <!--
	var acition_url="<?=plugins_action_url("staff/appointment/")?>"
	var myCalendar;
	var date_has_event=new Array();
	var app_json=new Array();
	<?foreach($apps as $app):?>
	app_json.push(<?=json_encode($app)?>);
	<?
	  $date_time_arr=explode(" ",$app["app_datetime"]);
	  $date_arr=explode("-",$date_time_arr[0]);
	  $day_of_month=$date_arr[2];
	?>
	if(jQuery.inArray(<?=$day_of_month?>,date_has_event)==-1){
	  date_has_event.push(<?=$day_of_month?>);
	}
   <?endforeach;?>
	var date_has_app = {
	   year:<?=$year?>,
	   month:<?=$month?>,
	   date:date_has_event
	};
	jQuery(document).ready(function(){
	  myCalendar= new calendar(<?=$year?>,<?=$month?>,date_has_app);
	  myCalendar.show();
	});
	//-->
  </script>