<?
  class Plugin{
     
	 public function Plugin(){
	    $this->view=new view();
		$this->theme=new theme();
		$this->view->assign("theme",$this->theme);
	 }
	 
	 public function runtimecall(){
	    $uri=new uri();
		$this->view->assign("plugin_name",$uri->segments[1]);
		$this->view->assign("current_plugin",$uri->segments[1]);
		if(count($uri->segments)<=2){
	        $this->index();
		 }else{
		    $method=$uri->segments[2];
			$this->view->assign("method",$method);
		    if(count($uri->segments)>3){
			   $parameters=array();
			   for($i=3;$i<count($uri->segments);$i++){
                     array_push($parameters,$uri->segments[$i]);
			   }
			 call_user_func_array(array($this, $method),$parameters);
			}else{
			  $this->$method();
			}
			
		 }
	 }
   }

?>