
<h3 class="page_title">BOOKINGS</h3>
<div class="section">
   <div class="section_title">On-Line Bookings</div>
   <div class="section_info">
     <p><br>It is possible to book on-line 24 hours a day, 7 days a week, 365 days a year.   When you have made a booking you will automatically receive an email to confirm your appointment.   If you do not receive this email, please check your Spam Folder before contacting us.<p>
     <table class="branh_table">
	    <tr>
		  <?foreach($branches as $bran):?>
		  <td><a href="<?=site_url("Booking/?brach_id=".$bran["bran_id"])?>">ON-LINE BOOKINGS<br><?=$bran["bran_name"]?></a></td>
		  <?endforeach;?>
		</tr>
     </table>
     <p><br>If you have any problems using our online bookings system, please contact us by email at <a href="mailto:info@ginsen-london.com">info@ginsen-london.com</a> or by phone at 0207 586 7348</p>	 
   </div>
</div>

<div class="section">
   <div class="section_title">You can also book...	</div>
   <p>&nbsp;</p>
   <div class="section_info">
     <table class="branh_table">
	   <tr><th> AT RECEPTION</th></tr>
	    <?foreach($branches as $bran):?>
		<tr>
		  <td><span class="st"><?=str_replace("GinSen ","",$bran["bran_name"])?>:</span></td>
		  <td>Monday to Saturday<br>Sunday</td>
		  <td> 10.00am – 8.00pm<br>  11.00am – 9.00pm</td>
		</tr>
		<?endforeach;?>
     </table>
     <p>&nbsp;</p>
	 <table class="branh_table short">
	   <tr><th> BY PHONE</th></tr>
	    <tr>
		  <td><span class="st">Swiss Cottage:</span></td>
		  <td>+ 44 (0) 207 586 7348</td>
		</tr>
	    <tr>
		  <td><span class="st">King’s Road:</span></td>
		  <td>+ 44 (0) 207 751 5606</td>
		</tr>
	     <tr>
		  <td><span class="st">Southampton Row:  </span></td>
		  <td>+ 44 (0) 207 580 1795</td>
		</tr>
     </table>
	 
	      <p>&nbsp;</p>
	 <table class="branh_table short">
	   <tr><th>BY EMAIL</th></tr>
	    <tr>
		  <td><span class="st">You can contact us on:</span></td>
		  <td><a href="mailto:info@ginsen-london.com">info@ginsen-london.com</a></td>
		</tr>
     </table>

	 
	 
   </div>
</div>
