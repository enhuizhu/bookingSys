<!doctype html>
<html>
   <head>
      <title>Ginsen CMS login</title>
	  <link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/main.css")?>"/>
	  <link rel="stylesheet" type="text/css" href="<?=$theme->themePath("css/login.css")?>"/>
   </head>
   <body>
       
	   <div class="login_box">
	       <form method="post" action="<?=site_url("Login/login")?>">
		   <table border="0">
		      <tr>
			    <td colspan="2" class="logo_td">
				   <img src="<?=$theme->themePath("css/images/Ginsenlogo.png")?>">
				</td>
			  </tr>
			  	 <tr>

	 </tr>
 			 
       <tr>
	      <td colspan="2">
		    <div class="main_field_wrapper">
			<table>
			 <?if(isset($errors) && !empty($errors)):?>
			     <tr>
				    <td colspan="2">
					    <?foreach($errors as $error):?>
						  <div class="error">
						      <?=$error?>
						  </div>
						<?endforeach;?>
					</td>
				 </tr>
			 <?endif;?>
			 <tr>
			    <td class="field">Username</td>
				<td class="field">
				   <input type="text" name="username">
				</td>
			  </tr>
			  <tr>
			    <td class="field">password</td>
				<td class="field">
				   <input type="password" name="pwd">
				</td>
			  </tr>
			  <tr>
			    <td colspan="2" style="padding-left: 30px;">
				    <?
					$index=0;
					foreach($countries as $country):?>
				     <input type="radio" name="languages" value="<?=$country["country_code"]?>"<?=$index==0?" checked":""?>><?=$country["country_name"]?>&nbsp;
				    <?
					 $index++;
					 endforeach;
					?>
				 </td>
			  </tr>
			  
			  </table>
			  </div>
			</td>
		</tr>

			   <tr>
			    <td colspan="2" class="field">
				   <input type="hidden" value="1" name="login">
				   <input type="submit" value="login" class="btn">
				   <input type="reset" value="reset" class="btn">
				</td>
			  </tr>
		   </table>
		   </form>
		 
	    </div>
      
   </body>
</html>