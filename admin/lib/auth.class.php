<?
  class auth{
     public $loged_in;
	 public $db;
	 public $userinfo=array();
	 public function __construct(){
	    $this->db=new Database;
		$this->check_login();
	 }
	 
	 public function check_login(){
	    if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])){
		    $username=base64_decode($_REQUEST["username"]);
		    $password=base64_decode($_REQUEST["password"]);
			if(isset($_REQUEST["lang_select"])){
			   $language=$_REQUEST["lang_select"];
			}else{
			   $language=DEFAULT_LANG;
			}
			$this->login($username,$password,$language);
		}else if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
		   $this->loged_in=true;
		   $this->userinfo=$_SESSION["userinfo"];
		}else{
		   $this->loged_in=false;
		}
	 }
	 
	 public function login($username, $password,$language){
	    $sql = "select * from cms_admin where admin=".$this->db->quotes($username);
	    $sql.= " and password=".$this->db->quotes($password);
		$result=$this->db->query($sql);
		$result=$this->db->fetchToAssoc($result);
		if(!empty($result)){
		  $result[0]["current_lang"]=$language;
		  $this->userinfo=$_SESSION["userinfo"]=$result[0];
		  $this->loged_in=$_SESSION["login"]=true;
		  return true;
		}else{
		  $this->loged_in=$_SESSION["login"]=false;
		  return false;
		}
	 }
	 
	 public function logout(){
	    $this->userinfo=$_SESSION["userinfo"]=array();
		$this->loged_in=$_SESSION["login"]=false;
	 }
}

?>