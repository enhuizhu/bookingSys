<?  
 class staffPlugin extends controller{
  public $errors=array();    
  public $success;	 	 
  public function __construct(){        
   parent::Controller();		
   $this->loadPlugModel("staff");        
   $this->plugruntimecall();      
   }      	  
   
   public function index(){
     $all_services = $this->model->staff->getallservices();
	 $mid_arr=array();
	 foreach($all_services as $service){
	    $mid_arr[strval($service["ser_id"])]=$service;
	 }
	 
	 $all_branches=$this->model->staff->getall();
	 $bran_mid_arr=array();
	 foreach($all_branches as $branch){
	    $bran_mid_arr[$branch["bran_id"]]=$branch;
	 }
	 
	 $all_positions=$this->model->staff->getallpositions();
	 $pos_mid_arr=array();
	 foreach($all_positions as $position){
	    $pos_mid_arr[$position["position_id"]]=$position;
	 }
    
	 $all_staff_with_key=array();
	 $allstaffs=$this->model->staff->getallstaff();
	 foreach($allstaffs as $staff){
	    if(!isset($all_staff_with_key[$staff["position"]])){
		   $all_staff_with_key[$staff["position"]]=array();
		}
		array_push($all_staff_with_key[$staff["position"]],$staff);
	 }
	 $this->view->assign("all_services",$mid_arr);	 
     $this->view->assign("allstaffs_with_key",$all_staff_with_key);
	 $this->view->assign("all_branches",$bran_mid_arr);
	 $this->view->assign("all_positions",$pos_mid_arr);
	 $this->display("staff_manage");		
   }
   
   public function deleteRecord(){
      $table=$_REQUEST["tb"];
	  $id_name=$_REQUEST["in"];
	  $id_value=$_REQUEST["iv"];
	  if($this->model->staff->delete_record($table,$id_name,$id_value)){
	     $this->success="record has been deleted successfully";
	  }else{
	     $this->errors=$this->model->staff->errors;
	  }
	  $this->display("delete");
	  
	}
   
   public function ajax_client(){
      $client_id=$_REQUEST["client_id"];
	  $client_info=$this->model->staff->getClientById($client_id);
	  echo json_encode($client_info);
	}
   
   public function ajax_staff(){
      $staff_id=$_REQUEST["staff_id"];
	  $staff_info=$this->model->staff->get_staff_by_id($staff_id);
	  echo json_encode($staff_info);
   }
   
   public function editClient(){
      $client_id=$_REQUEST["client_id"];
	  if(isset($_POST["client"]) && !empty($_POST["client"])){
	     //var_dump($_POST);
		 //die($_POST);
		 if($this->model->staff->updateClient($client_id,$_POST)){
		     $this->success="client information has been updated seuccessfully";
		 }else{
		     $this->errors=$this->model->staff->errors;
		 }
	  }
	  
	  $client=$this->model->staff->getClientById($client_id);
	  //var_dump($client);
	  $this->view->assign("client",$client);
	  $all_branches=$this->model->staff->getall();
	  foreach($all_branches as $branch){
	    $bran_mid_arr[$branch["bran_id"]]=$branch;
	  }
	  $this->view->assign("all_branches",$bran_mid_arr);
	  $this->display("client");
   }
   
   public function manageClients(){
     $all_clients = $this->model->staff->getallclients();	 
	 $all_branches=$this->model->staff->getall();
	 $bran_mid_arr=array();
	 foreach($all_branches as $branch){
	    $bran_mid_arr[$branch["bran_id"]]=$branch;
	 }
     
	 $this->view->assign("all_sclients",$all_clients);	 
	 $this->view->assign("all_branches",$bran_mid_arr);
	 $this->display("clients_manage");		
   }
   
   public function appointment(){
   if(isset($_REQUEST["year"]) && !empty($_REQUEST["year"]) && isset($_REQUEST["month"]) && !empty($_REQUEST["month"])){
	    $current_year=$_REQUEST["year"];
	    $current_month=$_REQUEST["month"];
	}else{
	  	$current_year=date("Y");
	    $current_month=intval(date("m"));
	}
	/*get current month*/
    $appoints=$this->model->staff->getApps($current_year,$current_month);
	//var_dump($appoints);
	$this->view->assign("year",$current_year);
	$this->view->assign("month",$current_month);
	$this->view->assign("apps",$appoints);
	$this->display("apps");
	}
   
   public function addTimetable(){
     $all_branches=$this->model->staff->getall();
	 $bran_mid_arr=array();
	 foreach($all_branches as $branch){
	    $bran_mid_arr[$branch["bran_id"]]=$branch;
	 }
     
     if(isset($_POST["schedule_table"]) && !empty($_POST["schedule_table"])){
	    if(isset($_GET["model"]) && $_POST["model"]=="edit"){
		   $model="edit";
		}else{
		   $model="add";
		}
	    $staff_schedul_val=$this->model->staff->valid_schedule($_POST,$model);
	    if($staff_schedul_val !== false){
		    if($this->model->staff->add_new_schedule($staff_schedul_val,$model)){
			  $this->success=$this->model->staff->success;
			}else{
			  $this->errors=$this->model->staff->errors;
			}
		}else{
		    $this->errors=$this->model->staff->errors;
		}
		//var_dump($_POST);
	 }
   
   if(isset($_POST["schedule"]) && !empty($_POST["schedule"]) || isset($_POST["schedule_table"])){
	    /*get all staff from specific branch*/
		if(isset($_POST["branch"])){
		  $_SESSION["branch"]=$_POST["branch"];
		}
		$staffs =$this->model->staff->getallstaff();
		$staff_with_branch=array();
		foreach($staffs as $staff){
		  $branchs=explode(",",$staff["working_branch"]);
		  foreach($branchs as $branch){
		    if(!isset($staff_with_branch[$branch])){
			  $staff_with_branch[$branch]=array(); 
			}
			array_push($staff_with_branch[$branch],$staff);
		  }
		}	
	    if(empty($staffs)){
		  $this->errors["staff_empty"]=$bran_mid_arr[$_POST["branch"]]["bran_name"]." does not have any staff!";
		}else{
		  if(isset($_POST["start_date"])){
		   $_SESSION["start_date"]=$_POST["start_date"];
		  }
		  if(isset($_POST["end_date"])){
		   $_SESSION["end_date"]=$_POST["end_date"];
		  }
		  $this->view->assign("start_date",$_SESSION["start_date"]);
	      $this->view->assign("end_date",$_SESSION["end_date"]);
		  $this->view->assign("allstaffs",$staff_with_branch);
		}
	      $this->view->assign("branch_id",$_POST["branch"]);
	  }
      $this->view->assign("success",$this->success);
	  $this->view->assign("errors",$this->errors);
      $this->view->assign("all_branches",$bran_mid_arr);
      $this->display("add_schedule");
   }
   
   public function modify_schedule(){
      $s_id=$_SESSION["s_id"]=$_REQUEST["schedule_id"];
	  //echo "s_id:$s_id<br>";
	   if(isset($_POST["schedule_table"]) && !empty($_POST["schedule_table"])){
	   $model="edit";
	   $staff_schedul_val=$this->model->staff->valid_schedule($_POST,$model);
	    if($staff_schedul_val !== false){
		    if($this->model->staff->add_new_schedule($staff_schedul_val,$model)){
			  $this->success=$this->model->staff->success;
			}else{
			  $this->errors=$this->model->staff->errors;
			}
		}else{
		    $this->errors=$this->model->staff->errors;
		}
		//var_dump($_POST);
	 }
	  $schedule=$this->model->staff->get_se_by_id($s_id);
	  $branch=$this->model->staff->get_branch_by_id($schedule["branch_id"]);
      /*get all the staff in this branch*/
      $staffs=$this->model->staff->get_staff_by_bracnh($schedule["branch_id"]);
	  //var_dump($staffs);
	  $st_arr=array();
	  foreach($staffs as $staff){
	     $st_arr[$staff["staff_id"]]=$staff;
	  }
	  /*get all the staff schedule depend on $schedule*/
	  $staff_ses=$this->model->staff->get_ste_by_id($s_id);
	 // var_dump($staff_ses);
	  /*convert staff schedule as staff id associated*/
	  /*$stff_se_with_id=array();
	  foreach($staff_ses as $st_s){
	    $stff_se_with_id[$st_s["staff_id"]]=$st_s;
	  }*/
	  
	  $this->view->assign("schedule",$schedule);
	  $this->view->assign("branch",$branch);
	  $this->view->assign("staffs",$st_arr);
	  $this->view->assign("staff_ses",$staff_ses);
	  $this->display("modify");
	}
   
   public function manageTimetable(){
      /*get all the schedule which ordered by start date*/
	  $all_schedules=$this->model->staff->getbranchschedule();
	  $this->view->assign("all_schedules",$all_schedules);
	  /*get all the branch*/
	  $branches=$this->model->staff->getall();
	  $brachches_with_key=array();
	  foreach($branches as $branch){
	     $brachches_with_key[$branch["bran_id"]]=$branch;
	  }
	  $this->view->assign("branches",$brachches_with_key);
	  $this->display("manage_schedule");
   }
   
   public function addStaff(){
     if(isset($_GET["staff_id"]) && !empty($_GET["staff_id"])){
	   $model="update";
	   $_POST["staff_id"]=$_GET["staff_id"];
	 }else{
	   $model="add";
	 }
    
     if(isset($_POST["staff"]) && !empty($_POST["staff"])){
	   if($this->model->staff->validatestaff($_POST)){
	   
	      if($this->model->staff->add_new_staff($_POST,$model)){
		   
			if($model=="add"){
		      $this->success="New staff has been added successfully!";
		    }else{
			  $this->success="staff information has been updated successfully!";
			}
		  }else{
		       //echo "error has been update!";
		    $this->errors=$this->model->staff->errors;
		  }
	   }else{
	      $this->errors=$this->model->staff->errors;
	   }
	 }
   
   
     if($model=="update"){
	    $staff=$this->model->staff->get_staff_by_id($_GET["staff_id"]);
		$this->view->assign("staff",$staff);
	 }
	 $this->view->assign("model",$model);
     $this->view->assign("all_branches",$this->model->staff->getall());
     $this->view->assign("all_positions",$this->model->staff->getallpositions());
     $this->view->assign("all_services",$this->model->staff->getallservices());
     $this->display("add_staff");
   }

   public function addbranch(){
     if(isset($_GET["bran_id"]) && !empty($_GET["bran_id"])){
	   $model="update";
	   $_POST["bran_id"]=$_GET["bran_id"];
	 }else{
	   $model="add";
	 }
	 if(isset($_POST["branch"]) && !empty($_POST["branch"])){
	   if($this->model->staff->validate($_POST)){
	   
	      if($this->model->staff->add_new_branch($_POST,$model)){
		   
			if($model=="add"){
		      $this->success="New branch has been added successfully!";
		    }else{
			  $this->success="New branch has been updated successfully!";
			}
		  }else{
		       //echo "error has been update!";
		    $this->errors=$this->model->staff->errors;
		  }
	   }else{
	      $this->errors=$this->model->staff->errors;
	   }
	 }
	 
	 if($model=="update"){
	    $branch=$this->model->staff->get_branch_by_id($_GET["bran_id"]);
		$this->view->assign("branch",$branch[0]);
	 }
	// var_dump($this->success);
     $this->view->assign("model",$model);
	 $this->view->assign("success",$this->success);
	 $this->view->assign("errors",$this->errors);
	 $this->display("add_branch");
   }
   
    public function managebranch(){
	 $this->view->assign("all_branches",$this->model->staff->getall());
     $this->display("manage_branch");
   }
   
   
   public function addServices(){
      if(isset($_GET["ser_id"]) && !empty($_GET["ser_id"])){
	   $model="update";
	   $_POST["ser_id"]=$_GET["ser_id"];
	 }else{
	   $model="add";
	 }
	 if(isset($_POST["service"]) && !empty($_POST["service"])){
	   if($this->model->staff->validateservice($_POST)){
	   
	      if($this->model->staff->add_new_service($_POST,$model)){
		   
			if($model=="add"){
		      $this->success="New service has been added successfully!";
		    }else{
			  $this->success="New service has been updated successfully!";
			}
		  }else{
		       //echo "error has been update!";
		    $this->errors=$this->model->staff->errors;
		  }
	   }else{
	      $this->errors=$this->model->staff->errors;
	   }
	 }
	 
	 if($model=="update"){
	    $service=$this->model->staff->get_servcie_by_id($_GET["ser_id"]);
		$this->view->assign("service",$service);
	 }
	// var_dump($this->success);
     $this->view->assign("model",$model);
	 $this->view->assign("success",$this->success);
	 $this->view->assign("errors",$errors);
     $this->display("add_service");
   }
   
      public function addPostion(){
      if(isset($_GET["position_id"]) && !empty($_GET["position_id"])){
	   $model="update";
	   $_POST["position_id"]=$_GET["position_id"];
	 }else{
	   $model="add";
	 }
	 if(isset($_POST["position"]) && !empty($_POST["position"])){
	   if($this->model->staff->validateposition($_POST)){
	   
	      if($this->model->staff->add_new_position($_POST,$model)){
		   
			if($model=="add"){
		      $this->success="New service has been added successfully!";
		    }else{
			  $this->success="New service has been updated successfully!";
			}
		  }else{
		       //echo "error has been update!";
		    $this->errors=$this->model->staff->errors;
		  }
	   }else{
	      $this->errors=$this->model->staff->errors;
	   }
	 }
	 
	 if($model=="update"){
	    $service=$this->model->staff->get_position_by_id($_GET["position_id"]);
		$this->view->assign("service",$service);
	 }
	// var_dump($this->success);
     $this->view->assign("model",$model);
	 $this->view->assign("success",$this->success);
	 $this->view->assign("errors",$errors);
     $this->display("add_position");
   }
   
    public function manageServices(){
	  $this->view->assign("all_services",$this->model->staff->getallservices());
     $this->display("manage_services");
   }
   public function managePosition(){
	  $this->view->assign("all_positions",$this->model->staff->getallpositions());
     $this->display("manage_position");
   }
   
   /*management of branch business hours*/
   
	
	public function display($page){
	 $this->view->assign("errors",$this->errors);
	 $this->view->assign("success",$this->success);	
     $this->view->plugdisplay($page);	  
	 }

    public function test(){
       
	}	
	 
}?>