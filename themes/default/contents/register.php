<?if(isset($success) && $success==true):?>
  <div class="section">
      <p>
	  <strong>Thank you for registering with GinSen.   Your on-line registration has been successful.

Your login details are below.</strong>
      </p>
	  
	  <p>
	    Login: &nbsp;&nbsp;<strong><?=$auth->userinfo["email"]?></strong>
	  </p>
	  
	  <p>
	    If more than one person wishes to have a consultation (for example, a family member of a friend), please telephone 0207 586 7348 as a longer consultation may be required)
	  </p>
	  
	  <p class="cen">
	      <a href="<?=site_url('Booking/?brach_id='.$auth->userinfo["branch_id"])?>" class="betterbutton">NEXT</a>
	  </p>
	  
  </div>
<?else:?>
<?
/**
* include contry list
**/
 include "en.php";
?>
<!-- include validation script //-->
<script language="javascript" src="<?=$theme->themePath("js/validation.js")?>"></script>


<h3 class="page_title">Welcome to GinSen’s On-line Booking System .   To register, please complete this form and click <strong>Submit</strong>.</h3>
<div class="section">
   <div class="section_info">
    <?if(isset($errors) && !empty($errors)):?>
	    <ul class="error_list">
		<?foreach($errors as $k => $v):?>
		  <li><?=$k?>:<?=$v?></li>
		<?endforeach;?>
	    </ul>
	<?endif;?>
    <form action="" method="post" id="register_form">
	 <table class="branh_table short2">
	   <tr><th colspan="2" class="cen">
	     <? 
		   today_date();
		 ?>
	   </th></tr>
	    <tr>
		  <td><span class="st">Title:</span></td>
		  <td class="ri">
		     <select name="title">
			    <option value="mr">Mr</option>
			    <option value="mrs">Mrs</option>
			    <option value="ms">Ms</option>
			 </select>
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">First Name (s):</span></td>
		  <td class="ri">
            <input type="text" name="first_name">
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Family Name:</span></td>
		  <td class="ri">
            <input type="text" name="family_name">
		  </td>
		</tr>
		 <tr>
		  <td><span class="st">Postcode:</span></td>
		  <td class="ri">
            <input type="text" name="postcode">
		  </td>
		</tr>
	   <tr>
		  <td><span class="st">Street :</span></td>
		  <td class="ri">
            <input type="text" name="street">
		  </td>
		</tr>
	   	   <tr>
		  <td><span class="st">Town/City:</span></td>
		  <td class="ri">
            <input type="text" name="city">
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Country:</span></td>
		  <td class="ri">
		    <select name="country">
			   <?foreach($codes as $k => $v):?>
                 <option value="<?=$v?>"<?=$k=="GB"?" selected":""?>><?=$v?></option>
			   <?endforeach;?>
			</select>
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Gender:</span></td>
		  <td class="ri">
		    <select name="gender">
               <option value="male">Male</option>
               <option value="female">Female</option>
			</select>
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Home Phone:</span></td>
		  <td class="ri">
		      <input type="text" name="home_phone">
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">Mobile Phone:</span></td>
		  <td class="ri">
		      <input type="text" name="mobile_phone">
		  </td>
		</tr>
	  	 <tr>
		  <td><span class="st">Email Address:</span></td>
		  <td class="ri">
		      <input type="text" name="email">
		  </td>
		</tr>
	  	 <tr>
		  <td><span class="st">Confirm Email Address:</span></td>
		  <td class="ri">
		      <input type="text" name="con_email">
		  </td>
		</tr>
		
		<tr>
		  <td><span class="st">Which clinic would you like to attend?</span></td>
		  <td class="ri">
		      <select name="branch">
			   <?foreach($branches as $branch):?>
               <option value="<?=$branch["bran_id"]?>"><?=$branch["bran_name"]?></option>
			  <?endforeach;?>
			</select>
		  </td>
		</tr>
	    <tr>
		  <td><span class="st">How did you hear of GinSen?</span></td>
		  <td class="ri">
		      <select name="hear_from">
               <option value="walk-in">Walk-in</option>
               <option value="internet">Internet</option>
               <option value="newspaper">Newspaper</option>
               <option value="other">Other</option>
			</select>
		  </td>
		</tr>
     
	     <tr>
		  <td colspan="2" class="cen">
		     <input type="hidden" name="register" value="1">
		     <input type="submit" value="submit">
		  </td>
		</tr>
	 
	 </table>
   </form>	 
   </div>
</div>
<?endif;?>