<?
 class TestController extends controller{
     public function __construct(){
        date_default_timezone_set('Europe/London');
	    parent::Controller();
        $this->loadHelper("booking");
		$this->runtimecall();
	 }
	 
	 public function index(){
         /*TEST WEEK DAY*/
	    echo "week day test (2013-09-09):<br>";
		echo get_week_day("2013-09-09")."<br>";
		echo "avilable staff on 2013-05-20 swiss cottage, and have skill Acupuncture:";
		print_r(get_avilabe_staff("2013-05-02",16,1));
		echo "<br>";
		echo "test is avilable app:<br>";
		var_dump(is_avilable_app("2013-05-02 10:00:00",1,2));
		
		
		
	 }
 }


?>