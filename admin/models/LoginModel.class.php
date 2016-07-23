<?
  class LoginModel extends Model{      public function get_all_lang(){	     $sql="select * from cms_country";		 $result=$this->db->query($sql);		 $result=$this->db->fetchToArray($result);		 return $result;	  }
  }
?>