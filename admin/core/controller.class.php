<?
  class controller{
     public $view;
	 public $theme;
	 public $auth;
	 public $model;
	 public $current_lang;
	 public $uri;
	 public function Controller(){
	    $this->view=new view();
		$this->theme=new theme();
		$this->auth=new auth();
	    $this->view->assign("theme",$this->theme);
		$this->view->assign("auth",$this->auth);
		$this->loadCurrentLang();
		$this->loadHelper("url");
		$this->loadHelper("plugin");
		$this->loadHelper("error");
		$this->uri=new uri();
	   }
	   
	  public function loadCurrentLang(){
	     if($this->auth->loged_in){
		     $this->current_lang=$this->auth->userinfo["current_lang"];
			 $this->view->assign("current_lang", $this->current_lang);
		 }
	  }
	   
      public function runtimecall(){
		if(isset($this->uri->segments[0]) && $this->uri->segments[0]!="Login" || !isset($this->uri->segments[0])){
		   if(!$this->auth->loged_in){
		      redirect("Login");
			  die();
		   }
		}
		if(count($this->uri->segments)<=1){
	        $this->index();
		 }else{
		    $method=$this->uri->segments[1];
		    if(count($this->uri->segments)>2){
			   $parameters=array();
			   for($i=2;$i<count($this->uri->segments);$i++){
                     array_push($parameters,$this->uri->segments[$i]);
			   }
			call_user_func_array(array($this, $method),$parameters);
			}else{
			  $this->$method();
			}
		 }
		
	 }
	 
	 public function plugincall(){
	    if(isset($this->uri->segments[0]) && $this->uri->segments[0]!="Login" || !isset($this->uri->segments[0])){
		   if(!$this->auth->loged_in){
		      redirect("Login");
			 // echo "redirect to login!";
			  die();
		   }
		}
	    //$uri=new uri();
		if(count($this->uri->segments)<=1){
	        $this->index();
		 }else{
		    $method="index";
			//var_dump($uri->segments);
		    if(count($this->uri->segments)>=2){
			   $parameters=array();
			   for($i=1;$i<count($this->uri->segments);$i++){
                     array_push($parameters,$this->uri->segments[$i]);
			   }
			   //var_dump($parameters);
			call_user_func_array(array($this, $method),$parameters);
			}else{
			  $this->$method();
			}
		 }
		
	 }
	 
	 public function plugruntimecall(){
	    	    //$uri=new uri();
		$this->view->assign("plugin_name",$this->uri->segments[1]);
		$this->view->assign("current_plugin",$this->uri->segments[1]);
		if(count($this->uri->segments)<=2){
	        $method="index";
			$this->view->assign("method",$method);
			$this->index();
		 }else{
		    $method=$this->uri->segments[2];
			$this->view->assign("method",$method);
		    if(count($this->uri->segments)>3){
			   $parameters=array();
			   for($i=3;$i<count($this->uri->segments);$i++){
                     array_push($parameters,$this->uri->segments[$i]);
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
	
    public function loadPlugModel($model){
	    $plugin_name=$this->uri->segments[1];
	    if(file_exists(PLUGIN_ROOT.$plugin_name."/model/".$model."Model.class.php")){
		    require_once(PLUGIN_ROOT.$plugin_name."/model/".$model."Model.class.php");
			$model_class=$model."Model";
			$this->model->$model=new $model_class();
			//var_dump($this->model->Login);
			//$this->model->$model->passControllerObject($this);
		}else{
		    echo PLUGIN_ROOT.$plugin_name."/model/".$model."Model.class.php";
		    die("$model doesn't exsit!");
		}
	}
  }

?>