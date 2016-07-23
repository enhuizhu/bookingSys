<?
  class PluginController extends controller{
     public function __construct(){
	    parent::Controller();
	    $this->plugincall();
	 }
	 
	 public function index($plugin){
	   // echo "plugin is $plugin";
		$this->loadPlugin($plugin);
	 }
	 
	 
	 public function loadPlugin($plugin){
	   require_once PLUGIN_ROOT.$plugin.'/controller/' . $plugin . 'Plugin.class.php';
	   $plg=$plugin."Plugin";
	   new $plg();
	  }
	 
  }

?>