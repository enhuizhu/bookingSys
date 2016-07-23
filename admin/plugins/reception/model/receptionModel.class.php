<?
 class receptionModel extends Model{
   public $errors=array();
   public $error;
   public function get_all_clients(){
     $sql="select * from cms_clients";
	 $result=$this->db->query($sql);
	 $result=$this->db->fetchToArray($result);
	 return $result;
   }
   
   public function get_all_products(){
     $sql="select *,a.id as 'aid', b.cat_name,b.parent_cat,b.cat_image from cms_turboshop_product as a left join cms_turboshop_cat as b on a.cat_id=b.id";
     $result=$this->db->query($sql);
     $result=$this->db->fetchToArray($result);
     return $result;	 
   }
   
   public function add_to_transcation($client_id,$items){
      /*filter empty item from items*/
      $mid_arr=array();
      foreach($items as $item){
         if($item != NULL){
		    array_push($mid_arr,$item);
		 }
	  }
	 if($this->update_product_quntity($client_id,$mid_arr)){
        $transaction_date=date("Y-m-d H:i:s");
        $sql="insert into cms_transaction (items,client_id,transaction_date) values (";
        $sql.=$this->db->quotes(json_encode($mid_arr)).","; 	 
        $sql.=$this->db->quotes($client_id).","; 	 
        $sql.=$this->db->quotes($transaction_date).")";
	 //echo $sql;
        if($this->db->query($sql)){
	      return true;
	    }else{
	      $this->error=mysqli_error($this->db->mysqli);
		  return false;
	    }
	 }else{
         return false;
	 }	 
     
   }
   
   public function update_product_quntity($client_id,$items){
       $branch_id=$this->get_branch_by_client_id($client_id);
	   foreach($items as $item){
          $sql="update cms_inventory set quntity=quntity-".$item["quntity"];
		  $sql.=" where branch_id=".$this->db->quotes($branch_id);
		  $sql.=" and item_id=".$this->db->quotes($item["id"]);
		  if(!$this->db->query($sql)){
		     $this->error=mysqli_error($this->db->mysqli);
			 return false;
		  }
	   }
       return true;	   
   }
   
   public function get_transcations($client_id){
     $sql="select * from cms_transaction where client_id=".$this->db->quotes($client_id);
	// echo $sql;
	 $result=$this->db->query($sql);
	 $result=$this->db->fetchToArray($result);
	 return $result;
   
   }
   
   public function get_branch_by_client_id($client_id){
     $sql="select * from cms_clients where user_id=".$this->db->quotes($client_id);
	 $result=$this->db->query($sql);
	 $result=$this->db->fetchToRow($result);
	 return $result["branch_id"];
   }
   
}
?>