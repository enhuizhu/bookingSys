<?
  class LoginController extends controller{
     public $errors=array();
	 public function __construct(){
	    parent::Controller();
		$this->runtimecall();
	 }
	 
	 public function index(){
	 
	    if($this->auth->loged_in){
		   redirect("Booking/?brach_id=".$this->auth->userinfo["branch_id"]);
		}
	 
	    if(isset($_POST["login_form"]) && !empty($_POST["login_form"])){
		   if($this->auth->login($_POST["email"])){
		      if(isset($_SESSION["app_date"])){
			   redirect("booking/add_app/?app_date=".$_SESSION["app_date"]);
			  }else{
			   redirect("Booking/?brach_id=".$this->auth->userinfo["branch_id"]);
		      }
		   }else{
		      //die("login error");
		      $this->errors["Login"]="This user does not exist!";
		   }
		}
	 
	    $this->view->assign("errors",$this->errors);
		$this->view->assign("body","login");
		$this->view->display("index");
		
		
     }
	 
	 public function logout(){
	    $this->auth->logout();
	    redirect("Login");
	}
	
	public function test(){
	   var_dump($this->model->Login->errors);
	}
}

?>