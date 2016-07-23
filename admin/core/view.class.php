<?
  class view{
     public $view_path;
	 public $vars=array();
	 public function __construct(){
	   $this->view_path=DOC_ROOT."themes/".THEME."/";
	 }
     
	 public function assign($var_name,$var_value){
	   $this->vars[$var_name]=$var_value;
	 }
	 
	 public function display($page){
	    $page_path=$this->view_path.$page.".php";
		extract($this->vars);
	    include $page_path;	
	}
	
     public function plugdisplay($page){
	    $page_path=$this->view_path."index.php";
		$this->vars["plugin_view"]=$page;
		extract($this->vars);
	    include $page_path;	
	 }
	 
  }

?>