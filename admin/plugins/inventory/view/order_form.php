<div class="form_wrapper" id="form_wrapper">
	<form id="order_form">
	   <div class="row">
	       <label>Quntity:</label>
	       <input type="text" name="quntity">
	       <div class="clear"></div>
	   </div>
	   <div class="row">
	       <label>Total Price:</label>
	       <input type="text" name="total_price">
		   <div class="clear"></div>
	   </div>
	   <div class="row">
	        <input type="hidden" name="product_id">
	        <input type="hidden" name="product_info">
            <input type="button" class="btn" id="make_order" value="Add To List">&nbsp;&nbsp;
			<input type="button" class="btn" id="cancel" value="Cancel">
	   </div>
	</form>
</div>

<script language="javascript">

 function make_order(product_id,obj){
    jQuery("input[name=quntity]").val("");
    jQuery("input[name=total_price]").val("");
    jQuery("input[name=product_id]").val(product_id); 
    var product_info=jQuery(obj).attr("data-info");
	jQuery("input[name=product_info]").val(product_info);
	center_box("#form_wrapper");
	jQuery("#form_wrapper,.lay").show();
 }

 
  jQuery(document).ready(function(){
     jQuery("#make_order").click(function(){
	      //alert(jQuery("input[name=product_id]").val());
		  var quntity=jQuery("input[name=quntity]").val();
		  var total_price=jQuery("input[name=total_price]").val();
		  var product_id=jQuery("input[name=product_id]").val();
		  var product_info=jQuery("input[name=product_info]").val();
		  if(!isNumber(quntity)){
		      alert("quntity must be numberic!");
			  return false;
		  }
		  
		  if(!isNumber(total_price)){
		      alert("total price must be numberic!");
			  return false;
		  }
		  console.log(product_info)
		  var item=JSON.parse(product_info);
		  item.quntity=quntity;
		  item.total_price=total_price;
		  console.log(item)
		  mycart.addItem(item);
		  mycart.display_items();
		  jQuery("#order_list").addClass("show");
		  jQuery("#form_wrapper,.lay").hide();
		  /* var data="quntity="+quntity+"&total_price="+total_price+"&product_id="+product_id+"&branch_id="+branch_id+"&order_date="+order_date;
		  jQuery.ajax({
		   url:plugin_action_url("ajax_update_order"),
		   type:"post",
		   data:data,
		   beforeSend:function(xhr){
	         jQuery("#form_wrapper").hide();
			 show_send();
		   },
		   success:function(data){
		      hide_send();
			  console.log(data);
			  data=JSON.parse(data);
			  alert(data.message);
		   }
		  })*/
	 });
	 
	 jQuery("#cancel").click(function(){
	    jQuery("#form_wrapper,.lay").hide();
	 });
	 
	 jQuery( "#order_date" ).datepicker({dateFormat: "yy-mm-dd"});
	 
  });
 
 
</script>