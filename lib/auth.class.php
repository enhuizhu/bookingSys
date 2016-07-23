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
	    if(isset($_SESSION["game_login"]) && $_SESSION["game_login"]==true){
		   $this->loged_in=true;
		   $this->userinfo=$_SESSION["game_userinfo"];
		}else{
		   $this->loged_in=false;
		}
	 } 
	 
	 public function login($email){
	    $sql = "select * from cms_clients where email=".$this->db->quotes($email);
		$result=$this->db->query($sql);
		$result=$this->db->fetchToRow($result);
		if(!empty($result)){
		  $this->userinfo=$_SESSION["game_userinfo"]=$result;
		  $this->loged_in=$_SESSION["game_login"]=true;
		  return true;
		}else{
		  $this->loged_in=$_SESSION["game_login"]=false;
		  return false;
		}
	 }
	 
	 public function logout(){
	    $this->userinfo=$_SESSION["game_userinfo"]=array();
		$this->loged_in=$_SESSION["game_login"]=false;
	 }
}

?>