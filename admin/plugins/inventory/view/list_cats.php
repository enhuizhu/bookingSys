<?
if(!empty($errors)) 
{
show_error($errors);
}
if(!empty($success)) show_success($success); 
?>
<script language="javascript">
function del_cat(id){
  window.location.href="<?=THEME_URL."index.php/Plugin/inventory/manage_Turboshop?del="?>"+id;
}
function edit(id){
  window.location.href="<?=THEME_URL."index.php/Plugin/inventory/add_Turboshop?edit="?>"+id; 
}
function view_cat(id){
  window.location.href="<?=THEME_URL."index.php/Plugin/inventory/getproducts?cat="?>"+id;
}
</script>
<table class="common">
<tr>
<th>ID</th>
<th>Category Name</th>
<th>Parent Category</th>
<th>Category Image</th>
<th>edit</th>
<th>delete</th>
<th>View Products</th>
</tr>
<?for($i=0;$i<count($cats);$i++){?>
<tr>
<td><?=$cats[$i]["id"]?></td>
<td><?=$cats[$i]["cat_name"]?></td>
<td><?=$cats[$i]["parent_cat"]?></td>
<td>
 <?if(!empty($cats[$i]["cat_image"])):?>
  <img src="<?=SITE_URL."images/shopimg/catimg/".$cats[$i]["cat_image"]?>" width="50" height="50"/>
 <?else:?>
  <img src="<?=$plugin_url."resources/css/images/no_image.png"?>" width="50" height="50"/>
 <?endif;?>
</td>
<td><a href="javascript:void(0)" onclick="edit(<?=$cats[$i]["id"]?>)">edit</a></td>
<td><a href="javascript:void(0)" onclick="del_cat(<?=$cats[$i]["id"]?>)">delete</a></td>
<td><a href="javascript:void(0)" onclick="view_cat(<?=$cats[$i]["id"]?>)">View Products</a></td>
</tr>
<?}?>
</table>
