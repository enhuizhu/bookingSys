<?
//echo "this is sidebar!";
/*include plugin section file*/
//var_dump($method);

if(isset($plugin_name) && !empty($plugin_name)){
  include (PLUGIN_ROOT.$plugin_name."/sections.php");
?>
 <table class="side_bar_table">
 <tr>
  <th>
    <div class="plug_title">
	<?=$section[$plugin_name]["section_title"]?>
    </div>
  </th>
 </tr>
 <?foreach($section[$plugin_name]["categories"] as $k => $v):?>
 <tr>
    <td>
	
	  <a href="<?=SITE_URL."Plugin/$plugin_name/$k"?>" class="item<?=$method==$k?" active":""?>"><?=$v?></a>
	 
	 </td>
 </tr>
 <?endforeach;?> 
 </table> 
<?  
}else{
  echo "some tips";
}
?>