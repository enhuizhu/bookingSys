<?  
 class administratorPlugin extends controller{
  public $errors=array();    
  public $success;	 	 
  public function __construct(){        
    parent::Controller();		
    $this->loadPlugModel("admin");        
    $this->plugruntimecall();      
  }
  
  public function index(){
      if(isset($_GET["id"]) && !empty($_GET["id"])){
	      $this->model->admin->delete($_GET["id"]);
		  $this->success="admin has been delete successfully!";
	  }
      $this->view->assign("admins",$this->model->admin->get_all_admins()) ;
      $this->display("admin_manage");
  }
  
  public function add_admin(){
     if(isset($_GET["id"]) && !empty($_GET["id"])){
	    $this->view->assign("admin",$this->model->admin->getAdmin($_GET["id"]));
		$model="edit";
	 }else{
	   $model="add";
	 }
     if(isset($_POST["add_admin"]) && $_POST["add_admin"]==1){
	  if($model=="add"){
	    if($this->model->admin->validate($_POST)){
		   if($this->model->admin->add_admin($_POST)){
		      $this->success="admin has been added successfully!";
		   }else{
		      $this->errors=$this->model->admin->errors;
		   }
		}else{
		   $this->errors=$this->model->admin->errors;
		}
	  }else{
	     if(empty($_POST["password"]) || empty($_POST["cfpassword"])){
	      $this->errors["password"]="password can not be empty!";
	    }
	   if($_POST["password"]!=$_POST["cfpassword"]){
	      $this->errors["password_match"]="Two passwords must be same";
	   }
	    if(count($this->errors)<=0){
		   if($this->model->admin->edit_admin($_GET["id"],$_POST["password"])){
		      $this->success="password has been added successfully!";
		   }else{
		      $this->errors=$this->model->admin->errors;
		   }
		}
	  }
	 
	 }
	  
	  $this->view->assign("model",$model);
      $this->display("add_admin");
  }
   
  public function display($page){
	 $this->view->assign("errors",$this->errors);
	 $this->view->assign("success",$this->success);	
     $this->view->plugdisplay($page);
  }  
   
   
} 
   
?>