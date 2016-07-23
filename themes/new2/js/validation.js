jQuery(document).ready(function(){
  jQuery("#register_form").submit(function(){
    var send_form=true;
    var first_name=jQuery("input[name=first_name]").val();
    var family_name=jQuery("input[name=family_name]").val();
    var postcode=jQuery("input[name=postcode]").val();
    var street=jQuery("input[name=street]").val();
    var city=jQuery("input[name=city]").val();
    var home_phone=jQuery("input[name=home_phone]").val();
    var mobile_phone=jQuery("input[name=mobile_phone]").val();
    var email=jQuery("input[name=email]").val();
    var con_email=jQuery("input[name=con_email]").val();
	if(first_name==""){
	   jQuery("input[name=first_name]").addClass("error");
	   send_form=false;
	}
	
	if(family_name==""){
	   jQuery("input[name=family_name]").addClass("error");
	   send_form=false;
	}
	
    if(postcode==""){
	   jQuery("input[name=postcode]").addClass("error");
	   send_form=false;
	}
	
	if(street==""){
	   jQuery("input[name=street]").addClass("error");
	   send_form=false;
	}
	
    if(city==""){
	   jQuery("input[name=city]").addClass("error");
	   send_form=false;
	}
	
    if(home_phone==""){
	   jQuery("input[name=home_phone]").addClass("error");
	   send_form=false;
	}
	
	if(mobile_phone==""){
	   jQuery("input[name=mobile_phone]").addClass("error");
	   send_form=false;
	}
	
    if(email==""){
	   jQuery("input[name=email]").addClass("error");
	   send_form=false;
	}
	
	if(con_email==""){
	   jQuery("input[name=con_email]").addClass("error");
	   send_form=false;
	}
	
    if(con_email!=email){
	   jQuery("input[name=con_email]").addClass("error");
	   jQuery("input[name=email]").addClass("error");
	   send_form=false;
	}
	
	  if(!(/.+@.+\..+/.test(con_email))){
	      //alert("not valid email!");
	      jQuery("input[name=email]").addClass("error");
	     send_form=false;
	   }
	  
	  if(!(/.+@.+\..+/.test(con_email))){
	      //alert("not valid email!");
	      jQuery("input[name=con_email]").addClass("error");
	     send_form=false;
	   }
	
	
	return send_form;
  });
  
  jQuery("input[type=text]").focus(function(){
     jQuery(this).removeClass("error");
  })
  
  
})