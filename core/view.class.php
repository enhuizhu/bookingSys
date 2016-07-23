<?
  class view{
     public $view_path;
	 private $lobby_path;
	 public $vars=array();
	 public function __construct(){
	   $this->view_path=DOC_ROOT."themes/".THEME."/";
	   $this->lobby_path=DOC_ROOT."Lobby/";
	 }
     
	 public function assign($var_name,$var_value){
	   $this->vars[$var_name]=$var_value;
	 }
	 
	 public function display($page){
	    $page_path=$this->view_path.$page.".php";
		extract($this->vars);
	    include $page_path;	
	}
	
	public function LobbyDisplay($page){
	    $page_path=$this->lobby_path.$page.".php";
		extract($this->vars);
	    include $page_path;	 
	}
	 
  }

?>