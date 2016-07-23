<?
  class theme{
      public $theme_dir;
	  function __construct(){
	     $this->theme_dir=THEME_URL."themes/".THEME."/";
	  }
	  
	  function themePath($path=""){
	     return $this->theme_dir.$path;
	  }
	}
?>