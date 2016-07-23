<?   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<table class="common">
<tr>
   <th>Admin</th>
   <th>Email</th>
   <th>Delete</th>
   <th>Edit</th>
</tr>
<?foreach($admins as $admin):?>
 <tr>
    <td><?=$admin["admin"]?></td>
    <td><?=$admin["email"]?></td>
    <td><a href="<?=plugins_action_url("administrator/?id=".$admin["id"])?>">Delete</a></td>
	<td><a href="<?=plugins_action_url("administrator/add_admin/?id=".$admin["id"])?>">Edit</a></td>
 </tr>
<?endforeach;?>
</table>