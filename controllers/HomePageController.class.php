<?
 class HomePageController extends controller{
     public function __construct(){
	    parent::Controller();
		$this->runtimecall();
	 }
	 
	 public function index(){
       redirect("Booking/");
	 }
 }
?>