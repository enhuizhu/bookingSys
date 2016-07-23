<?
   class staffModel extends Model{
       public $errors=array();
       public function validate($var){
	     if(empty($var["bran_name"])){
		     $this->errors[]= "Branch name can not be empty!";
		  }
		  
		  //echo "errors numb:".count($this->errors);
		  if(count($this->errors)>0){
		     return false;
		  }else{
		    return true;
		  }
	   }
	   
	   public function validateservice($var){
	     if(empty($var["ser_name"])){
		     $this->errors[]= "service name can not be empty!";
		  }
		  
		  //echo "errors numb:".count($this->errors);
		  if(count($this->errors)>0){
		     return false;
		  }else{
		    return true;
		  }
	   }
	   
	   public function validateposition($var){
	     if(empty($var["position_name"])){
		     $this->errors[]= "position name name can not be empty!";
		  }
		  
		  //echo "errors numb:".count($this->errors);
		  if(count($this->errors)>0){
		     return false;
		  }else{
		    return true;
		  }
	   }
	   
	   public function validatestaff($var){
	     if(empty($var["first_name"])){
		     $this->errors[]= "first name can not be empty!";
		  }
		  
		 if(empty($var["family_name"])){
		     $this->errors[]= "family name can not be empty!";
		  }
		  
		  if(empty($var["email"])){
		     $this->errors[]= "email can not be empty!";
		  }
		  
		  if(empty($var["skills"])){
		     $this->errors[]= "skills can not be empty!";
		  }
		  
		  if(empty($var["branches"])){
		     $this->errors[]= "branches can not be empty!";
		  }
		  
		  
		  //echo "errors numb:".count($this->errors);
		  if(count($this->errors)>0){
		     return false;
		  }else{
		    return true;
		  }
	   }
	   
	   
	   public function delete_record($table,$id_name,$id_value){
	     $sql="delete from cms_$table where $id_name=$id_value";
		// echo $sql;
		 if(!$this->db->query($sql)){
		    $this->errors[]=mysqli_error($this->db->mysqli);
		   return false;
		 }else{
		    if($table=="branch_schedule"){
			   $sql="delete from cms_staff_schedule where schedule_id=".$this->db->quotes($id_value);
			   $this->db->query($sql);
			}
		    return true;
		 }
		 
	   
	   }
	   
	   public function updateClient($client_id,$var){
	     $sql="update cms_clients set first_name=".$this->db->quotes($var["first_name"]);
		 $sql.=",family_name=".$this->db->quotes($var["family_name"]);
		 $sql.=",post_code=".$this->db->quotes($var["post_code"]);
		 $sql.=",street=".$this->db->quotes($var["street"]);
		 $sql.=",city=".$this->db->quotes($var["city"]);
		 $sql.=",country=".$this->db->quotes($var["country"]);
		 $sql.=",gender=".$this->db->quotes($var["gender"]);
		 $sql.=",title=".$this->db->quotes($var["title"]);
		 $sql.=",home_phone=".$this->db->quotes($var["home_phone"]);
		 $sql.=",mobile_phone=".$this->db->quotes($var["mobile_phone"]);
		 $sql.=",email=".$this->db->quotes($var["email"]);
		 $sql.=",branch_id=".$this->db->quotes($var["working_branch"]);
		 $sql.=",record_no=".$this->db->quotes($var["record_no"]);
		 $sql.=",notes=".$this->db->quotes($var["notes"]);
		 $sql.=" where user_id=".$this->db->quotes($client_id);
	     if(!$this->db->query($sql)){
		    $this->errors[]=mysqli_error($this->db->mysqli);
			return false;
		  }else{
		     return true;
		  }
	   }
	   public function getApps($year,$month){
	    if($month<10){
		   $month="0".$month;
		}
	    $start="$year-$month-01 00:00:00";
		$days_in_month=days_in_month($year,intval($month));
		$days_in_month=$days_in_month<10?"0".$days_in_month:$days_in_month;
		$end="$year-$month-$days_in_month 23:59:59";
		$sql="select *,b.first_name as dfirst_name,b.family_name as dfamily_name,e.bran_name from cms_appointments as a left join cms_staff b on a.staff_id=b.staff_id left join cms_services as c on a.service_id=c.ser_id left join cms_clients as d on a.client_id=d.user_id left join cms_branch as e on a.bran_id=e.bran_id where a.app_datetime>=".$this->db->quotes($start);
		$sql.=" and a.app_datetime<=".$this->db->quotes($end);
		$result=$this->db->query($sql);
		$result=$this->db->fetchToAssoc($result);
	    return $result;
	   }
	   
	   public function is_schedule_exist($start_date,$branch_id){
	     $sql="select * from cms_branch_schedule where start=".$this->db->quotes($start_date);
		 $sql.=" and branch_id=".$this->db->quotes($branch_id);
		 $result=$this->db->query($sql);
		 $result=$this->db->fetchToArray($result);
		 if(count($result)>0){
		    return true;
		 }
		  return false;
		}
	   
	   public function valid_schedule($var,$model){
	      if($model=="add"){
           	       /*check if the schedule already exsit*/
		   if($this->is_schedule_exist(change_date_formate($_SESSION["start_date"]),$var["branch_id"])){
		      $this->errors[]="The schedule which start ".$_SESSION["start_date"]." and branch id is ".$var["branch_id"]." already exsit! plase reselect the start date!";
			  $_POST=array();
			  return false;
		   }
		   }
		   $all_schedul=array();
		   $staff_ids=array();
		   foreach($var as $k=>$v){
		      if(preg_match("/staff_schedule_start/i",$k)){
			     $all_schedul_start[$k]=$v;
				 $current_id=substr($k,strlen("staff_schedule_start"));
				 array_push($staff_ids,$current_id);
			  }else if(preg_match("/staff_schedule_finish/i",$k)){
			     $all_schedul_finish[$k]=$v;
			  }
		   }
		  // var_dump($staff_ids);
		  foreach($staff_ids as $k){
		      for($i=0;$i<7;$i++){

				 if($all_schedul_start["staff_schedule_start".$k][$i]==0 ||$all_schedul_finish["staff_schedule_finish".$k][$i]==0){
		
				   if($all_schedul_start["staff_schedule_start".$k][$i] != $all_schedul_finish["staff_schedule_finish".$k][$i]){
			
				      $this->errors[$k."_".$i]=$k."_".$i.":invalid start time or end time";
				   }
				 }else{
				    $start_time=$all_schedul_start["staff_schedule_start".$k][$i];
				      $finish_time=$all_schedul_finish["staff_schedule_finish".$k][$i];
					  if($finish_time<=$start_time){
					    $this->errors[$k."_".$i]=$k."_".$i.":invalid start time or end time";
					  }
				 }
			   }
		  }
	
		  if(count($this->errors)>0){
		     return false;
		  }else{
		     return array(
			   "start" => $all_schedul_start,
			   "finish" => $all_schedul_finish,
			   "branch_id"=>$var["branch_id"],
			 );
		  }
	}
	   
	   public function add_new_schedule($schedule,$model){
	    // var_dump($schedule);
		 //die();
         if($model=="add"){
		 $sql="insert into cms_branch_schedule (branch_id,start,end) values (";
		 $sql.=$this->db->quotes($schedule["branch_id"]).",";
		 $sql.=$this->db->quotes(change_date_formate($_SESSION["start_date"])).",";
		 $sql.=$this->db->quotes(change_date_formate($_SESSION["end_date"])).")";
	     //die($sql);
	      if(!$this->db->query($sql)){
		    $this->errors[]=mysqli_error($this->db->mysqli);
			return false;
		  }
          	   
	      /*add schedule data to staff schedule table*/
	        $schedule_id=$this->db->mysqli->insert_id;
	        //$schedule_id=1;
		  }else{
		    $schedule_id=$_SESSION["s_id"];
		  }
		  foreach($schedule["start"] as $k => $v){
		      $staff_id=substr($k,strlen("staff_schedule_start"));
			  $current_schedule=array();
			  for($i=0;$i<count($v);$i++){
			    $current_schedule[$i]="{'start':'".$schedule["start"][$k][$i]."','finish':'".$schedule["finish"]["staff_schedule_finish".$staff_id][$i]."'}" ;
			  }
	   if($model=="add"){
			 $sql="insert into cms_staff_schedule (staff_schedule_val,staff_id,schedule_id) values (";
			 $sql.=$this->db->quotes(json_encode($current_schedule)).",";
			 $sql.=$this->db->quotes($staff_id).",";
			 $sql.=$this->db->quotes($schedule_id).")";
	   }else{
	         $sql="update cms_staff_schedule set staff_schedule_val=".$this->db->quotes(json_encode($current_schedule));
             $sql.=" where staff_id=".$this->db->quotes($staff_id);
           	 $sql.=" and schedule_id=".$this->db->quotes($schedule_id);
	   }
                                    // die();
                                   //  echo $sql."<br>";
		     if(!$this->db->query($sql)){
		        $this->errors[]=mysqli_error($this->db->mysqli);
			    return false;
		     }
		     $this->sendMail($staff_id,$current_schedule);	 
		 
                                    }
		  //die();
		  if($model=="add"){
		  $this->success="staff schedule has been created successfully!";
		  }else{
		   $this->success="staff schedule has been updated successfully!";
		  }
		  return true;
		  
	   }	   
	   
	   public function sendMail($staff_id,$current_schedule){
	   //  var_dump($current_schedule);
                     /*get staff information*/
	     $staff=$this->get_staff_by_id($staff_id);
		 $email=$staff["mail"];
		 $to="e.zhu@hjtenger.co.uk";
		$subject="new schedle from ".$_SESSION["start_date"]." to ".$_SESSION["end_date"];
		$week=array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
		$message='
		 hi, '.$staff["first_name"]." ".$staff["family_name"].':<p>
                                 Here is your new schedule:<p>
                                  <table width="100%" border="1">
		  <tr>
		     <th colspan="7">
			    '.$_SESSION["start_date"].' to '.$_SESSION["end_date"].'
			 </th>
		  </tr>
		  <tr>';
		 
		 $message.='<tr>';
                                 $date_arr=explode("/",$_SESSION["start_date"]);
		 $start_year=$date_arr[2];
		 $start_month=$date_arr[1];
		 $start_date=$date_arr[0];
                                // echo "$start_year,$start_month,$start_date";
                                 for($i=0;$i<7;$i++){
		   $current_time=mktime(0,0,0,$start_month,$start_date+($i+1),$start_year);
		   $message.='<td>'.$week[$i].'<br>'.date("Y-m-d",$current_time).'</td>';
		 }
		 $message.='</tr>';
		 $message.="<tr>";
		 foreach($current_schedule as $json_string){
		     $tim_obj=json_decode(str_replace("'","\"",$json_string));
			 $start=$tim_obj->start;
			 $finish=$tim_obj->finish;
		     if($start==0){
			    $text="off";
			 }else{
			    $text=$start.":00-".$finish.":00";
			 }
			 $message.='<td>'.$text.'</td>';	 
		}
		$message.='</tr></table><p>Ginsen Development Team';
	    // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to,$subject,$message,$headers);
	   
	   }
	   
	   public function add_new_staff($var,$model){
	      if($model=="add"){
             $skills=implode(",",$var["skills"]);
			 $branches=implode(",",$var["branches"]);
			 $sql= "insert into cms_staff (gender,first_name,family_name,skills,working_branch,email,position,telephone) values (";
		     $sql.= $this->db->quotes($var["gender"]).","; 
		     $sql.= $this->db->quotes($var["first_name"]).","; 
		     $sql.= $this->db->quotes($var["family_name"]).","; 
		     $sql.= $this->db->quotes($skills).","; 
		     $sql.= $this->db->quotes($branches).","; 
		     $sql.= $this->db->quotes($var["email"]).","; 
		     $sql.= $this->db->quotes($var["position"]).","; 
		     $sql.= $this->db->quotes($var["telephone"]).")"; 
			 if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
		  
	    }else{
		   return $this->update_staff($var);
		}
	   }
	   
	   	public function update_staff($var){
	      $skills=implode(",",$var["skills"]);
		  $branches=implode(",",$var["branches"]);
	      $sql="update cms_staff set gender=".$this->db->quotes($var["gender"]);
		  $sql.=",first_name=".$this->db->quotes($var["first_name"]);
		  $sql.=",family_name=".$this->db->quotes($var["family_name"]);
		  $sql.=",skills=".$this->db->quotes($skills);
		  $sql.=",working_branch=".$this->db->quotes($branches);
		  $sql.=",email=".$this->db->quotes($var["email"]);
		  $sql.=",position=".$this->db->quotes($var["position"]);
		  $sql.=",telephone=".$this->db->quotes($var["telephone"]);
		  $sql.=" where staff_id=".$this->db->quotes($var["staff_id"]);
		  
		  //echo $sql;
		  //die();
	       if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
	   }
	   
	   public function add_new_branch($var,$model){
	      //var_dump($var);
		  //die();
	      if($model=="add"){
		   if($this->isexists($var["bran_name"])){
		     $this->errors[]="This branch already exists!";
			 return false;
		   }else{
		     
	      	 $monday='{"start":'.(is_numeric($var["mon_start"])?$var["mon_start"]:0).',"end":'.(is_numeric($var["mon_end"])?$var["mon_end"]:0).'}';
		     $tueday='{"start":'.(is_numeric($var["tue_start"])?$var["tue_start"]:0).',"end":'.(is_numeric($var["tue_end"])?$var["tue_end"]:0).'}';
		     $wednesday='{"start":'.(is_numeric($var["wed_start"])?$var["wed_start"]:0).',"end":'.(is_numeric($var["wed_end"])?$var["wed_end"]:0).'}';
		     $thursday='{"start":'.(is_numeric($var["thu_start"])?$var["thu_start"]:0).',"end":'.(is_numeric($var["tue_end"])?$var["tue_end"]:0).'}';
		     $firday='{"start":'.(is_numeric($var["fri_start"])?$var["fri_start"]:0).',"end":'.(is_numeric($var["fri_end"])?$var["fri_end"]:0).'}';
		     $saturday='{"start":'.(is_numeric($var["sat_start"])?$var["sat_start"]:0).',"end":'.(is_numeric($var["sat_end"])?$var["sat_end"]:0).'}';
		     $sunday='{"start":'.(is_numeric($var["sun_start"])?$var["sun_start"]:0).',"end":'.(is_numeric($var["sun_end"])?$var["sun_end"]:0).'}';
			 
			 $sql= "insert into cms_branch (bran_name,monday,tuesday,wednesday,thursday,friday,saturday,sunday) values (";
		     $sql.= $this->db->quotes($var["bran_name"]).",";
		     $sql.= $this->db->quotes($monday).",";
		     $sql.= $this->db->quotes($tueday).",";
		     $sql.= $this->db->quotes($wednesday).",";
		     $sql.= $this->db->quotes($thursday).",";
		     $sql.= $this->db->quotes($firday).",";
		     $sql.= $this->db->quotes($saturday).",";
		     $sql.= $this->db->quotes($sunday);
             $sql.=")";
            // die(var_dump($sql));			 
			 if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
		  }
	    }else{
		   return $this->update_country($var);
		}
	   }
	   
	   public function update_country($var){
	      	 $monday='{"start":'.(is_numeric($var["mon_start"])?$var["mon_start"]:0).',"end":'.(is_numeric($var["mon_end"])?$var["mon_end"]:0).'}';
		     $tueday='{"start":'.(is_numeric($var["tue_start"])?$var["tue_start"]:0).',"end":'.(is_numeric($var["tue_end"])?$var["tue_end"]:0).'}';
		     $wednesday='{"start":'.(is_numeric($var["wed_start"])?$var["wed_start"]:0).',"end":'.(is_numeric($var["wed_end"])?$var["wed_end"]:0).'}';
		     $thursday='{"start":'.(is_numeric($var["thu_start"])?$var["thu_start"]:0).',"end":'.(is_numeric($var["tue_end"])?$var["tue_end"]:0).'}';
		     $firday='{"start":'.(is_numeric($var["fri_start"])?$var["fri_start"]:0).',"end":'.(is_numeric($var["fri_end"])?$var["fri_end"]:0).'}';
		     $saturday='{"start":'.(is_numeric($var["sat_start"])?$var["sat_start"]:0).',"end":'.(is_numeric($var["sat_end"])?$var["sat_end"]:0).'}';
		     $sunday='{"start":'.(is_numeric($var["sun_start"])?$var["sun_start"]:0).',"end":'.(is_numeric($var["sun_end"])?$var["sun_end"]:0).'}';
		 
  		     $sql="update cms_branch set bran_name=".$this->db->quotes($var["bran_name"]);
		     $sql.=", monday=".$this->db->quotes($monday);
		     $sql.=", tuesday=".$this->db->quotes($tueday);
		     $sql.=", wednesday=".$this->db->quotes($wednesday);
		     $sql.=", thursday=".$this->db->quotes($thursday);
		     $sql.=", friday=".$this->db->quotes($firday);
		     $sql.=", saturday=".$this->db->quotes($saturday);
		     $sql.=", sunday=".$this->db->quotes($sunday);
			 $sql.=" where bran_id=".$this->db->quotes($var["bran_id"]);
		  
		     //echo $sql;
		     //die();
	         if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
	   }
	   
	   public function isexists($bran_name){
	       $sql="select count(*) as cn from cms_branch where bran_name=".$this->db->quotes($bran_name);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToRow($result);
		   return $result["cn"]>0?true:false;
		}
		
	   public function isexistsService($ser_name){
	       $sql="select count(*) as cn from cms_services where ser_name=".$this->db->quotes($ser_name);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToRow($result);
		   return $result["cn"]>0?true:false;
		}
	  
	  public function isexistsposition($position_name){
	       $sql="select count(*) as cn from cms_staff_positions where position_name=".$this->db->quotes($position_name);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToRow($result);
		   return $result["cn"]>0?true:false;
		}
		

		
	public function add_new_service($var,$model){
	      //var_dump($var);
		  //die();
	      if($model=="add"){
		   if($this->isexistsService($var["ser_name"])){
		     $this->errors[]="This service already exists!";
			 return false;
		   }else{
		     $sql= "insert into cms_services (ser_name,description) values (";
		     $sql.= $this->db->quotes($var["ser_name"]).","; 
		     $sql.= $this->db->quotes($var["description"]).")"; 
			 if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
		  }
	    }else{
		   return $this->update_service($var);
		}
	   }
	   
	   public function add_new_position($var,$model){
	      //var_dump($var);
		  //echo "position name".$var["position_name"];
		  //die();
	      if($model=="add"){
		   if($this->isexistsposition($var["position_name"])){
		     $this->errors[]="This position already exists!";
			 return false;
		   }else{
		     $sql= "insert into cms_staff_positions (position_name) values (";
		     $sql.= $this->db->quotes($var["position_name"]).")"; 
			 if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
		  }
	    }else{
		   return $this->update_position($var);
		}
	   }
		
	  public function update_service($var){
	      //var_dump($var);
	      $sql="update cms_services set ser_name=".$this->db->quotes($var["ser_name"]);
		  $sql.=",description=".$this->db->quotes($var["description"]);
		  $sql.=" where ser_id=".$this->db->quotes($var["ser_id"]);
		  
		  //echo $sql;
		  //die();
	       if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
	   }
	   
	   	  public function update_position($var){
	      //var_dump($var);
	      $sql="update cms_staff_positions set position_name=".$this->db->quotes($var["position_name"]);
		  $sql.=" where position_id=".$this->db->quotes($var["position_id"]);
		  
		  //echo $sql;
		  //die();
	       if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
	   }
		
	   public function get_servcie_by_id($id){
		  $sql="select * from cms_services where ser_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		  
		}
		
	   public function get_position_by_id($id){
		  $sql="select * from cms_staff_positions where position_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		  
		}
		
	   public function get_staff_by_id($id){
		  $sql="select * from cms_staff where staff_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		  
		}
		
	   public function getClientById($id){
		  $sql="select * from cms_clients where user_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		  
		}
		/*get all the country*/
		public function getall(){
		   $sql="select * from cms_branch";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
	   /*get branch by id*/
	   public function get_branch_by_id($id){
		   $sql="select * from cms_branch where bran_id=".$this->db->quotes($id);
		   //echo $sql;
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
	   
	   /*get all the services*/
		public function getallservices(){
		   $sql="select * from cms_services";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
	    /*get all the services*/
		public function getallpositions(){
		   $sql="select * from cms_staff_positions";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
	    /*get all the staff information*/
		public function getallstaff(){
		   $sql="select * from cms_staff order by family_name asc";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
		/*get all the client information*/
		public function getallclients(){
		   $sql="select * from cms_clients";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
		/*get staff via branch id*/
		public function getStaffByBranch($id){
		   $sql="select * from cms_staff where working_branch=".$this->db->quotes($id);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
		
		
		/*get all the branch schedule*/
		public function getbranchschedule(){
		  $sql="select * from cms_branch_schedule order by start desc";
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToArray($result);
		  return $result;
		}
		/*get schedule by id*/
		public function get_se_by_id($id){
		  $sql="select * from cms_branch_schedule where schedule_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		}
		
		/*get staff schedule by s_id*/
		public function get_ste_by_id($id){
		  $sql="select * from cms_staff_schedule where schedule_id=".$this->db->quotes($id);
		 // echo $sql;
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToArray($result);
		  return $result;
		}
		
		/*get staff by branch*/
		public function get_staff_by_bracnh($id){
		  $sql="select * from cms_staff where working_branch like '%".$id."%'";
		  //echo $sql;
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToArray($result);
		  return $result;
		}
}
?>