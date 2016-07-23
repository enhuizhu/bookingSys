<?
 class AboutusController extends controller{
     public function __construct(){
	    parent::Controller();
		$this->runtimecall();
	 }
	 
	 public function index(){
	    $this->view->assign("title","About Us");
		$this->view->assign("body","aboutus");
	    $this->view->display("index");
	 }
 }
?>