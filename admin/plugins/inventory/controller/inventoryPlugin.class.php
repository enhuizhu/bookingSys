<?php
include_once("config.php");
include_once("cats.php");
class inventoryPlugin extends controller {
	public $current_lang;
    public $errors=array();
	public $success;
    function __construct() {
        parent::Controller();		
        $this->loadPlugModel("Turboshop");
        $this->view->assign('page_title', "Inventory");
		$this->view->assign('plugin_url',THEME_URL."plugins/inventory/");        
        $this->plugruntimecall();  
   }

	public function index(){
		        // die("hello");
				 $cats=$this->model->Turboshop->list_cat();
				 $this->view->assign("cats",$cats);
				 $this->display("list_cats");
	}


	public function manage_Turboshop(){
	    $cats=$this->model->Turboshop->list_cat();
	    $this->view->assign("cats",$cats);
        if(isset($_GET["del"])&&!empty($_GET["del"])){
	      if(!$this->model->Turboshop->del_cat($_GET["del"])){
		    $this->errors=$this->model->Turboshop->errors;
			$cats=$this->model->Turboshop->list_cat();
		    $this->view->assign("cats",$cats);
           }else{
		    $cats=$this->model->Turboshop->list_cat();
		    $this->view->assign("cats",$cats);
		    $this->success=$this->model->Turboshop->success;
          }		   
		}
		$this->display("list_cats");
	}

	public function add_Turboshop(){
	   	ini_set('display_errors',1);
	    error_reporting(E_ALL);
	   $cats=$this->model->Turboshop->list_cat();
	   $this->view->assign("cats",$cats);
	   if(isset($_GET["edit"]) && !empty($_GET["edit"])){
	      $id=$_GET["edit"];
		  $cat_info=$this->model->Turboshop->cat_info($id);
		  $model="update";
		  $this->view->assign("cat_info",$cat_info);
	   }else{
	       $model="add";
	   }
	   $this->view->assign("model",$model);
	  if(isset($_POST["cat"])&& !empty($_POST["cat"])){
         if(empty($_POST["cat_name"])){
		     $this->errors[]="The name of catogories can not be empty!";
		    }
		  /*if(!isset($_FILES["cat_image"]["name"])){
		     $this->errors[]="please chose the image to upload.";
             }*/
        /*if(!eregi('image/', $_FILES["cat_image"]["type"]) && $model=="add"){
		      $this->errors[]="The type of the image is not right! it must be image.";
		   }*/
		  if(empty($this->errors)){
		   if($_POST["model"]=="add"){
		     if($this->model->Turboshop->addcat($_POST)){
			     $this->success=$this->model->Turboshop->success;
				 $cats=$this->model->Turboshop->list_cat();
	             $this->view->assign("cats",$cats);
				 $this->display("list_cats");
			 }else{
			     $this->errors=$this->model->Turboshop->errors;
			     $this->display("view");	  
			 }}else{
			 
			 if($this->model->Turboshop->updateCat($_POST,$id)){
			     $this->success=$this->model->Turboshop->success;
				 $id=$_GET["edit"];
		         $cat_info=$this->model->Turboshop->cat_info($id);
		         $model="update";
		         $this->view->assign("cat_info",$cat_info);
			 }else{
			     $this->errors=$this->model->Turboshop->errors;
              }			  
			  $this->display("view");	
			 
		   }
			}else{
			   $this->display("view");
			}
		 }else{
		$this->display('view');
	}    
	}

   public function add_product(){

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

       $cats=$this->model->Turboshop->list_cat();
       $this->view->assign("cats",$cats);
	   if(isset($_GET["edit"]) && !empty($_GET["edit"])){
	      $id=$_GET["edit"];
		  $pro_info=$this->model->Turboshop->pro_info($id);
		  $model="update";
		  $this->view->assign("pro_info",$pro_info);
	   }else{
	       $model="add";
	   }
	   $this->view->assign("model",$model);
	    if(isset($_POST["cat"])&& !empty($_POST["cat"])){
		  //start validating $_POST
		  //var_dump($_POST);
           /*if(empty($_POST["brand"])){
             $this->errors[]="please input the name of the brand";
			 //echo "empty brand!";
			 }*/
           if(empty($_POST["nam"])){
             $this->errors[]="please input the name of the product";
			 }
		  /* if(empty($_POST["info"])){
             $this->errors[]="please input the detail of the product";
			 }*/
           if($_POST["price"]==""){
             $this->errors[]="please input the price of the product";
			 }
		   /*if(!isset($_FILES["file"]["name"])){
		     $this->errors[]="please chose the image to upload.";
             }*/
			
			if(count($this->errors)>0){
			   $this->display("products");
			  return false;
			}

	
		    if($_POST["model"]=="add"){
		     if($this->model->Turboshop->addproduct($_POST)){
			    $this->success=$this->model->Turboshop->success;
				$this->view->assign("current_cat",$_POST["Category"]);
				$products=$this->model->Turboshop->getproducts($_POST["Category"]);
				$this->view->assign("products",$products);
				$this->display("list_products");
				return;
			 }else{
			     $this->errors=$this->model->Turboshop->errors;
			     $this->display("products");
				return;
				 }
		    }else{
			  if($this->model->Turboshop->updateProduct($_POST,$_GET["edit"])){
			    $this->success=$this->model->Turboshop->success;
               }else{
			    $this->errors=$this->model->Turboshop->errors;
			   }
               	$pro_info=$this->model->Turboshop->pro_info($id);
		        $this->view->assign("model","update");
		        $this->view->assign("pro_info",$pro_info);		   
			    $this->display("products");
				return;
			}  
		    
		 }
	      $this->display("products");
	 }
	public function display($page){
	 $this->view->assign("errors",$this->errors);
	 $this->view->assign("success",$this->success);	
     $this->view->plugdisplay($page);	  
	 }
	public function toogle_vis(){
	  $id=$_REQUEST["id"];
	  $this->model->Turboshop->toogle_vis($id);
	}
	public function test(){
	   var_dump($this->model->Turboshop->get_cat_name(1));
	}
	public function getproducts(){
	   	error_reporting(E_ALL);
       ini_set('display_errors', '1');
	   //die("here is get products!");
	   $cats=$this->model->Turboshop->list_cat();
       $this->view->assign("cats",$cats);
	   if(isset($_GET["del"])&&!empty($_GET["del"])){
	      if(!$this->model->Turboshop->delpro($_GET["del"])){
		  $this->errors=$this->model->Turboshop->errors;
          }	else{
		  $this->success=$this->model->Turboshop->success;
          }		  
		}
	
      if(isset($_GET["cat"])&&!empty($_GET["cat"])){
	   $_SESSION["cat_name"]=$_GET["cat"];
	   $products=$this->model->Turboshop->getproducts($_GET["cat"]);
	   $this->view->assign("current_cat",$_GET["cat"]);
	  }	
		
	  if(isset($_POST["cat_name"])&&!empty($_POST["cat_name"])){
	   $_SESSION["cat_name"]=$_POST["cat_name"];
	   //var_dump($_POST["cat_name"]);
	   $products=$this->model->Turboshop->getproducts($_POST["cat_name"]);
	   //var_dump($products);
	   
	   $this->view->assign("current_cat",$_POST["cat_name"]);
	   
	  }else{
	   if(isset($_SESSION["cat_name"])&&!empty($_SESSION["cat_name"])){
	    $products=$this->model->Turboshop->getproducts($_SESSION["cat_name"]);
		$this->view->assign("current_cat",$_SESSION["cat_name"]);
	   }else{
	    $products=$this->model->Turboshop->getproducts("all");
		$this->view->assign("current_cat","all");
	    }
	   }
	   $this->view->assign("products",$products);
	   $this->display("list_products");
	}
	
	public function branch_inventory(){
	   $branchs=$this->model->Turboshop->get_all_branches();
	   $this->view->assign("branchs",$branchs);
	   $this->display("branch_inventory");
	}
	
	public function get_branch_invetory($bran_id){
	   $products=$this->model->Turboshop->get_all_products($bran_id);
	   $branchs=$this->model->Turboshop->get_all_branches();
	   $this->view->assign("branchs",$branchs);
	   $this->view->assign("branchm",$this->model->Turboshop->get_bran_by_id($bran_id));
	   $this->view->assign("bran_id",$bran_id);
	   //var_dump($products);
	   $this->view->assign("products",$products);
	   $this->display("branch_inventory");
   }
	
   public function ajax_update_inventory(){
       $item_id=$_POST["item_id"];
	   $branch_id=$_POST["branch_id"];
	   $quntity=$_POST["quntity"];
	   if($this->model->Turboshop->update_inventory_itme($item_id,$branch_id,$quntity)){
	      echo json_encode(array("error"=>false,"quntity"=>$quntity));
	   }else{
	      echo json_encode(array("error"=>true,"message"=>$this->model->Turboshop->error));
	   }
     }
	 
	public function ajax_update_order(){
       $item_id=$_POST["product_id"];
	   $branch_id=$_POST["branch_id"];
	   $quntity=$_POST["quntity"];
	   $total_price=$_POST["total_price"];
	   $order_date=$_POST["order_date"];
	   //die("$item_id,$branch_id,$quntity,$total_price,$order_date");
	   //return false;
	   if($this->model->Turboshop->update_inventory_order($item_id,$branch_id,$quntity,$total_price,$order_date)){
	      echo json_encode(array("error"=>false,"message"=>"new order has been made successfully!"));
	   }else{
	      echo json_encode(array("error"=>true,"message"=>$this->model->Turboshop->error));
	   }
     }
	 
	public function ajax_update_order_list(){
        $order_date=$_POST["order_date"];
		$branch_id=$_POST["branch_id"];
		$items=$_POST["items"];
		$items=json_decode($items,true);
		/*filter empty order*/
		$mid_arr=array();
		foreach($items as $item){
		 if($item !=NULL){  
		  $item_id=$item["id"];
		  $quntity=$item["quntity"];
		  $total_price=$item["total_price"];
		  if(!$this->model->Turboshop->update_inventory_order($item_id,$branch_id,$quntity,$total_price,$order_date)){
		      echo json_encode(array("error"=>true,"message"=>$this->model->Turboshop->error));
		      return false;
		   }
		  }
		}
		 echo json_encode(array("error"=>false,"message"=>"new order has been made successfully!"));
		 return true;
	}	
	 
	 
	public function inventory_order($bran_id){
	   $branchs=$this->model->Turboshop->get_all_branches();
	   $this->view->assign("bran_id",$bran_id);
	   $this->view->assign("branchs",$branchs);
	   $this->display("inventory_order");
	}
	
	public function search_order($bran_id){
	   $branchs=$this->model->Turboshop->get_all_branches();
	   $this->view->assign("bran_id",$bran_id);
	   $this->view->assign("branchs",$branchs);
	   $orders=$this->model->Turboshop->get_all_order($bran_id);
	  // var_dump($orders);
	   $this->view->assign("products",$orders);
	   $this->view->assign("model","search");
	   $this->display("inventory_order");
	}
	
	
	public function make_order($bran_id){
	   $products=$this->model->Turboshop->getproducts("all");
	   $branchs=$this->model->Turboshop->get_all_branches();
	   $this->view->assign("products",$products);
	   $this->view->assign("bran_id",$bran_id);
	   $this->view->assign("branchs",$branchs);
	   $this->view->assign("model","order");
	   $this->display("inventory_order");
	}

   
   public function test2(){
	  var_dump ($this->model->Turboshop->getproducts(11));
   }
  
   public function test3(){
          error_reporting(E_ALL);
     ini_set('display_errors', '1');
     $this->model->Turboshop->testxsl();
   }

}
?>