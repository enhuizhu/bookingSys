<?
 class PageNotFoundController extends controller{
     public function __construct(){
	   // echo "i am in construct of pagenotfound";
	    parent::Controller();
		header("HTTP/1.0 404 Not Found");
		$this->runtimecall();
	 }
	 
	 public function index(){
	    $this->view->assign("body","404");
		$this->view->display("index");
	 }
 }


?>