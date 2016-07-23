<?
  if(isset($plugin_view) && !empty($plugin_view)){
     include (PLUGIN_ROOT.$plugin_name."/view/$plugin_view.php");
  }else{
 ?>
   <div class="welcome">Welcom To Rocabee CMS</div>
 <?
  }
 ?>