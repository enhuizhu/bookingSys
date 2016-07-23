jQuery(document).ready(function(){
   jQuery("#start_date").datepicker({dateFormat: "dd/mm/yy" });
   jQuery("#end_date").datepicker({dateFormat: "dd/mm/yy" });
   
   jQuery("#schedule_form").submit(function(){
     /**
	 *get start date and end date
	 **/
	 var star_date=jQuery("input[name=start_date]").val();
	 var end_date=jQuery("input[name=end_date]").val();
	 
	 /**
	 * check if start date and end date is empty
	 **/
	 if(star_date=="" || end_date==""){
	    alert("start date or end date can not be empty!");
		return false;
	 }
	 var start_date_arr=star_date.split("/");
	 var end_date_arr=end_date.split("/");
	 
	 /**
	 * get current time
	 **/
	 var now = new Date();
	 var current_year = now.getFullYear();
	 var current_month = now.getMonth()+1;
	 var current_date = now.getDate();
	 current_month=current_month<10?"0"+current_month:current_month;
	 current_date=current_date<10?"0"+current_date:current_date;
	 var new_date=current_month+"/"+current_date+"/"+current_year;
	 var current_date_string=new_date+" 00:00:00";
	
	 var start_date_string=start_date_arr[1]+"/"+start_date_arr[0]+"/"+start_date_arr[2]+" 00:00:00";
	 var end_date_string=end_date_arr[1]+"/"+end_date_arr[0]+"/"+end_date_arr[2]+" 00:00:00";
	 
	 /**
	 * check if the start date is bigger then current date
	 **/
	 if(Date.parse(start_date_string)<Date.parse(current_date_string)){
	    alert("start date must be future's date");
		return false;
	 }
	 
	  /**
	 * check if the end date is bigger then start date
	 **/
	 if(Date.parse(end_date_string)<Date.parse(start_date_string)){
	    alert("end date must be bigger then start date");
		return false;
	 }
	 
	 /**
	 * check if the start date is monday
	 **/
	 start_date_obj = new Date(start_date_arr[2],start_date_arr[1]-1,start_date_arr[0]);
	 if(start_date_obj.getDay()!=1){
	    alert("start date must be monday");
	    return false;
	 }
	 
	  /**
	 * check if the end date is sunday
	 **/
	 end_date_obj = new Date(end_date_arr[2],end_date_arr[1]-1,end_date_arr[0]);
	 if(end_date_obj.getDay()!=0){
	    alert("end date must be sunday");
	    return false;
	 }
	 
	 
	 /**
	 * check if end date is 7 days bigger then start date
	 **/
	 //alert(end_date_string+","+start_date_string);
	 var dis=Date.parse(end_date_string)-Date.parse(start_date_string);
	 var dis_days=dis/(1000*60*60*24);
	 //alert("dis:"+dis);
	 //alert("dis_days:"+dis_days);
	 if(dis_days!=6){
	   alert("The length of the schedule must be one week")
	   return false;
	 }
	 
	 
	 //alert(new_date);
	 return true;
   });
});