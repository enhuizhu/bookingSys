<?
  class TestController extends controller{
     public function __construct(){
	    parent::Controller();
	    $this->runtimecall();
	 }
	 
	 public function index(){
	    echo "session is:";
		var_dump($_SESSION["login"]);
	 }
	 
	 public function test($id,$id2){
	     echo "this is test method";
		 echo "hello the world".$id.$id2;
		 //echo "id is:".$id;
	 }
  
  }

?>