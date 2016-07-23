<?
  class GlobalController extends controller{
     public function __construct(){
	    parent::Controller();
	    $this->loadLang("game");
		header('Content-type: text/javascript');
		$this->runtimecall();
	 }
	 
	 public function index(){
	   // echo "hello";
	    if(isset($_GET["client_id"]) && !empty($_GET["client_id"]) && isset($_GET["game_id"]) && !empty($_GET["game_id"])){
		   $this->view->assign("client_id",$_GET["client_id"]);
		   $this->view->assign("game_id",$_GET["game_id"]);
		}
	   
		$this->view->LobbyDisplay("okey/variable");
	 }
	 
	 public function loader(){
	    $this->view->LobbyDisplay("okey/loader");
	 }
	 
	
  }

?>