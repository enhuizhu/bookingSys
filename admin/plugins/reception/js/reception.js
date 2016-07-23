var my_cart = new shopping_cart("#ordered_item","#total_price");
var current_user_id=null;
jQuery(document).ready(function(){
     jQuery(".close_btn").click(function(){
	    jQuery(".lay,.form_wrapper").hide();
	 });
});

function add_to_list(obj){
   data=jQuery(obj).attr("data");
   //console.log("data is:"+data);
   var item=JSON.parse(data);
   my_cart.addItem(item);
   
}

function sell_product(user_id,obj){
    current_user_id=user_id;
	//console.log("object",obj);
	var user_info=jQuery(obj).attr("data-info");
	//console.log("user info",user_info);
	user_info=JSON.parse(user_info);
	var user_name=user_info.first_name+" "+user_info.family_name;
	jQuery("#client_name").html(user_name);
	center_box("#form_wrapper");
	jQuery(".lay,#form_wrapper").show();
}

function cancel(){
   /*init my_cart*/
   my_cart = new shopping_cart("#ordered_item","#total_price");
   my_cart.display_items();
   /*hide pop up*/
   jQuery(".lay,#form_wrapper").hide();
}

function view_transaction(client_id){
    data="client_id="+client_id;
	jQuery.ajax({
	  url:plugin_url("view_transaction"),
	  data:data,
	  type:"post",
	  beforeSend:function(xhr){
	     show_send();
	  },
	  success:function(data){
	     transactions=JSON.parse(data);
	     console.log(transactions);
		 var content="";
		 for(var k in transactions){
		 transaction=transactions[k];
		 if(transaction.transaction_id==undefined){
		    continue;
		 }
		 content+="<div class='box'>";
		 content+="<div class='row'>";
		 content+="<label>Transaction id</label>";
		 content+="<div class='content'>"+transaction.transaction_id+"</div>";
		 content+="<div class='clear'></div>";
		 content+="</div>";

		 content+="<div class='row'>";
		 content+="<label>Client id</label>";
		 content+="<div class='content'>"+transaction.client_id+"</div>";
		 content+="<div class='clear'></div>";
		 content+="</div>";
		 
		 content+="<div class='row'>";
		 content+="<label>Transaction Date</label>";
		 content+="<div class='content'>"+transaction.transaction_date+"</div>";
		 content+="<div class='clear'></div>";
		 content+="</div>";

		 content+="<div class='row'>";
		 content+="<label>Items</label>";
		 content+="<div class='content'>";
		 var items=JSON.parse(transaction.items);
		 var sum_price=0;
		 content+="<table>";
		 content+="<tr>";
		 content+="<th>";
		 content+="Item Id";
		 content+="</th>";
		 content+="<th>";
		 content+="Name";
		 content+="</th>";
		 content+="<th>";
		 content+="Category Name";
		 content+="</th>";
		 content+="<th>";
		 content+="Item Price";
		 content+="</th>";
		 content+="<th>";
		 content+="Item quntity";
		 content+="</th>";
		 content+="<th>";
		 content+="Total price";
		 content+="</th>";
		 content+="</tr>";
		 
		 for(var i=0; i<items.length; i++){
		 content+="<tr>";
		   content+="<td>"+items[i].id+"</td>";   
		   content+="<td>"+items[i].name+"</td>";   
		   content+="<td>"+items[i].cat_name+"</td>";   
		   content+="<td>&pound;"+items[i].price+"</td>";   
		   content+="<td>"+items[i].quntity+"</td>";   
		   content+="<td>&pound;"+items[i].price*items[i].quntity+"</td>";   
		   sum_price+=eval(items[i].price*items[i].quntity);
		 content+="</tr>"
		 }
		 content+="<tr><td colspan='6' style='text-align:right; font-weight:bold;'>Total Price:&pound;"+sum_price+"</td></tr>"
		 content+="</table>"
		 content+="</div>";
		 content+="<div class='clear'></div>";
		 content+="</div>";
		 content+="</div>";
		}
		 jQuery("#form_wrapper2 .content_wrapper").html(content);
		 center_box("#form_wrapper2");
		 jQuery(".status").hide();
		 jQuery("#form_wrapper2").show();
		 jQuery("#form_wrapper2").css("top","10px");
	  }
	
	});
}

function check_out(){
   var lists = JSON.stringify(my_cart.items);
   var user_id=current_user_id;
   data="user_id="+user_id+"&lists="+lists;
   jQuery.ajax({
      url:plugin_url("ajax_transaction"),
	  data:data,
	  type:"post",
	  beforeSend:function(xhr){
	      show_send();
	  },
	  success:function(data){
	      console.log(data);
		  var result=JSON.parse(data);
		  alert(result.message);
		  hide_send();
		  jQuery("#form_wrapper").hide();
	  }
   });
}



 
