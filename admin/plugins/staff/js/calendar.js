var calendar = function(year,month,date_has_app){
    this.current_year=year;
	this.current_month=month;
    this.startdate=new Date(year,month-1,1);
	this.enddate=getEndDate(year,month);
	var monthes=new Array();
	monthes[0]="Jan";
	monthes[1]="Feb";
	monthes[2]="Mar";
	monthes[3]="Apr";
	monthes[4]="May";
	monthes[5]="Jun";
	monthes[6]="Jul";
	monthes[7]="Aug";
	monthes[8]="Sep";
	monthes[9]="Oct";
	monthes[10]="Nov";
	monthes[11]="Dec";
	
	
	/*get previous month*/
	this.get_pre_month=function(){
	    this.current_month-=1;
		if(this.current_month==0){
		    this.current_month=12;
		    this.current_year--;
		}
		var url=acition_url+"?year="+this.current_year+"&month="+this.current_month;
        location.href=url;
        return false;	
		
		this.startdate=new Date(this.current_year,this.current_month-1,1);
	    this.enddate=getEndDate(this.current_year,this.current_month);
		this.show();
	}
	
	/*get next month*/
	this.get_next_month=function(){
	    this.current_month+=1;
		if(this.current_month==13){
		    this.current_month=1;
		    this.current_year++;
		}
		
		var url=acition_url+"?year="+this.current_year+"&month="+this.current_month;
        location.href=url;
        return false;		 
		
		this.startdate=new Date(this.current_year,this.current_month-1,1);
	    this.enddate=getEndDate(this.current_year,this.current_month);
		this.show();
	}
	
	this.show=function(){
	   var start_day=this.startdate.getDay();
	   var end_day=this.enddate.getDay();
	   var current_date=1;
	   var total_days=this.enddate.getDate();
	   var current_year=this.startdate.getFullYear();
	   var current_month=this.startdate.getMonth()+1;
	   var has_app=false;
	   if(date_has_app.year==current_year && date_has_app.month==current_month){
	    has_app=true;
	   }
	   
	   var html= "<table>";
	   html+="<tr>";
	   html+="<td onclick='myCalendar.get_pre_month()'>&lt;</td>";
	   html+="<th colspan='5'>";
	   html+=this.current_year+"&nbsp;"+monthes[this.current_month-1];
	   html+="</th>";
	   html+="<td onclick='myCalendar.get_next_month()'>&gt;</td>";
	   html+="</tr>";
	   html+="<tr>";
	   html+="<td>Sun</td>";
	   html+="<td>Mon</td>";
	   html+="<td>Tue</td>";
	   html+="<td>Wed</td>";
	   html+="<td>Thu</td>";
	   html+="<td>Fri</td>";
	   html+="<td>Sat</td>";
	   html+="</tr>";
	   html+="<tr>";
	   for(var i=0;i<start_day;i++){
	    html+="<td></td>"
	   }
	   for(var i=start_day;i<=6;i++){
	    if(has_app && jQuery.inArray(current_date,date_has_app.date)!=-1){
	       html+="<td style='background:green;' onclick='show_table("+current_date+")'>"+current_date+"</td>"
	     }else{
		   html+="<td>"+current_date+"</td>"
		 }
		 current_date++;
	   }
	   html+="</tr>";
	   
	   days_left=total_days-current_date;
	   for(var i=0;i<=days_left;i++){
	      if(i%7==0){
		    html+="<tr>";
		  }
		  if(has_app && jQuery.inArray(current_date,date_has_app.date)!=-1){
	       html+="<td style='background:green;' onclick='show_table("+current_date+")'>"+current_date+"</td>"
	     }else{
		   html+="<td>"+current_date+"</td>"
		 }
		  //html+="<td>"+current_date+"</td>"
		  current_date++
		  if(i%7==6 || i==days_left){
		    html+="</tr>";
		  }
	   }
	   html+="</table>";
	   jQuery("#calendar").html(html);
	 }
	
	
	function getEndDate(year,month){
	  if(month<1 || month>12){
	     return false;
	  }
	  
	  var feb=0;
      var monthes_with_31=[1,3,5,7,8,10,12];
      var monthes_with_30=[4,6,9,11];
      /*get the days of feb*/
	  if((year%4==0 && year%100!=0) || year%400==0){
	     feb=29;
	  }else{
	     feb=28;
	  }
	  
	  var total_days=0;
	  
	  if(jQuery.inArray(month,monthes_with_31)!=-1){
	      total_days=31; 
	  }else if(jQuery.inArray(month,monthes_with_30)!=-1){
	      total_days=30; 
	  }else{
	      total_days=feb;
	  }
	  
	  var end_date= new Date(year,month-1,total_days);
	  return end_date;
	  }
   }