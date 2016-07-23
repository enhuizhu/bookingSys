<?
   class staffModel extends Model{
       public $errors=array();
       public function validate($var){
	      if(strlen($var["country_code"])!=2){
		    $this->errors[]= "The length of country code must be two!";
		  }
		  
		  if(empty($var["country_name"])){
		     $this->errors[]= "Language can not be empty!";
		  }
		  
		  //echo "errors numb:".count($this->errors);
		  if(count($this->errors)>0){
		     return false;
		  }else{
		    return true;
		  }
	   }
	   
	   public function add_new_country($var){
	      /*check if the country already exsist*/
	      //var_dump($var);
		  //return true;
		  if($this->isexists($var["country_code"])){
		     $this->errors[]="This Language already exists!";
			 return false;
		  }else{
		     $sql= "insert into cms_country (country_code, country_name) values (";
		     $sql.= $this->db->quotes($var["country_code"]).",";
		     $sql.= $this->db->quotes($var["country_name"]).")"; 
			 if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
		  }
	   }
	   
	   public function update_country($var){
	      //var_dump($var);
	      $sql="update cms_country set country_name=".$this->db->quotes($var["country_name_up"]);
		  $sql.=" where id=".$this->db->quotes($var["contry_id"]);
	       if($this->db->query($sql)){
                return true;
			 }else{
			    $this->errors[]=mysqli_error($this->db->mysqli);
				return false;
			 }
	   }
	   
	   public function isexists($country_code){
	       $sql="select count(*) as cn from cms_country where country_code=".$this->db->quotes($country_code);
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToRow($result);
		   return $result["cn"]>0?true:false;
		}
		
		
		/*get all the country*/
		public function getall(){
		   $sql="select * from cms_country";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
}
?>