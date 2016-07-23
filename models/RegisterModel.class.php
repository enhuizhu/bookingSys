<?
  class RegisterModel extends model{
     public $errors = array();
	 public function validLogin($var){
	    if($this->is_email_exist($var["email"])){
		   $this->errors["email"]="some person already register with this email account!";
		   return false;
		}
	     return true;
	 }

     public function is_email_exist($email){
	    $sql="select * from cms_clients where email=".$this->db->quotes($email);
		$result=$this->db->query($sql);
		$result=$this->db->fetchToRow($result);
		if(!empty($result)){
		   return true;
		}
		return false;
	 }
	 
	 /*get all the country*/
		public function getall(){
		   $sql="select * from cms_branch";
		   $result=$this->db->query($sql);
		   $result=$this->db->fetchToArray($result);
		   return $result;
		}
	 
	 public function addClient($var){
	   //var_dump($var);
	   $sql="insert into cms_clients (title,first_name,family_name,post_code,street,city,country,gender,home_phone,mobile_phone,email,branch_id,hear_from) values (";
	   $sql.=$this->db->quotes($var["title"]).",";
	   $sql.=$this->db->quotes($var["first_name"]).",";
	   $sql.=$this->db->quotes($var["family_name"]).",";
	   $sql.=$this->db->quotes($var["postcode"]).",";
	   $sql.=$this->db->quotes($var["street"]).",";
	   $sql.=$this->db->quotes($var["city"]).",";
	   $sql.=$this->db->quotes($var["country"]).",";
	   $sql.=$this->db->quotes($var["gender"]).",";
	   $sql.=$this->db->quotes($var["home_phone"]).",";
	   $sql.=$this->db->quotes($var["mobile_phone"]).",";
	   $sql.=$this->db->quotes($var["email"]).",";
	   $sql.=$this->db->quotes($var["branch"]).",";
	   $sql.=$this->db->quotes($var["hear_from"]).")";
	 
	   if($this->db->query($sql)){
	      return true;
	   }else{
	     $this->errors["sql_error"]=$this->db->mysqli->error;
		 return false;
	   }
	 
	 }
	 
	 public function sendMail($userinfo){
	     /*get all the postdata value*/
		$user_name=ucfirst($userinfo["title"])." ".$userinfo["family_name"];
		$user_email=$userinfo["email"];
		//$user_comment=$_REQUEST["user_comment"];
		
		$to="e.zhu@hjtenger.co.uk";
		$subject="Thank You for Registering with GinSen";
		$message='
		  <p>
		    Dear '.$user_name.'
		  </p>
		  <p>
		    Thank you for registering with GinSen.   Your login details are: '.$user_email.'.  
		  </p>
	      <p>
		    GinSen’s focuses on the prevention and treatment of disease using Traditional Chinese Medicine. We take the health of our clients extremely seriously. We know that our success is based on the quality and professionalism of our practice and guard our excellent reputation carefully.  
		  </p>
          <p>
		     We look forward to welcoming you soon. 
          </p>
          <p>
		    Yours sincerely
          </p>

          <p>
		    GinSen  –  Traditional Chinese Medicine<br>
Phone:      0207 586 7348<br>
Email:        info@ginsen-london.com<br>
Website:   www.ginsen-london.com<br>
Branches:  Swiss Cottage, King’s Road, Russell Square<br>
<a href="https://twitter.com/DrLily_GinSen">Twitter</a>&nbsp; <a href="https://www.facebook.com/GinSen.London?sk=wall">Facebook</a>
          </p>		  
		';
		
		
       // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to,$subject,$message,$headers);
		mail($user_email,$subject,$message,$headers);
		//echo $message;
	 
	 
	 }
	 
	 
  }
?>