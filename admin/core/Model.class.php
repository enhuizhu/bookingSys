<?
   class model{
      public $db;
	  public function model(){
	     $this->db = new Database;
	  }
	  
	   public function passControllerObject($object) {
		//need a function to build array of objects in this class and keep them if they are passed thoruoght he controller also
		$disallowed_objects = array('controller', 'model', 'view', 'register');
		var_dump($object);
		/*foreach($object as $k => $v) {
			if(!in_array(strtolower($k), $disallowed_objects) || $k == get_class($this)) {
				$this->$k = $v;
			}
		}*/
	}
   
   }

?>