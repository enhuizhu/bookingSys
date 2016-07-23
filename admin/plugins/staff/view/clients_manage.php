 <div class="sec" id="all_countries">
    <table class="common">
	   <tr>
	      <th>Clinets Id</th>
	      <th>Clients Name</th>
		  <th>Address</th>
		  <th>Gender</th>
		  <th>Title</th>
		  <th>Branch</th>
		  <th>Email</th>
		  <th>Home phone</th>
		  <th>Mobile phone</th>
		  <th>Hear from</th>
		  <th>medical record no</th>
		  <th>Edit</th>
	   </tr>
	   <?foreach($all_sclients as $client):?>
		<tr>
		  <td><?=$client["user_id"]?></td>
		  <td><?=$client["first_name"]?>&nbsp;<?=$client["family_name"]?></td>
		  <td>
		    <?
                $address=$client["street"]." ".$client["city"]." ".$client["country"]." ".$client["post_code"];
			    echo $address;
			?>
		  
		  </td>
		  <td><?=$client["gender"]?></td>
		  <td><?=$client["title"]?></td>
		  <td><?=$all_branches[$client["branch_id"]]["bran_name"]?></td>
		  <td><?=$client["email"]?></td>
		  <td><?=$client["home_phone"]?></td>
		  <td><?=$client["mobile_phone"]?></td>
		  <td><?=$client["hear_from"]?></td>
		  <td><?=$client["record_no"]?></td>
		  <td>
		    <a href="<?=plugins_action_url("staff/editClient/?client_id=".$client["user_id"])?>">EDIT</a>
		  </td>
		</tr>
	   <?endforeach;?>
	</table>
 </div>