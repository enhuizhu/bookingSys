<?
  class DisplayPageController extends controller{
     public function __construct(){
	    parent::Controller();
	    $this->runtimecall();
	 }
	 
	 public function index(){
	    $this->show("home");
	 }
	 
	 public function show($page="home"){
	     switch($page){
		    case "terms":
			  $title="Terms & Conditions";
			  break;
			case "faq":
			  $title="FAQ";
			  break;
			case "response":
			  $title="Responsible Gaming";
			  break;
			case "aboutus":
			  $title="About us";
			  break;
			default:
			   $title=$page;
			   break;
		 }
	 
	     $this->view->assign("title",$title);
	     $this->view->assign("body",$page);
		 $this->view->display("index");
	 }
	 
	 public function reqular($page="support"){
	    switch($page){
		    case "terms":
			  $title="Terms & Conditions";
			  break;
			case "faq":
			  $title="FAQ";
			  break;
			case "response":
			  $title="Responsible Gaming";
			  break;
			case "aboutus":
			  $title="About us";
			  break;
			default:
			   $title=$page;
			   break;
		 }
		 
		 $this->view->assign("title",$title);
		 $this->view->assign("page",$page);
	     $this->view->assign("body","template");
		 $this->view->display("index");
	 }
	 
  }

?>