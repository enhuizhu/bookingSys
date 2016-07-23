<?
$action_list=array(
  "addStaff" => "Add Staff",
  "index" => "Manage Staff Information",
);
plugin_sub_header("staff",$action_list); 
?>

<?
   foreach($allstaffs_with_key as $key =>$allstaffs):
?>
 <div class="sec" id="all_countries">
    <table class="common">
	   <tr>
	     <th colspan="9" align="center" class="noborder">
		     <h3 align="center"><?=ucwords($all_positions[$key]["position_name"])?></h3>
		 </th>
	   </tr>
	   <tr>
	      <th>Staff Id</th>
	      <th>Staff Name</th>
		  <th>Skills</th>
		  <th>Working Branch</th>
		  <th>Email</th>
		  <th>Telephone</th>
		  <th>Position</th>
		  <th>Edit</th>
		  <th>DELETE</th>
	   </tr>
	   <?foreach($allstaffs as $staff):?>
		<tr>
		  <td><?=$staff["staff_id"]?></td>
		  <td><?=$staff["first_name"]?>&nbsp;<?=$staff["family_name"]?></td>
		  <td>
		    <?
			  $skills=explode(",",$staff["skills"]);
			  //var_dump($skills);
			  //var_dump($all_services);
			  foreach($skills as $skill){
			     echo  $all_services[$skill]["ser_name"].",&nbsp;";
			  }
			?>
		  
		  </td>
		  <td>
		  
		  <?
		   $branches=explode(",",$staff["working_branch"]);
		   foreach($branches as $branch){
			     echo  $all_branches[$branch]["bran_name"].",&nbsp;";
			  }
		 ?>
		  
		  
		  </td>
		  <td><?=$staff["email"]?></td>
		  <td><?=$staff["telephone"]?></td>
		  <td><?=$all_positions[$staff["position"]]["position_name"]?></td>
		  <td>
		    <a href="<?=plugins_action_url("staff/addStaff/?staff_id=".$staff["staff_id"])?>">EDIT</a>
		  </td>
		  <td>
		    <a href="<?=plugins_action_url("staff/deleteRecord/?tb=staff&in=staff_id&iv=".$staff["staff_id"])?>">DELETE</a>
		  </td>
		</tr>
	   <?endforeach;?>
	</table>
 </div>
 <?endforeach;?>