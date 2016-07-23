<?
  class GlobalController extends controller{
     public function __construct(){
	    parent::Controller();
	    header('Content-type: text/javascript');
		$this->runtimecall();
	 }
	 
	 public function index(){
	   // echo "hello";
		$this->view->display("global");
	 }
	 
	 public function loader(){
	    $this->view->display("loader");
	 }
	 
	
  }

?>