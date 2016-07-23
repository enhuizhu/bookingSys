<link rel="stylesheet" href="<?=$theme->themePath("css/swiper.css")?>">
<script language="javascript" src="<?=$theme->themePath("js/swiper.js")?>"></script>
<script language="javascript" src="<?=$theme->themePath("js/appImplement.js")?>"></script>
<?
  $_SESSION["branch"]=$branch;
  $_SESSION["service"]=$service;

?>
<h3 class="page_title">WELCOME TO GINSEN ............. <?=$branch["bran_name"]?> .... ONLINE BOOKING SYSTEM</h3>
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
	 
	 <div class="swiper-container">
     <div class="swiper-wrapper">
       <div class="swiper-slide">
           <?=weekSchedule(0,$branch,$service)?>	   
       </div>
     </div>
     </div>
	 
	 <div class="controll_pannel">
	    <button id="pre_btn">Pevious Week</button>&nbsp;&nbsp;
		<button id="next_btn">Next Week</button>
	 </div>
	 
   </div>
</div>