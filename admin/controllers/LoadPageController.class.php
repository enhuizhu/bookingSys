<?
  class LoadPageController extends controller{
     public function __construct(){
	    parent::Controller();
	    $this->runtimecall();
	 }
	 
	 public function index(){
	    $this->show("home");
	 }
	 
	 public function show($page="home"){
         $this->view->assign("body",$page);
		 $this->view->display("load");
	 }
	 
	 public function fake($page="home"){
         $this->view->assign("body",$page);
		 $this->view->display("fake");
	 }
	 
  }

?>