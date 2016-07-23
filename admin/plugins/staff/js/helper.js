function show_table(date){
  var date=date<10?"0"+date:date;
  jQuery(".cal_detail").fadeOut();
  jQuery(".cal_detail[data-day="+date+"]").fadeIn();
 }
 
 function close_pop_up(){
   jQuery(".lay,#window").hide();
 }
 function center_box(element){
   var win_w=jQuery(window).width();
   var win_h=jQuery(window).height();
   var box_w=jQuery(element).width();
   var box_h=jQuery(element).height();
   var pos_l=parseInt((win_w-box_w)/2);
   var pos_t=parseInt((win_h-box_h)/2);
   jQuery(element).css({"left":pos_l+"px","top":pos_t+"px"});
}

 jQuery(document).ready(function(){
    jQuery(".client").click(function(){
	  var client_id=jQuery(this).attr("date-client-id");
	  var dom_obj=this;
	  center_box("#window");
	  jQuery(".lay,#window").show();
	  jQuery.ajax({
	   url:action_url+"ajax_client",
	   type:"post",
	   data:"client_id="+client_id,
	   beforeSend:function(xhr){
	     jQuery("#window .info").html("loading data...");
	   },
	   success:function(data){
	      var client=JSON.parse(data);
		  var content="<h3>Client Detail</h3>";
		  content+="<label>First name:</label>"+client.first_name+"<br>";
		  content+="<label>Family name:</label>"+client.family_name+"<br>";
		  content+="<label>Gender:</label>"+client.gender+"<br>";
		  content+="<label>Title:</label>"+client.title+"<br>";
		  content+="<label>Home Phone:</label>"+client.home_phone+"<br>";
		  content+="<label>Mobile Phone:</label>"+client.mobile_phone+"<br>";
		  content+="<label>Email:</label>"+client.email+"<br>";
		  content+="<label>Street:</label>"+client.street+"<br>";
		  content+="<label>City:</label>"+client.city+"<br>";
		  content+="<label>Country:</label>"+client.country+"<br>";
		  content+="<label>Post Code:</label>"+client.post_code+"<br>";
		  content+="<label>Hear From:</label>"+client.hear_from+"<br>";
		  jQuery("#window .info").html(content);
		   center_box("#window");
	   }
	  })
	  });
	
	jQuery(".staff").click(function(){
	  var staff_id=jQuery(this).attr("date-staff-id");
	  //alert("staff id is:"+staff_id);
	  center_box("#window");
	  jQuery(".lay,#window").show();
	  jQuery.ajax({
	   url:action_url+"ajax_staff",
	   type:"post",
	   data:"staff_id="+staff_id,
	   beforeSend:function(xhr){
	     jQuery("#window .info").html("loading data...");
	   },
	   success:function(data){
	      var client=JSON.parse(data);
		  //console.log(client);
		  //return false;
		  var content="<h3>Staff Detail</h3>";
		  content+="<label>First name:</label>"+client.first_name+"<br>";
		  content+="<label>Family name:</label>"+client.family_name+"<br>";
		  content+="<label>Gender:</label>"+client.gender+"<br>";
		  content+="<label>Email:</label>"+client.email+"<br>";
          jQuery("#window .info").html(content);
		   center_box("#window");
	   }
	  })
	});
    
 
 
 });