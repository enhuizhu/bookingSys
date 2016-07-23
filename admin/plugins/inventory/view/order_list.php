<div id="order_list" class="ani">
    <div class="show_btn rotate" id="show_btn">
      Products
   </div>
   <div class="order_content">
      <h3>Order Lists</h3>
	  <table id="order_table">
	     <thead>
		 <tr>
		   <th>Id</th>
		   <th>Name</th>
		   <th>Quntity</th>
		   <th>Delete</th>
		   <th>Price</th>
		 </tr>
		 </thead>
		 <tbody>
		 </tbody>
		 <tfoot>
		   <tr>
		   <th colspan="5" align="right">
		      Total Price:&nbsp;<span id="order_result"></span>
		   </th>
		    </tr>
			<tr>
			<th colspan="5" align="right">
		      <form>
			     <div class="row">
				   <label>Order Date</label>
				   <input type="text" id="order_date" name="order_date">
				   <div class="clear"></div>
				 </div>
				 <div class="row">
				    <input type="button" value="Save Order" class="btn" id="save_btn">
					<input type="button" value="Cancel Order" class="btn">
					<div class="clear"></div>
				 </div>
			  </form>
		   </th>
			</tr>
		 </tfoot>
	  </table>
	</div>
</div>

<script language="javascript" src="<?=PLUG_IN?>jsscripts/shopping_cart_class.js"></script>
<script language="javascript">
<!--
     var mycart = new shopping_cart("#order_table","#order_result");
	 jQuery(document).ready(function(){
	     jQuery("#show_btn").click(function(){
		     jQuery("#order_list").toggleClass("show");
		 });
		 
		 jQuery("#save_btn").click(function(){
		    /*validate the myitems*/
			if(mycart.items.length<=0){
			   alert("please add product to the list");
			   return false;
			}
			
			if(jQuery("#order_date").val()==""){
			   alert("please input order date in the field!");
			   return false;
			}
			var order_date=jQuery("#order_date").val();
			var data="items="+JSON.stringify(mycart.items)+"&order_date="+order_date+"&branch_id="+branch_id;
			/*save list to the database*/
		   jQuery.ajax({
		    url:plugin_action_url("ajax_update_order_list"),
		    type:"post",
		    data:data,
		    beforeSend:function(xhr){
	          //jQuery("#form_wrapper").hide();
			  show_send();
		    },
		   success:function(data){
		      hide_send();
			  console.log(data);
			  data=JSON.parse(data);
			  alert(data.message);
		   }
		  });
	    });
		
		/*add window scroll event to order list*/
		jQuery(window).scroll(function(){
		   /*get window scroll top val*/
		   var sc_top=jQuery(window).scrollTop();
		   var new_top=sc_top+20;
		   jQuery("#order_list").css("top",new_top+"px");
		});
		
	 });
//-->
</script>