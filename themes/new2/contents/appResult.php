<h3 class="page_title">WELCOME TO GINSEN ............. <?=$_SESSION["branch"]["bran_name"]?> .... ONLINE BOOKING SYSTEM</h3>
<div class="section">
   <div class="section_info">
   <table class="branh_table short">
	    <tr>
		  <td rowspan="2"><span class="st">CLINIC OPENING TIMES: </span></td>
		  <td>
		     Monday to Saturday: 10.00 am -8:00 pm
		  </td>
		 </tr>
		 <tr>
		   <td>Sunday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.00 am -9.00 pm</td>
		 </tr>
     </table>
	 <?if(isset($errors) && !empty($errors)):?>
	    <?foreach($errors as $k=>$error):?>
		 <?

		   $message='We regret that '.$error.' ,please re-book. If not please telephone 02075867348 to make another appointment.';
		 
		 echo "<p><br>".$message."</p>";
		 break;
		?>
		<?endforeach;?>
	 <?elseif(isset($success) && !empty($success)):?>
	     <p>
		 <br>
		 <?=$success?>
		 </p>
	<?endif;?>
   </div>
</div>