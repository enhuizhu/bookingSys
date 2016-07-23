<?
$action_list=array(
  "addServices" => "Add Service",
  "manageServices" => "Manage Services",
);
plugin_sub_header("staff",$action_list); 
?>
 <div class="sec" id="all_countries">
    <table class="common">
	   <tr>
	      <th>Service Id</th>
	      <th>Service Name</th>
	      <th>Service Description</th>
		  <th>UPDATE</th>
		  <th>DELETE</th>
	   </tr>
	   <?foreach($all_services as $service):?>
		<tr>
		  <td><?=$service["ser_id"]?></td>
		  <td><?=$service["ser_name"]?></td>
		  <td><?=$service["description"]?></td>
		  <td>
		    <a href="<?=plugins_action_url("staff/addServices/?ser_id=".$service["ser_id"])?>">EDIT</a>
		  </td>
		  <td>
		   <a href="<?=plugins_action_url("staff/deleteRecord/?tb=services&in=ser_id&iv=".$service["ser_id"])?>">DELETE</a>
		   </td>
		</tr>
	   <?endforeach;?>
	</table>
 </div>

