jQuery(document).ready(function(){
    jQuery( "#booking_date" ).datepicker({ dateFormat: "dd-mm-yy" });
	jQuery("#booking_form").submit(function(){
	   var sendform=true;
	   var booking_date = jQuery("input[name=booking_date]").val();
	   var service=jQuery("select[name=service]").val();
	   var app_time=jQuery("select[name=app_time]").val();
	   if(booking_date==""){
	       jQuery("input[name=booking_date]").addClass("error");
		   sendform=false;
	   }
	   if(service==0){
	       jQuery("select[name=service]").addClass("error");
		   sendform=false;
	   }
	   if(app_time==0){
	       jQuery("select[name=app_time]").addClass("error");
		   sendform=false;
	   }
	   
	   /*check if the date is valid date*/
	   var now= new Date();
	   var date= now.getDate();
	   date=date<10?"0"+date:date;
	   var month= now.getMonth()+1;
	   month=month<10?"0"+month:month;
	   var year = now.getFullYear();
	   var hours = now.getHours();
	   var mins = now.getMinutes();
	   var current_time=month+"/"+date+"/"+year+" "+hours+":"+mins+":00";
	   
	   
	   var select_date_arr = booking_date.split("-");
       console.log(select_date_arr);
	   var select_timestamp=select_date_arr[1]+"/"+select_date_arr[0]+"/"+select_date_arr[2]+" "+app_time+":0:00";
	   
	   if(Date.parse(select_timestamp)<=Date.parse(current_time)){
	      alert("Please select future date and time!");
		  jQuery("input[name=booking_date]").addClass("error");
		  jQuery("select[name=app_time]").addClass("error");
		  sendform=false;
	   }
	   
	  // return false;
	   
	   return sendform;
	});
	
	jQuery("select,input[type=text]").focus(function(){
	  jQuery(this).removeClass("error");
	});
	
	
	jQuery("select[name=service]").change(function(){
	    //console.log(jQuery(this).val());
		var ser_id=jQuery(this).val();
		var app_date=jQuery("#booking_date").val();
		//console.log(services[ser_id]);
		jQuery("#service_description").html(services[ser_id]);
		 if(app_date!="" && ser_id!=0){
	      ajax_time(app_date,ser_id)
	     }
	});
	
	jQuery("#booking_date").change(function(){
	   //alert("booking data changed!");
	   var app_date=jQuery(this).val();
	   var ser_id=jQuery("select[name=service]").val();
	   if(app_date!="" && ser_id!=0){
	      ajax_time(app_date,ser_id)
	   }
	   
	 });
	
	
});


function ajax_time(app_date,service){
  data="date="+app_date+"&ser_id="+service;
	   jQuery.ajax({
	       url:site_url("booking/ajax_time/"),
		   type:"post",
		   data:data,
		   beforeSend:function(xhr){
		      show_loading();
		   },
		   success:function(data){
		     var disable_hours=data;
             content='<option value="0">Please select your time.</option>';
			 for(var i=10;i<=19;i++){
			    if(jQuery.inArray(i,disable_hours)==-1){
				  content+='<option value="'+i+'">'+i+':00-'+(i+1)+':00</option>';
				}
			 }
			 jQuery("select[name=app_time]").html(content);
			 hide_loading();
		   }
	     })
}