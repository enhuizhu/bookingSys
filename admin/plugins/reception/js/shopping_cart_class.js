var shopping_cart =  function(table_id,result_id){
    this.table_id=table_id;
    this.result_id=result_id;
	this.items=new Array();
	this.addItem = function(item){
	    var my_item={};
		my_item.id=item.aid;
		my_item.name=item.name;
		my_item.cat_name=item.cat_name;
		my_item.price=item.price;
		
		if(this.isItemExsit(my_item.id)){
		   this.items[my_item.id].quntity+=1;
		}else{
		   my_item.quntity=1;
		   this.items[my_item.id]=my_item;
		}
		this.display_items();
	}
	/*check if the item already exsits*/
	this.isItemExsit=function(id){
	   for(var k in this.items){
	       if(k==id){
		       return true;
		   }
	   }
	   return false;
	}
	
	this.display_items=function(){
	   var sum_price=0;
	   var html_content="";
	   for(var k in this.items){
	      if(k=="exists"){
		     continue;
		  }
	      html_content+="<tr>";
	      html_content+="<td>";
	      html_content+=this.items[k].id;
	      html_content+="</td>";
		  html_content+="<td>";
	      html_content+=this.items[k].name;
	      html_content+="</td>";
	      html_content+="<td>";
	      html_content+=this.items[k].cat_name;
	      html_content+="</td>";
	      html_content+="<td>";
	      html_content+=this.items[k].quntity;
	      html_content+="</td>";
		  html_content+="<td>";
	      html_content+="<span onclick='my_cart.deleteItem("+this.items[k].id+")' class='btn'>Delete</span>";
	      html_content+="</td>";
		  html_content+="<td>&pound";
	      html_content+=this.items[k].price*this.items[k].quntity;
	      html_content+="</td>";
	      html_content+="</tr>";
		  sum_price+=(this.items[k].price*this.items[k].quntity);
	 }
	 jQuery(this.table_id+" tbody").html(html_content);
	 jQuery(this.result_id).html("&pound;"+sum_price);
	}
	
	/*delete item from the list*/
	this.deleteItem=function(id){
	    var mid_arr = new Array();
        for(var k in this.items){
	       if(k==id){
		       continue;
		   }else{
		      mid_arr[k]=this.items[k];
		   }
	   }
	   this.items=new Array();
	   this.items=mid_arr;
	   this.display_items();
	}

}