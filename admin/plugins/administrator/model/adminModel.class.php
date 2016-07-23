<?
  class adminModel extends Model{
     public $errors=array();
     public $error;
     public function validate($var){
       if(empty($var["admin"])){
	      $this->errors["admin"]="The name of admin can not be empty!";
	   }
	   
	    if(empty($var["password"]) || empty($var["cfpassword"])){
	      $this->errors["password"]="password can not be empty!";
	   }
	   
	   if($var["password"]!=$var["cfpassword"]){
	      $this->errors["password_match"]="Two passwords must be same";
	   }
	  
	  if(!preg_match("/.+@.+\..+/",$var["email"])){
	      $this->errors["email"]="invalid email!";
	   }
	   
	  if($this->is_exsit($var["admin"])){
	      $this->errors["admin_exsit"]="this admin alreday exsit!";
	  }
	   

	  if(count($this->errors)>0){
	      return false;
	  }
	  return true;
	}
	
	public function add_admin($var){
	   $sql="insert into cms_admin (admin,password,email) values (";
	   $sql.=$this->db->quotes($var["admin"]).",";
	   $sql.=$this->db->quotes($var["password"]).",";
	   $sql.=$this->db->quotes($var["email"]).")";
	   if($this->db->query($sql)){
	      return true;
	   }else{
	      $this->errors["mysql"]=mysqli_error($this->db->mysqli);
		  return false;
	   }
	}
	
	public function is_exsit($admin){
	   $sql="select * from cms_admin where admin=".$this->db->quotes($admin);
	   $result=$this->db->query($sql);
	   $result=$this->db->fetchToRow($result);
	   if(!empty($result)){
	       return true;
	   }else{
	       return false;
	   }
	}
	
	public function get_all_admins(){
	   $sql="select * from cms_admin";
	   $result=$this->db->query($sql);
	   $result=$this->db->fetchToArray($result);
	   return $result;
	}
	
	public function edit_admin($id,$password){
	   $sql="update cms_admin set password=".$this->db->quotes($password);
	   $sql.=" where id=".$this->db->quotes($id);
	   if($this->db->query($sql)){
	      return true;
	   }else{
	      $this->errors["mysql"]=mysqli_error($this->db->mysqli);
		  return false;
	   }
	}
	
	public function delete($id){
	   $sql="delete from cms_admin where id=".$this->db->quotes($id);
	   $this->db->query($sql);
	}
	
	public function getAdmin($id){
	   $sql="select * from cms_admin where id=".$this->db->quotes($id);
	   $result=$this->db->query($sql);
	   $result=$this->db->fetchToRow($result);
	   return $result;
	}
	
	
	
  }

?>