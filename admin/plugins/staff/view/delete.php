<?   
   if(isset($errors) && !empty($errors)){   
    show_errors($errors);   
	}   
	if(isset($success) && !empty($success)){ 
	show_success($success);   
	}   
?>
<br>
<a href="<?=$_SERVER["HTTP_REFERER"]?>">Click here to go back</a>
