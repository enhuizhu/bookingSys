<?
   if(!function_exists("weekSchedule")){
      function weekSchedule($week_num,$branch,$service){
	     /*get current date*/
		  $day=date("d");
          $month=date("m");
          $year=date("Y");
		 
		 if($week_num!=0){
		  $current_time=mktime(0, 0, 0, $month, $day+($week_num*7), $year);
		  $day=date("d",$current_time);
          $month=date("m",$current_time);
          $year=date("Y",$current_time);
		 }
		 
         /*GET THE START TIME*/
         $week_day=date("w");
		 if($week_day==0){
		   $dis_day=6;
		 }else{
		   $dis_day=$week_day-1;
		 }
		 
		 if($week_day==0){
		   $plusday=0;
		 }else{
		   $plusday=7-$week_day;
		 }
		 
		 $content="";
		 for($i=$dis_day;$i>=1;$i--){
		    $start_time=mktime(0, 0, 0, $month, $day-$i, $year); 
		    $content.="<div class='content_wraper'>";
			$content.="<div class='title'>".date("F",$start_time)."&nbsp;".date("d",$start_time)."<br>".date("l",$start_time)."</div>";
			$content.=daySchedule(date("Y-m-d",$start_time),$branch,$service);
			$content.="</div>";
		 }
		 
		 for($i=0;$i<=$plusday;$i++){
		    $start_time=mktime(0, 0, 0, $month, $day+$i, $year); 
		    $content.="<div class='content_wraper'>";
			$content.="<div class='title'>".date("F",$start_time)."&nbsp;".date("d",$start_time)."<br>".date("l",$start_time)."</div>";
			$content.=daySchedule(date("Y-m-d",$start_time),$branch,$service);
			$content.="</div>";
		 }
		 $content.='<div class="clear"></div>';
		 return $content;
	 }
   }
   
   if(!function_exists("daySchedule")){
      function daySchedule($app_date,$branch,$service){
	      $date_arr=explode("-",$app_date);
		  $year=$date_arr[0];
		  $month=$date_arr[1];
		  $day=$date_arr[2];
		  $current_time=mktime(0,0,0,$month,$day,$year);
		  $week_day=date("w",$current_time);
		  
		  
		  $now_year=date("Y");
		  $now_month=date("m");
		  $now_day=date("d");
		  
		  if($now_year==$year && $now_month==$month && $now_day==$day){
		     $istoday=true;
		  }else{
		     $istoday=false;
		  }
		  
		  $now_time=mktime(date("H"),date("i"),date("s"),$now_month,$now_day,$now_year);
		  if(!$istoday){
			if($now_time>=$current_time){
			  $delete_all=true;
			}else{
			  $delete_all=false;
			}
		  }else{
		    $delete_all=false;
		  }
		  
		  $w_w_k=array(
		    0 => "sunday",
		    1 => "monday",
		    2 => "tuesday",
		    3 => "wednesday",
		    4 => "thursday",
		    5 => "friday",
		    6 => "saturday",
		  );
		  
		  $bus_hours=json_decode($branch[$w_w_k[$week_day]],true);
		  $content="<div class='day_content'>";
		  $start_time=$bus_hours["start"];
		  $end_time=$bus_hours["end"];
		  for($i=$start_time;$i<$end_time;$i++){
		    if($delete_all){
              $half_class=$class=" delete";
			  
			}else{
			  $now_h=date("H");
			  if($i<=$now_h && $istoday){
			    $half_class=$class=" delete";
			  }else{
			    /*try check it in database to see if there is any appoint in db*/
				$hour=$i<10?"0$i":$i;
				$current_date=$app_date." $hour:00:00";
				$current_half_date=$app_date." $hour:30:00";
				if(is_avilable_app($current_date,$service,$branch["bran_id"])){
				   $class="";
				}else{
				   $class=" delete";
				}
				
				if(is_avilable_app($current_half_date,$service,$branch["bran_id"])){
				   $half_class="";
				}else{
				   $half_class=" delete";
				}
				
				
			  }
			 }			
			 $current_date=isset($current_date)?$current_date:null;
			 $current_half_date=isset($current_half_date)?$current_half_date:null;
			 $content.=timeToString($i,"",$class,$current_date);  
		     $content.=timeToString($i,"half",$half_class,$current_half_date);  
		  }
		  //$content.="start:".$bus_hours["start"]."end:".$end_time."bran_id:".$bran_id;
		  $content.="</div>";
		  return $content;
		}
   }
   
   if(!function_exists("timeToString")){
      function timeToString($time_number,$half=null,$class,$app_date=null){
	      if($class!=" delete" && $app_date!=null){
		   $string_base="<div class='time".$class."' data-app_date='".$app_date."'>";
		  }else{
		   $string_base="<div class='time".$class."'>";
		  }
		  if($time_number<=12){
             $string_base.=$time_number;   
		  }else{
		     $string_base.=$time_number-12; 
		  }

            if(!empty($half)){
			    $string_base.=":30";
			 }else{
			    $string_base.=":00";
			 }
          
		  if($time_number<=12){
             $string_base.=" am";   
		  }else{
		     $string_base.=" pm"; 
		  }
		  
		  $string_base.="</div>";
		  return $string_base;
           			 
	  }
   }
   
   if(!function_exists("is_avilable_app")){
        function is_avilable_app($current_date,$service,$bran_id){		
			$db=new Database();
			$sql="select * from cms_appointments where app_datetime=".$db->quotes($current_date);
		    $sql.=" and service_id=".$db->quotes($service);
			//die($sql);
			$result=$db->query($sql);
			$result=$db->fetchToArray($result);
			if(!empty($result)){
                //die("result not empty!");
				/*check if there is schedule*/		       
                $app_date=get_date($current_date);
				$sql="select * from cms_branch_schedule where start>=".$db->quotes($current_date);
				$sql.=" and end<=".$db->quotes($current_date);
				$sql.=" and branch_id=".$db->quotes($bran_id);
				$result2=$db->query($sql);
				$result2=$db->fetchToArray($result2);
				if(!empty($result2)){
				   /*unavilable staff*/
				   $unavilable_staff_id=array();
				   foreach($result as $re){
				      array_push($unavilable_staff_id,$re["staff_id"]);
				   }
				   
				   /*get all the avilable staff on that day*/
				   $schedule_id=$result2[0]["schedule_id"];
				   $avilable_staff_ids=get_avilabe_staff($current_date,$schedule_id,$service);
				   
				   //$new_arr=array_diff($avilable_staff_ids,$unavilable_staff_id);
				   
				   if(count($avilable_staff_ids)>count($result)){
				       return true;
				   }
				   
				   /*check staff skill*/
				   return false;
				   
				   
				}else{
				  $app_num=count($result); 
				  //$staff_ids=get_all_staff_ids($bran_id,$service);
			      if($app_num<=0){
			        return true;
			      }
				  return false;
				}
			   
			}else{
			   //echo $sql."\n";
			   return true;
			}
	    }
   }
   
   if(!function_exists("get_all_staff_ids")){
   function get_all_staff_ids($branch_id,$service){
	      $db=new Database();
		  $sql="select * from cms_staff where working_branch like '%".$branch_id."%'";
          $result=$db->query($sql);
          $result=$db->fetchToAssoc($result);
		  //var_dump($result);
          $new_staff_ids=array();
		  foreach($result as $re){
		     $skills=explode(",",$re["skills"]);
			 if(in_array($service,$skills)){
			   array_push($new_staff_ids,$re["staff_id"]);
			 }
		  }
		  return $new_staff_ids;          
		}
   }
   
   if(!function_exists("get_date")){
     function get_date($date_time){
	    $date_time_arr=explode(" ",$date_time);
		return $date_time_arr[0];
	 }
   }
    
   if(!function_exists("get_week_day")){
      function get_week_day($cur_date){
	    $cur_date_arr=explode("-",$cur_date);
		$year=$cur_date_arr[0];
		$month=$cur_date_arr[1];
		$day=$cur_date_arr[2];
		
		$new_mk_time=mktime(0,0,0,$month,$day,$year);
		$w_d=date("w",$new_mk_time);
		if($w_d==0){
		   $w_d=7;
		}
		return ($w_d-1);
	 }
   }   
	
	
   if(!function_exists("get_avilabe_staff")){
      function get_avilabe_staff($current_date,$schedule_id,$service){
	    $avilable_staff=array();
		$db=new Database();
        $sql="select * from cms_staff_schedule where schedule_id=".$db->quotes($schedule_id);
		$result=$db->query($sql);
		$result=$db->fetchToArray($result);
		
		/*try to get the week day of current date*/
		$date_time_arr=explode(" ",$current_date);
		$cur_date=$date_time_arr[0];
		$w_d=get_week_day($cur_date);
		foreach($result as $re){
		   $times=json_decode($re["staff_schedule_val"],false);
		   if($times[$w_d]["start"]!==0){
		     /*check if this staff have this skill*/
			 /*get staff info*/
			  $sql="select * from cms_staff where staff_id=".$db->quotes($re["staff_id"]);
			  $res=$db->query($sql);
			  $res=$db->fetchToRow($res);
			  $skills=explode(",",$res["skills"]);
			  if(in_array($service,$skills)){
			      array_push($avilable_staff,$re["staff_id"]);  
			  }
			}
		 }
		 
		 return $avilable_staff;
	 }
   }
   

?>