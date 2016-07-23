<?   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<form method="post" action="">
<?
  if($model=="edit"){
     $disable=" disabled";
  }else{
     $disable="";
  }

?>
<div class="row">
   <label>Name</label>
   <input type="text" name="admin"<?=$disable?> value="<?=isset($admin["admin"])?$admin["admin"]:""?>">
   <div class="clear"></div>
</div>
<div class="row">
   <label>password</label>
   <input type="password" name="password">
   <div class="clear"></div>
</div>
<div class="row">
   <label>confirm password</label>
   <input type="password" name="cfpassword">
   <div class="clear"></div>
</div>
<div class="row">
   <label>email</label>
   <input type="text" name="email" value="<?=isset($admin["email"])?$admin["email"]:""?>"<?=$disable?>>
   <div class="clear"></div>
</div>
<div class="row">
  <input type="hidden" name="add_admin" value="1">
  <input type="submit" value="Add Admin">&nbsp;&nbsp;
  <input type="reset" value="Reset">
</div>
</form>