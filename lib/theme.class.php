<?
  class theme{
      public $theme_dir;
	  private $loby_dir;
	  function __construct(){
	     $this->theme_dir=BASE_URL."themes/".THEME."/";
		 $this->loby_dir=BASE_URL."Lobby/";
	  }
	  
	  function themePath($path=""){
	     return $this->theme_dir.$path;
	  }
	  
	  function lobbyPath($path=""){
	     return $this->loby_dir.$path;
	  }
	}
?>