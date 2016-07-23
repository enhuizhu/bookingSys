<?
  class controller{
     public $view;
	 public $theme;
	 public $autth;
	 public $current_lang;
	 public $bet;
	 public $lang=array();
	 public function Controller(){
	    $this->view=new view();
		$this->theme=new theme();
		$this->auth=new auth();
		$this->view->assign("theme",$this->theme);
		$this->view->assign("auth",$this->auth);
		$this->loadHelper("url");
		$this->loadHelper("error");
		$this->loadHelper("content");
		//$this->loadBetBoolean();
        $this->loadSiteLang();	    
	 }
	 

     
	 public function loadSiteLang(){
	   if(isset($_REQUEST["lang_select"]) && !empty($_REQUEST["lang_select"])){
	      if($_REQUEST["lang_select"]=="tr"){
		      $_REQUEST["lang_select"]="tk";
		  }
	      $this->current_lang=$_SESSION["current_lang"]=$_REQUEST["lang_select"];  
	   }else{
	      if(isset($_SESSION["current_lang"]) && !empty($_SESSION["current_lang"])){
		   $this->current_lang=$_SESSION["current_lang"];
		  }else{
		   $this->current_lang=DEFAULT_LANG;
		  }
	   }
	   $this->view->assign("current_lang",$this->current_lang);
	 }
	 
	 public function runtimecall(){
	    $uri=new uri();
		if(count($uri->segments)<=1){
	        $this->index();
		 }else{
		    $method=$uri->segments[1];
		    if(count($uri->segments)>2){
			   $parameters=array();
			   for($i=2;$i<count($uri->segments);$i++){
                     array_push($parameters,$uri->segments[$i]);
			   }
			call_user_func_array(array($this, $method),$parameters);
			}else{
			  $this->$method();
			}
		 }
		
	 }
	 
	 public function loadHelper($helper){
	    if(file_exists(DOC_ROOT."helpers/".$helper.".helper.php")){
		    require_once(DOC_ROOT."helpers/".$helper.".helper.php");
		}
	}
	
   public function loadModel($model){
	    if(file_exists(DOC_ROOT."models/".$model."Model.class.php")){
		    require_once(DOC_ROOT."models/".$model."Model.class.php");
			$model_class=$model."Model";
			$this->model->$model=new $model_class();
			//var_dump($this->model->Login);
			//$this->model->$model->passControllerObject($this);
		}else{
		    echo DOC_ROOT."models/".$model."Model.class.php";
		    die("$model doesn't exsit!");
		}
	}
	
	public function loadLang($langSection){
	   if(file_exists(DOC_ROOT."langs/".$this->current_lang."/lang.".$langSection.".php")){
	       require_once(DOC_ROOT."langs/".$this->current_lang."/lang.".$langSection.".php");
		   $this->lang[$langSection]=$lang[$langSection];
		   $this->view->assign("lang",$this->lang);
	   }
	}
  }

?>