<?
  class LoginModel extends model{
     public $errors = array();
	 public function validLogin($var){
        if(empty($var["username"])){
		   $this->errors[]="username can not be empty!";
	 	}
	    if(empty($var["password"])){
		   $this->errors[]="password can not be empty!";
		}
	 
	 if(count($this->errors)>0){
	    return false;
	 }
	 return true;
   }
   
   public function volidate($client_id,$game_id){
      if(!$this->client_exsits($client_id)){
         $this->errors[]="This client does not exsits!";
	     return false;
	  }
	  
	  if(!$this->game_exsites($game_id)){
         $this->errors[]="This game does not exsits!";
	     return false;
	  }
	  
	  $sql="select * from cms_clients where client_id=".$this->db->quotes($client_id);
	  //echo $sql;
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToRow($result);
	  //var_dump($result);
	  $products_arr=explode(",",$result["products"]);
	  //var_dump($products_arr);
	  if(in_array($game_id,$products_arr)){
	     return true;
	  }else{
	     $this->errors[]="This client does not have this products.";
		 return false;
	  }
	  
	  
   }
   
   public function client_exsits($client_id){
      $sql="select count(*) as cn from cms_clients where client_id=".$this->db->quotes($client_id);
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToRow($result);
	  return $result["cn"]>0?true:false;
   }
   
   public function game_exsites($game_id){
      $sql="select count(*) as cn from cms_products where product_id=".$this->db->quotes($game_id);
	  $result=$this->db->query($sql);
	  $result=$this->db->fetchToRow($result);
	  return $result["cn"]>0?true:false;
   }
   
	 
  }
?>