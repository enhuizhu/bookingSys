<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/style.css"/>
<script language="javascript" src="<?=PLUG_IN?>jsscripts/drag.js"></script>
<script language="javascript" src="<?=PLUG_IN?>jsscripts/plugin.js"></script>
<?
if(!empty($errors)) 
{
show_errors($errors);
}
if(!empty($success)) show_success($success); 
?>
<script language="javascript">
 <?if($model=="update"):?>
  cat_info=new Array();
  <?foreach($cat_info as $key => $val):?>
     cat_info["<?=$key?>"]="<?=$val?>";
  <?endforeach;?>
   jQuery(document).ready(function(){
      jQuery("#pop_up").draggable();
    });
  
  function myconfirm(){
    cat_name=jQuery("input[name=cat_name]").val();
	if(cat_name!=cat_info["cat_name"]){
	  //display the popup in the center of the screen
	  pop_width=jQuery("#pop_up").css("width").replace("px","");
	  centerx=screen.width/2-pop_width/2;
	  pop_height=jQuery("#pop_up").css("height").replace("px","");
	  centery=screen.height/2-pop_height/2-200;
	  jQuery("#pop_up").css({"left":centerx,"top":centery});
      jQuery("#mask").show();
	  jQuery("#pop_up").show();
	  //alert(screen.width/2+","+pop_width/2)
	  return false;
	  }
	else return true;
   }

  function con_yes(){
      jQuery("#cat_form").submit();
   } 
   
  function con_no(){
      jQuery("#mask").hide();
	  jQuery("#pop_up").hide();
	  window.location.reload();
   }  
 <?endif;?>

 </script>

<div id="usercontainer">
 <form action="" enctype="multipart/form-data" method="post" id="cat_form" onsubmit="return myconfirm()">
 <input type="hidden" name="cat" value="cat">
 <input type="hidden" name="model" value="<?=$model?>">
   <div>
    Parent Category:
        <select name="parent_cat">
     <option value="0">Main Category</option>
	 <?for($i=0;$i<count($cats);$i++){?>
         <option value="<?=$cats[$i]["id"]?>" <?=($cats[$i]["id"]==$cat_info["parent_cat"]?"selected":"")?>><?=fullcat($cats[$i],$cats)?></option>
     <?}?>
      </select>
   </div>
   <div>
     Category name:&nbsp;&nbsp;<input type="text" name="cat_name" value="<?=isset($cat_info)?$cat_info["cat_name"]:""?>"/>&nbsp;
  </div>
  
  <div>
     Category image:&nbsp;<input type="file" name="cat_image">
	 <?if(isset($cat_info)&& !empty($cat_info["cat_image"])):?>
	 <img src="<?=SITE_URL."images/shopimg/catimg/".$cat_info["cat_image"]?>" width="100" height="100"/>
     <?endif;?>
  </div>
  
  <div id="user_sub">
     <input type="submit" value="submit">
  </div>
 </form>
</div>
<div id="mask"></div>	
<div id="pop_up">
  The products which within this category, will change category name as well, do you want to continue? 
  
 <div id="control_btn">
 <button onclick="con_yes()">Continue</button>
 <button onclick="con_no()">Cancel</button>
 </div>
</div>