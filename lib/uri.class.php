<?
 class uri{
   
   public $segments= array();
   
   public function __construct(){
     $mid_array=explode("/", $_SERVER['REQUEST_URI']);
	 if(count($mid_array)>=2){
	  for($i=3;$i<count($mid_array);$i++){
	     if(!empty($mid_array[$i]))
         array_push($this->segments,$mid_array[$i]);
	  }
	  
	  /*delete request string from last uri segment*/
	  $last_index=count($this->segments)-1;
	  $pos=strpos($this->segments[$last_index],"?");
	  if($pos!==false){
	     $this->segments[$last_index]=substr($this->segments[$last_index],0,$pos);     
	     //echo "last element is:".$this->segments[$last_index];
	  }
	  if($this->segments[$last_index]==""){
	     unset($this->segments[$last_index]);
	  }
	  //var_dump($pos);
	  
	  
	 }
   }
   
   public function print_uri(){
     print_r($this->segments);
   }
     
}
?>