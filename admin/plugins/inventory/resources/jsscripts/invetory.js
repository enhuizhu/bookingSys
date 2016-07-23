jQuery(document).ready(function(){
    
	/*jQuery(".edit_label").click(function(){
	   jQuery(this).hide();
	   jQuery(this).next("input").show();
	   var id=jQuery(this).attr("data-id");
	   jQuery("#save_item_"+id).html("Save Edit");
	});
	
	jQuery(".field").blur(function(){
	   jQuery(this).hide();
	   jQuery(this).prev("label").show();
	   var id=jQuery(this).attr("data-id");
	   jQuery("#save_item_"+id).html("Edit");
	});*/
	
	jQuery(".product_edit").click(function(){
	   //alert("hello");
	   /*change the html value of itself*/
	   var html_val=jQuery(this).html();
	   if(html_val=="Edit"){
	      html_val="Save Edit";
	   }else{
	      html_val="Edit";
	   }
	   jQuery(this).html(html_val);
	   
	   var product_id=jQuery(this).attr("data-id");
	   /*change the state of quntity*/
	   if(html_val=="Save Edit"){
	       jQuery("#label_"+product_id).hide();
		   jQuery("#field_"+product_id).show(); 
	   }else{
	       var quntity=jQuery("#field_"+product_id).val();
		   jQuery("#label_"+product_id).show();
		   jQuery("#field_"+product_id).hide();
           if(!isNumber(quntity)){
               alert("quntity must be numberic!");
			   return false;
		   }			
		   ajax_update("#label_"+product_id,"#field_"+product_id,product_id,quntity);
	   }
	   
	});

});

function ajax_update(lable_id, field_id, product_id,quntity){
    data="item_id="+product_id+"&branch_id="+branch_id+"&quntity="+quntity;
	jQuery.ajax({
	  url:plugin_action_url("ajax_update_inventory"),
	  data:data,
	  type:"post",
	  beforeSend:function(xhr){
	      show_send();
	  },
	  success:function(data){
	      hide_send();
		 // console.log(data);
		  data=JSON.parse(data);
		  if(data.error){
		     alert(data.message);
			 return false;
		  }else{
		     jQuery(lable_id).html(data.quntity);
		  }
		  
		  //console.log(data);
	  }
	});
}
