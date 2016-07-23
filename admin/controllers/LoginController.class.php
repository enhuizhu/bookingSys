<?
  class LoginController extends controller{
     public $errors=array();
	 public function __construct(){
	    parent::Controller();
		$this->loadModel("Login");
		$countries=$this->model->Login->get_all_lang();
		$this->view->assign("countries",$countries);
		$this->runtimecall();
	 }
	 
	 public function index(){
	    
	   $this->view->display("login");
	 }
	 
	 public function login(){
	     $username=$_REQUEST["username"];
	     $password=$_REQUEST["pwd"];
		 $language=$_REQUEST["languages"];
		 if(empty($username)){
		    $this->errors[]="username can not be empty";
		 }
		 
         if(empty($username)){
		    $this->errors[]="password can not be empty";
		 }
		 
		 if(empty($language)){
		    $this->errors[]="please chose language!";
		 }
		 
		 if(count($this->errors)<=0){
		    if($this->auth->login($username,$password,$language)){
		    redirect("HomePage");
			die();
		   }else{
		    $this->errors[]="username or password wrong!";
		    $this->view->assign("errors",$this->errors);
		   }
		 }else{
		   $this->view->assign("errors",$this->errors);
		 }
		 
	    $this->view->display("login");
	}
	 
	 public function logout(){
        $this->auth->logout();
		$this->view->display("login");
	 }
}

?>