<?
  class RegisterController extends controller{
     public $errors=array();
	 public $success=false;
	 public function __construct(){
	    parent::Controller();
		$this->loadModel("Register");
		$this->runtimecall();
	 }
	 
	 public function index(){
	    if($this->auth->loged_in){
		   redirect("Booking/?brach_id=".$this->auth->userinfo["branch_id"]);
		}
	    if(isset($_POST["register"]) && $_POST["register"]==1){
            if($this->model->Register->validLogin($_POST)){
			   if($this->model->Register->addClient($_POST)){
			     $this->success=true;
				 $this->auth->login($_POST["email"]);
				 $this->view->assign("auth",$this->auth);
			     $this->model->Register->sendMail($this->auth->userinfo);
				}else{
			     $this->errors=$this->model->Register->errors;
			    }
			}else{
			  $this->errors=$this->model->Register->errors;
			}
		}		
	    $this->view->assign("branches",$this->model->Register->getall());
		$this->view->assign("errors",$this->errors);
	    $this->view->assign("success",$this->success);
        $this->view->assign("body","register");
		$this->view->display("index");
     }
	 
	 public function testmail(){
	    $this->model->Register->sendMail($this->auth->userinfo);
	 }
	 
	
}

?>