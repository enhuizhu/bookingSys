<?
if(!empty($errors)) 
{
//var_dump($errors);
show_error($errors);
}
?>
<?
if(!empty($success)) show_success($success); 
?>
<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/turboshop.css"/>
<?
//var_dump($cats);
?>
<form enctype="multipart/form-data" action="" method="POST">
<input type="hidden" name="cat" value="cat">
<input type="hidden" name="model" value="<?=$model?>">
<table style="width:600px;" id="product_table">
<tr>
<td>Category</td>
<td>
<select name="Category">
<?for($i=0;$i<count($cats);$i++){?>
   <?if(isset($_GET["edit"])):?>
   <option value="<?=$cats[$i]["id"]?>" <?=($cats[$i]["id"]==$pro_info["cat_id"]?"selected":"")?>><?=fullcat($cats[$i],$cats)?></option>
   <?else:?>
   <option value="<?=$cats[$i]["id"]?>" <?=($_SESSION["cat_name"]==$cats[$i]["id"]?"selected":"")?>><?=fullcat($cats[$i],$cats)?></option>
   <?endif;?>
<?}?>
</select>
</td>
</tr>
<tr>
<td>Brand:</td><td><input type="text" name="brand" value="<?=isset($pro_info)?$pro_info["brand"]:""?>"/></td>
</tr>
<tr>
<td>product name:</td><td><input type="text" name="nam" value="<?=isset($pro_info)?$pro_info["name"]:""?>"/></td>
</tr>
<tr>
<td>product info:</td><td>
<textarea name="info" cols="30" rows="15">
<?=isset($pro_info)?$pro_info["info"]:""?>
</textarea>
</td>
</tr>
<tr>
<td>product price:</td><td><input type="text" name="price" value="<?=isset($pro_info)?$pro_info["price"]:"0.00"?>"/></td>
</tr>
<tr>
<td>product cost:</td><td><input type="text" name="cost_price" value="<?=isset($pro_info)?$pro_info["cost_price"]:"0.00"?>"/></td>
</tr>
<tr>
<td>product image:</td><td><input type="file" name="file"/>
<?if(isset($pro_info)):?>
   
  <?
   // var_dump($pro_info["image"]);
  if(empty($pro_info["image"])){
     $img=$plugin_url."resources/css/images/no_image.png";
  }else{
     $img=SITE_URL."images/shopimg/proimg/".$pro_info["image"];
  }
  ?>

  <img src="<?=$img?>" width="70" height="70" id="pro_pic">
<?endif;?>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<center>
<input type="submit" value="submit"/>
</center>
</td>
</tr>
</table>
</form>