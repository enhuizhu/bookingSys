<?
$action_list=array(
  "addbranch" => "Add Branch",
  "managebranch" => "Manage Branch",
);
plugin_sub_header("staff",$action_list); 
?>
 <div class="sec" id="all_countries">
    <table class="common">
	   <tr>
	      <th>Branch Id</th>
	      <th>Branch Name</th>
		  <th>UPDATE</th>
		  <th>DELETE</th>
	   </tr>
	   <?foreach($all_branches as $branch):?>
		<tr>
		  <td><?=$branch["bran_id"]?></td>
		  <td><?=$branch["bran_name"]?></td>
		  <td>
		    <a href="<?=plugins_action_url("staff/addbranch/?bran_id=".$branch["bran_id"])?>">EDIT</a>
		  </td>
		  <td>
		  <a href="<?=plugins_action_url("staff/deleteRecord/?tb=branch&in=bran_id&iv=".$branch["bran_id"])?>">DELETE</a>
		  </td>
		</tr>
	   <?endforeach;?>
	</table>
 </div>

