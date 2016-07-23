<?
  class BookingModel extends model{
     public $errors = array();
	 public $success;
	 		/*get all the country*/
		public function getall(){
		   $sql="select * from cms_branch";
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
		
   
	    public function add_appointment($var,$client_id){
		  $booking_date=change_date_formate($var["booking_date"]);
		  $shcedule=$this->get_schedules($booking_date,$var["branch_id"]);
		  //var_dump($var);
		  //var_dump($shcedule);
		  
		  if(empty($shcedule)){
		     $this->errors["schedule_empty"] = "there no schedule for the date $booking_date";
		     return false;
		  }

		  /*select all the staff that is avilable on that date*/
		  //$this->get_all_staff_ids(,$booking_date,$var["service"],$var["app_time"]); 
	    	
          $schedule_id=$shcedule[0]["schedule_id"];
		  $booing_date=$booking_date;
		  $service=$var["service"];
		  $app_time=$var["app_time"];			
		  $sql="select * from cms_staff_schedule where schedule_id=".$this->db->quotes($schedule_id);
		  //echo $sql;
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToArray($result);
		  $b_arr=explode("-",$booing_date);
		  $b_date=mktime(0,0,0,$b_arr[1],$b_arr[2],$b_arr[0]);
		  $d_of_w=date("w",$b_date);
		  $d_in_db=d_in_db($d_of_w);
		  $avi_staff_ids=array();
          //var_dump($result);
		  /*check if the data avilable*/
		  foreach($result as $re){
             $staff_json_obj=json_decode($re["staff_schedule_val"],false);
            // echo "d in db is :$d_in_db<br>";			 
             //var_dump($staff_json_obj[$d_in_db]);
			 //echo "<br>";
			 $current_obj=json_decode(str_replace("'","\"",$staff_json_obj[$d_in_db]));
             $start=$current_obj->start;
		     $end=$current_obj->finish;
		     if($start!=0 && $end!=0){
			    array_push($avi_staff_ids,$re["staff_id"]);
			 }
		  }
		  
		  if(empty($avi_staff_ids)){
		    $this->errors["no_avilable_staff_on_date"]="$booing_date is not avilable";
			return false;
		  }
		  
		  $ids_str=implode(",",$avi_staff_ids);
		  $sql="select * from cms_staff where staff_id in (".$ids_str.")";
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToArray($result);
		  
		  $new_staff=array();
		  foreach($result as $re){
		     $skills=explode(",",$re["skills"]);
			 if(in_array($service,$skills)){
			    array_push($new_staff,$re);
			 }
		  }
		  
		  if(empty($new_staff)){
		     $this->errors["avilable_staff_no_skill"]="there is some staff avilable on $booing_date but they can not provide the service you require!";
		     return false;
		  }
		  
		  $booking_time =$app_time.":00:00";
		  $booking_time_stamp=$booing_date." ".$booking_time;
		  
		  foreach($new_staff as $staff){
		       if(!$this->appointment_exist($staff["staff_id"],$booking_time_stamp)){
                      $sql="insert into cms_appointments (staff_id,client_id,service_id,app_datetime) values (";
					  $sql.=$this->db->quotes($staff["staff_id"]).",";
					  $sql.=$this->db->quotes($client_id).",";
					  $sql.=$this->db->quotes($var["service"]).",";
					  $sql.=$this->db->quotes($booking_time_stamp).")";
					  if($this->db->query($sql)){
					    $branch=$this->get_branch_by_id($var["branch_id"]);
						$userinfo=$this->get_client_by_id($client_id);
			            $this->success="Your Appointment with ".$branch["bran_name"]." on $booking_time_stamp is confirmed.   We look forward to seeing you then.";
                        $this->sendMail($userinfo,$branch,$booking_time_stamp); 		
						return true;
					  }else{
					    $this->errors[]=mysqli_error($this->db->mysqli);
						return false;
					  }
					  break;
			   }			   
		  }
         
		  $this->errors["some_body_already_book"]="some body already book same service at $booking_time_stamp";
		  
		  return false;
		}
		
		public function appointment_exist($staff_id,$booking_time_stamp){
		    $sql="select * from cms_appointments where staff_id=".$this->db->quotes($staff_id);
			$sql.=" and app_datetime=".$this->db->quotes($booking_time_stamp);
			$result=$this->db->query($sql);
			$result=$this->db->fetchToArray($result);
			if(!empty($result)){
			   return true;
			}
			return false;
		}
		
	 	public function sendMail($userinfo,$branch,$booking_time_stamp){
	     /*get all the postdata value*/
		$user_name=ucfirst($userinfo["title"])." ".$userinfo["family_name"];
		$user_email=$userinfo["email"];
		//$user_comment=$_REQUEST["user_comment"];
		
		$to="e.zhu@hjtenger.co.uk";
		$subject="Confirmation of Appointment";
		$message='
		  <p>
		    Dear '.$userinfo["title"].' '.$userinfo["family_name"].'
		  </p>
		  <p>
		    Thank you for booking your appointment with GinSen.   We look forward to seeing you on '.$booking_time_stamp.' at our clinic in '.$branch["bran_name"].'
		  </p>
	      <p>
		    If for any reason you are unable to make this appointment, please telephone us on 0207 586 7348 or email us on info@ginsen-london.com.   Please note that there may be a charge for appointments cancelled at less than 24 hours notice   
		  </p>
          <p>
		    Yours sincerely
          </p>

          <p>
		    GinSen Traditional Chinese Medicine<br>
Phone:      0207 586 7348<br>
Email:        info@ginsen-london.com<br>
Website:   www.ginsen-london.com<br>
Branches:  Swiss Cottage, King\'s Road, Russell Square<br>
<a href="https://twitter.com/DrLily_GinSen">Twitter</a>&nbsp; <a href="https://www.facebook.com/GinSen.London?sk=wall">Facebook</a>
          </p>		  
		';
		
		
       // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to,$subject,$message,$headers);
		mail($user_email,$subject,$message,$headers);
		//echo $message;
	 
	 
	 }
	 
	    public function get_client_by_id($id){
		  $sql="select * from cms_clients where user_id=".$this->db->quotes($id);
		  $result=$this->db->query($sql);
		  $result=$this->db->fetchToRow($result);
		  return $result;
		}
	 
	 
		
		public function get_branch_by_id($id){
		   $sql="select * from cms_branch where bran_id=".$this->db->quotes($id);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToRow($result);
		   return $result;
		}
		
		
		public function get_schedules($booing_date,$branch_id){
		   $sql="select * from cms_branch_schedule where start<=".$this->db->quotes($booing_date)." and end>=".$this->db->quotes($booing_date)." and branch_id=".$this->db->quotes($branch_id);
		   //echo "\n".$sql."\n";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToAssoc($result);
		   return $result;
		}
		
		public function get_app_by_date($query_date){
		   $start_date=$query_date." 00:00:00";
		   $end_date=$query_date." 23:59:59";
		   $sql="select * from cms_appointments as a left join cms_clients as b on a.client_id=b.user_id where a.app_datetime>=".$this->db->quotes($start_date);
		   $sql.=" and a.app_datetime<=".$this->db->quotes($end_date);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToAssoc($result);
		   return $result;
		}
		
		
		public function get_all_staff_ids($branch_id,$service){
	      $sql="select * from cms_staff where working_branch like '%".$branch_id."%'";
          $result=$this->db->query($sql);
          $result=$this->db->fetchToAssoc($result);
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
       
       public function new_add_app($app_date,$client_id){
	      if(!isset($_SESSION["branch"]) || !isset($_SESSION["service"])){
		      redirect("Login/");
		      die();
		  }
		   /*chceck if the app date already in db*/
		    $sql="select * from cms_appointments where bran_id=".$this->db->quotes($_SESSION["branch"]["bran_id"]);
		    $sql.=" and app_datetime=".$this->db->quotes($app_date);
			$result=$this->db->query($sql);
			$result=$this->db->fetchToArray($result);
			$app_num=count($result);
			$can_book=false;
			if($app_num>0){
			   $staff_ids=$this->get_all_staff_ids($_SESSION["branch"]["bran_id"],$_SESSION["service"]);
			   if(count($staff_ids)>$app_num){
			      $can_book=true;
			   }
			}else{
			   $can_book=true;
			}
			
			if($can_book){
			    $booking_time_stamp=$app_date;
			    $sql="insert into cms_appointments (bran_id,client_id,service_id,app_datetime) values (";
					  $sql.=$this->db->quotes($_SESSION["branch"]["bran_id"]).",";
					  $sql.=$this->db->quotes($client_id).",";
					  $sql.=$this->db->quotes($_SESSION["service"]).",";
					  $sql.=$this->db->quotes($booking_time_stamp).")";
					  if($this->db->query($sql)){
					    $branch=$_SESSION["branch"];
						$userinfo=$this->get_client_by_id($client_id);
			            $this->success="Your Appointment with ".$branch["bran_name"]." on $booking_time_stamp is confirmed.   We look forward to seeing you then.";
                        $this->sendMail($userinfo,$branch,$booking_time_stamp); 		
						return true;
					  }else{
					    $this->errors[]=mysqli_error($this->db->mysqli);
						return false;
					  }
			    
			   
			}else{
			   $this->errors["fully_booked"]="$app_date has been fully booked";
			   return false;
			}
			
	   
	   }
	   
  }
?>