<?
$action_list=array();
foreach($branchs as $branch){
  $action_list[$branch["bran_id"]]=$branch["bran_name"];
}
plugin_sub_header("inventory/get_branch_invetory",$action_list); 
?>
<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/turboshop.css"/>
<?if(isset($products)):?>
<?include "global_js.php"?>
<script language="javascript" src="<?=PLUG_IN?>jsscripts/invetory.js"></script>
<h3><?=$branchm["bran_name"]?></h3>
<table class="common">
<tr>
  <th>ID</th>
  <th>NAME</th>
  <th>QUNTITY</th>
  <th>BRANCH</th>
  <th>CATOGORY</th>
  <th>EDIT</th>
</tr>
<?foreach($products as $product):?>
    <tr>
	   <td><?=$product["aid"]?></td>
	   <td><?=$product["name"]?></td>
	   <td>
	     <?if(isset($product["quntity"])){
	        $quntity=$product["quntity"];
		  }else{
		    $quntity=0;
		  }
		?>
		<label id="label_<?=$product["aid"]?>" class="edit_label" data-id="<?=$product["aid"]?>"><?=$quntity?></label>
		<input type="text" value="<?=$quntity?>" id="field_<?=$product["aid"]?>" class="field" data-id="<?=$product["aid"]?>">
	   </td>
	  <td>
	     <?=$branchm["bran_name"]?>
	  </td>
	  <td>
	     <?=$product["cat_name"]?>
	  </td>
	  <td>
	     <span id="save_item_<?=$product["aid"]?>" class="btn product_edit" data-id="<?=$product["aid"]?>">Edit</span>
	  </td>
	</tr>
<?endforeach;?>
</table>
<?include "pop_up.php"?>

<?else:?>
  <div class="note"> 
   Please chose the branch to modify products quntity!
  </div>
<?endif;?>
