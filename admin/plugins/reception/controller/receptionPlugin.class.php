<?  
 define("PLUG_IN",THEME_URL."plugins/reception/");
 class receptionPlugin extends controller{
  public $errors=array();    
  public $success;	 	 
  public function __construct(){        
   parent::Controller();		
   $this->loadPlugModel("reception");        
   $this->plugruntimecall();      
  }
   
   public function index(){
    $all_clients=$this->model->reception->get_all_clients();
	$all_products=$this->model->reception->get_all_products();
	//var_dump($all_products);
	$this->view->assign("all_clients",$all_clients);
	$this->view->assign("all_products",$all_products);
	$this->display("client_search");
   }   
   
   public function ajax_transaction(){
     $client_id=$_POST["user_id"];
     $items=$_POST["lists"];
	 //die("$client_id,$items");
     $items=json_decode($items,true);
	// var_dump($items);
	 //die();
     if($this->model->reception->add_to_transcation($client_id,$items)){
	     echo json_encode(array("error"=>false,"message"=>"New transaction has been added successfully"));
	 }else{
	     echo json_encode(array("error"=>true,"message"=>$this->model->reception->error));
	 }
   }
   
   
   public function view_transaction(){
      //echo "client id is:$client_id";
	  $client_id=$_POST["client_id"];
      $transactions=$this->model->reception->get_transcations($client_id);
	  echo json_encode($transactions);
	  //$this->view->assign("transactions",$transactions);
	  //$this->display("transaction");
   }
   
   public function display($page){
	 $this->view->assign("errors",$this->errors);
	 $this->view->assign("success",$this->success);	
     $this->view->plugdisplay($page);	  
 }
 
  public function test($client_id){
     echo $this->model->reception->get_branch_by_client_id($client_id);
  }

	 
}?>