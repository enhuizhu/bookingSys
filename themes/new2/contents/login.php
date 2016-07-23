<h3 class="page_title cen">Welcome to GinSen’s On-line Booking System</h3>
<div class="section shor">
   <div class="login_box">
     <div class="section_title cen">Existing Users Sign In Here</div>
      <?if(isset($errors) && !empty($errors)):?>
	    <ul class="error_list">
		<?foreach($errors as $k => $v):?>
		  <li><?=$k?>:<?=$v?></li>
		<?endforeach;?>
	    </ul>
	<?endif;?>
	 <form action="" method="post">
	 <table class="login_table" border="0">
	   <tr>
	      <td class="le">Email address:</td>
	      <td class="ri"><input type="text" name="email"></td>
	   </tr>
	   <tr>
	       <td colspan="2" class="cen">
		      <input type="hidden" name="login_form" value="1">
		      <input type="submit" value="LOG IN">
		    </td>
	   </tr>
	 </table>
	 </form>
   
   </div>
 </div>
 
 <div class="section shor">
   <div class="login_box">
     <div class="section_title cen">New Users Register Here</div>

	 <table class="login_table" border="0">
	   <tr>
	       <td class="le">
		    If you are a new GinSen client please register here.
If  you have already registered please login above
		    </td>
	   </tr>
	   
	   	   <tr>
	       <td class="cen">
		      <a href="<?=site_url("Register")?>" class="betterbutton">REGISTER</a>
		    </td>
	   </tr>
	 </table>

   
   </div>
 </div>