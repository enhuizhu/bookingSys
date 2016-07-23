<?
 class BookingController extends controller{
     public $errors=array();
	 public $success;
	 public function __construct(){
	     error_reporting(E_ALL);
       ini_set('display_errors', '1');
	   date_default_timezone_set('Europe/London');
	    parent::Controller();
		$this->loadModel("Booking");
		$this->loadHelper("booking");
		$this->runtimecall();
	 }
	 
	 public function index(){
	  $branches=$this->model->Booking->getall();
	  $brachches_with_key=array();
	  foreach($branches as $branch){
	     $brachches_with_key[$branch["bran_id"]]=$branch;
	  }
	  
	  if(isset($_REQUEST["brach_id"]) && !empty($_REQUEST["brach_id"])){
		   $brach_id=$_REQUEST["brach_id"];
		   $booking_page="branch_booking";
           $this->view->assign("brach",$brachches_with_key[$brach_id]["bran_name"]);	
		   $this->view->assign("services",$this->model->Booking->getallservices());
           $this->view->assign("branch_id",$brach_id);		   
		}else{
		   $this->view->assign("branches",$brachches_with_key);
		   $booking_page="booking";
		}
		
		if(isset($_POST["appointment"]) && $_POST["appointment"]==1){
		   if($this->model->Booking->add_appointment($_POST,$this->auth->userinfo["user_id"])){
			      $this->success=$this->model->Booking->success;
			   }else{
			      $this->errors=$this->model->Booking->errors;
			   }
		}
		$this->view->assign("errors",$this->errors);
		$this->view->assign("success",$this->success);
		$this->view->assign("body",$booking_page);
		$this->view->display("index");
     }
	 
	 public function serviceTime(){
	    if(isset($_POST["branch_id"])){
		  $service_id=$_POST["service"];
		  $branch_id=$_POST["branch_id"];
		}else{
		  die("plase select a branch");
		}
	
		$branch = $this->model->Booking->get_branch_by_id($branch_id);
		$this->view->assign("branch",$branch);
		$this->view->assign("service",$service_id);
		$this->view->assign("body","appCalendar");
		$this->view->display("index");
		//die(var_dump($_POST));
	}
	
	public function ajax_schedule(){
	   $week_num=$_POST["week_num"];
	   echo weekSchedule($week_num,$_SESSION["branch"],$_SESSION["service"]);
	}
	
	
	public function add_app(){
	   $app_date=$_GET["app_date"];
       if($this->auth->loged_in){
	    if($this->model->Booking->new_add_app($app_date,$this->auth->userinfo["user_id"])){
            $this->success=$this->model->Booking->success;
	    }else{
		   $this->errors=$this->model->Booking->errors;
	    }
	   }else{
	     $_SESSION["app_date"]= $app_date;
		 redirect("Login");
	   }
        
		$this->view->assign("errors",$this->errors);
		$this->view->assign("success",$this->success);
		$this->view->assign("body","appResult");
		$this->view->display("index");   	   
	
	}
	 
	 
	 public function ajax_time(){
       	 $date=$_REQUEST["date"];
		 $service=$_REQUEST["service"];
		 $date=change_date_formate($date);
		 $exsiting_app=$this->model->Booking->get_app_by_date($date);
		 $unavilable_time=array();
		 /*get appointment time*/
		 if(!empty($exsiting_app)){
		  //var_dump($exsiting_app);
		  /*get all staff id*/
		  $allStaffs=$this->model->Booking->get_all_staff_ids($this->auth->userinfo["branch_id"],$service);
          $times_key=array();
		  foreach($exsiting_app as $app){
		    $date_time_arr=explode(" ",$app["app_datetime"]);
			$app_time=explode(":",$date_time_arr[1]);
			$app_time_hours=$app_time[0];
            if(!isset($times_key[$app_time_hours])){
			   $times_key[$app_time_hours]=array();
			}
			array_push($times_key[$app_time_hours],$app["staff_id"]);
		    /*get all the staff that */   
		  }
	  
		  foreach($times_key as $k => $v){
		      $difs=array_diff($allStaffs,$v);
			  if(empty($difs)){
			    array_push($unavilable_time,$k);
			  }
		  }
		}

	   echo json_encode($unavilable_time);
    }
	
	public function test(){
	   $apps=$this->model->Booking->get_app_by_date("2013-05-03");
	   var_dump($apps);
	   echo "<br>";
	   
	   $staff=$this->model->Booking->get_all_staff_ids(2,2);
	   var_dump($staff);
	}
	
 }


?>