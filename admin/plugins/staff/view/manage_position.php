<?$action_list=array(  "addPostion" => "Add Position",  "managePosition" => "Manage Position",);plugin_sub_header("staff",$action_list); ?><?      if(isset($errors) && !empty($errors)){       show_errors($errors);   	}   	if(isset($success) && !empty($success)){ 	show_success($success);   	}   ?>
 <div class="sec" id="all_countries">
    <table class="common">
	   <tr>
	      <th>Position Id</th>
	      <th>Position Name</th>
		  <th>UPDATE</th>
		  <th>DELETE</th>
	   </tr>
	   <?foreach($all_positions as $position):?>
		<tr>
		  <td><?=$position["position_id"]?></td>
		  <td><?=$position["position_name"]?></td>
		  <td>
		    <a href="<?=plugins_action_url("staff/addPostion/? 	position_id=".$position["position_id"])?>">EDIT</a>
		  </td>
		  <td>
		   <a href="<?=plugins_action_url("staff/deleteRecord/?tb=staff_positions&in=position_id&iv=".$position["position_id"])?>">DELETE</a>
		   </td>
		</tr>
	   <?endforeach;?>
	</table>
 </div>

