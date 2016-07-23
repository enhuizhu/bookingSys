<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/style.css"/>
<?include "pop_up.php"?>
<div class="form_wrapper" id="form_wrapper">
  <div class="top_title">
      <span class="close_btn">X</span>
  </div> 
  <div class="content_wrapper">
  <div class="client_info">
    <strong>Client name:&nbsp;&nbsp;<span id="client_name"></span></strong>
  </div>
   <table>
     <tr>
	   <td>
	      <!-- table for record user order //-->
	      <table id="ordered_item">
		     <thead>
			  <tr>
			      <th>Product Id</th>
			      <th>Product Name</th>
			      <th>Catogory Name</th>
			      <th>Product Quntity</th>
			      <th>Delete</th>
			      <th>Price</th>
			  </tr>
			  </thead>
			  <tbody>
			  </tbody>
		</table>
	    <div id="result_container">
		    <label>Total Price:</label>
			<label id="total_price"></label>
		</div>
	    <div id="btn_containers">
             <input type="button" class="btn" onclick="check_out()" value="Check Out">&nbsp;&nbsp;
			 <input type="button" class="btn" onclick="cancel()" value="Cancel">
		</div>
	   </td>
	   <td>
	      <!-- table display the filtered products //-->
	      <?include "table_sort.php"?>
	   </td>
	 </tr>
   </table>
   </div>
</div>

<div class="form_wrapper" id="form_wrapper2">
    <div class="top_title">
      <span class="close_btn">X</span>
    </div>
	<div class="content_wrapper"></div>
</div>