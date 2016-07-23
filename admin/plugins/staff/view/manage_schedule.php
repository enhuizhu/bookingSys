<?
$action_list=array(
  "addTimetable" => "Add New Schedule",
  "manageTimetable" => "Modify Schedule",
);
plugin_sub_header("staff",$action_list); 
?>
<div class="sec">
<table class="common">
<tr>
  <th>Strat Date</th>
  <th>End Date</th>
  <th>Branch</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>
<?foreach($all_schedules as $se):?>
<tr>
  <td><?=$se["start"]?></td>
  <td><?=$se["end"]?></td>
  <td><?=$branches[$se["branch_id"]]["bran_name"]?></td>
  <td><a href="<?=plugins_action_url("staff/modify_schedule/?schedule_id=".$se["schedule_id"])?>">EDIT</a></td>
  <td><a href="<?=plugins_action_url("staff/deleteRecord/?tb=branch_schedule&in=schedule_id&iv=".$se["schedule_id"])?>">DELETE</a></td>
</tr>
<?endforeach;?>
</table>
</div>