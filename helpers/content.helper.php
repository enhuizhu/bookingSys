<?
  if(!function_exists('today_date')) {
   function today_date(){
       $year=date("Y");
	   $month=date("m");
	   $day=date("d");
	   //echo "month is :$month<br>";
	   $months=array(
	     "01" => "Jan",
	     "02" => "Feb",
	     "03" => "Mar",
	     "04" => "Apr",
	     "05" => "May",
	     "06" => "Jun",
	     "07" => "July",
	     "08" => "Aug",
	     "09" => "Sep",
	     "10" => "Oct",
	     "11" => "Nov",
	     "12" => "Dec",
	   );
	   
	   $mydate=$day." ".$months[$month]." ".$year;
	   echo $mydate;
	 }
}

  if(!function_exists('change_date_formate')) {
    function change_date_formate($date_string){
         $date_arr=explode("-",$date_string);
		 $new_formate=$date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
		 return $new_formate;
    }
	
}

  if(!function_exists('d_in_db')) {
    function d_in_db($w){
		 if($w==0){
		    $d_in_db=6;
		 }else{
		    $d_in_db=$w-1;
		 }
       return $d_in_db;
	}
 }


?>