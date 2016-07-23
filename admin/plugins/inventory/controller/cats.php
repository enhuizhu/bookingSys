<?
function catparent($cat=null,$cats){
  if($cat["parent_cat"]==0){
    return "/Main Category/".$cat["cat_name"];
  }else{
   for($i=0;$i<count($cats);$i++){
       if($cats[$i]["id"]==$cat["parent_cat"]){
             //$path=catparent($cats[$i]["parent_cat"])."/".$cats[$i]["parent_cat"];
	           return catparent($cats[$i],$cats)."/".$cat["cat_name"];
			 //break;
	  }
	 
    }
  }
}

function fullcat($cat,$cats){
   return catparent($cat,$cats);
  }
?>