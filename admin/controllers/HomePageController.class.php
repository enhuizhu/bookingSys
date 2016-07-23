<?
 class HomePageController extends controller{
     public function __construct(){
	    parent::Controller();
		$this->runtimecall();
	 }
	 
	 public function index(){
	   /* $this->view->assign("title","New Games");
		$this->view->assign("body","home");
	    $this->view->display("index");
	 */
	   redirect("Plugin/staff/");
	 }
 }
?>    