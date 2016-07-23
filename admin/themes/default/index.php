<!doctype HTML>
<html>
 <head>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Ginsin	Content Management System</title>
	<link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/main.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/css3.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/jquery-ui-1.10.1.custom.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/style.css")?>"/>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?=$theme->themePath("js/jquery-ui-1.10.1.custom.js")?>"></script>
	<script src="<?=$theme->themePath("tinymce/tinymce.min.js")?>"></script>
	<script src="<?=$theme->themePath("js/script.js")?>"></script>
	<script src="<?=$theme->themePath("js/helper.js")?>"></script>
    <script language="javascript">
	  tinymce.init({
        selector: "textarea",
		width:500,
		height:300
      });
	  jQuery(document).ready(function(){
	     jQuery(".gray").focus(function(){
		    jQuery(this).val("");
		 });
		 
		 jQuery(".gray").blur(function(){
		    /*get the original value*/
			var ori_val=jQuery(this).attr("data-open");
			jQuery(this).val(ori_val);
		 });
		 
		 jQuery(".gray").change(function(){
		     var current_val=jQuery(this).val();
			 var ori_val=jQuery(this).attr("data-open");
			 if(/\D/.test(current_val)){
		        alert("please input digit");
                jQuery(this).val(ori_val);				
			 }else{
			    jQuery(this).attr("data-open",current_val);
			 }
		  })
	  });
    </script>
 </head>
 <body>
  <div class="container">
    <table class="page_wrapper">
     <tr class="fix_height">
  	  <td colspan="2">
	   <?include "layout/header.php"?>
       </td>
	 </tr>
	 <tr>
	 <td width="20%">
	 <?include "layout/sidebar.php"?>
     </td>
	 <td width="80%">
	  <div class="maincontent">
	    <?include "layout/main.php"?>
       </div>
	 </td>
	 </tr>
	 <tr>
	 <td colspan="2" class="v_b">
	   <?include "layout/footer.php"?>
     </td>
	 </tr>
	 </table>
  </div>
 </body>
 </html>