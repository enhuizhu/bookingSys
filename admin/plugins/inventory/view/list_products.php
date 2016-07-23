<?
if(!empty($errors)) 
{
//var_dump($errors);
show_error($errors);
}
?>
<?
if(!isset($current_cat)){
 $current_cat="all";
}
//var_dump($products);
?>
<script language="javascript">
<!--
jQuery(document).ready(function(){
 jQuery(".is_visible").click(function(){
    id=jQuery(this).attr("id");
	jQuery.ajax({
	type:"POST",
	url:"<?=THEME_URL."index.php/Plugin/inventory/toogle_vis"?>",
	data:"id="+id,
	beforeSend: function() {
       jQuery("#"+id).html("processing....");
	   //alert("start")
     },
	success: function(data){
	  jQuery("#"+id).html(data);
	  //alert(data);
	  }
	  });
  })
});
/*
function ex(){
 jQuery("#1").html("success");
}*/
function del_pro(id){
  window.location.href="<?=THEME_URL."index.php/Plugin/inventory/getproducts?del="?>"+id;
}
function edit(id){
  window.location.href="<?=THEME_URL."index.php/Plugin/inventory/add_product?edit="?>"+id; 
}
//-->
</script>
<script language="javascript" src="<?=PLUG_IN?>jsscripts/turboshop.js"></script>
<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/turboshop.css"/>
<!--<input type="button" value="html()" onclick="ex()"/>//-->
<form action="<?=THEME_URL."index.php/Plugin/inventory/getproducts"?>" method="post" id="cat_form">
<select name="cat_name" onchange="changecat()">
<option value="all" <?=($current_cat=="all"?"selected":"")?>>all</option>
<?for($i=0;$i<count($cats);$i++){?>
   <option value="<?=$cats[$i]["id"]?>" <?=($current_cat==$cats[$i]["id"]?"selected":"")?>><?=fullcat($cats[$i],$cats)?></option>
<?}?>
</select>
</form>
<div id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter3.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter3.search('query')" />
            </div>
            <span class="details">
				<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div><a href="javascript:sorter3.reset()">reset</a></div>
        	</span>
        </div>
<table id="product_table" class="tinytable common">
<thead>
<tr>
<th><h3>ID</h3></th><th><h3>Category Id</h3></th><th><h3>Brand</h3></th><th><h3>Name</h3></th><th><h3>Product Detail</h3></th><th><h3>Price</h3></th><th><h3>Cost Price</h3></th><th><h3>Image</h3></th><th><h3>toogle visible</h3></th> 	
<th><h3 class="nosort">Delete</h3></th><th><h3 class="nosort">Edit</h3></th>
</tr>
</thead>
<tbody>
<?for($i=0;$i<count($products);$i++):?>
<tr>
<td><?=$products[$i]["id"]?></td>
<td><?=$products[$i]["cat_name"]?></td>
<td><?=$products[$i]["brand"]?></td>
<td><?=$products[$i]["name"]?></td>
<td>
  <div id="pro">
    <a href="#"><?=substr($products[$i]["info"],0,20)?>...
     <div id="pro_detail">
        <?=$products[$i]["info"]?>
     </div>
	</a>
  </div>
   
</td>
<td><?=$products[$i]["price"]?></td>
<td><?=$products[$i]["cost_price"]?></td>
<td>
  <?
   // var_dump($pro_info["image"]);
  if(empty($products[$i]["image"])){
     $img=$plugin_url."resources/css/images/no_image.png";
  }else{
     $img=SITE_URL."images/shopimg/proimg/".$products[$i]["image"];
  }
  ?>

  <img src="<?=$img?>" width="50" height="50">

</td>

<td>
<div class="is_visible" id="<?=$products[$i]["id"]?>">
 <?=$products[$i]["is_visible"]?>
</div>
 </td>
<td><a href="javascript:void(0)" onclick="del_pro(<?=$products[$i]["id"]?>)">Delete</a></td>
<td><a href="javascript:void(0)" onclick="edit(<?=$products[$i]["id"]?>)">edit</td>
</tr>
<?endfor;?>
</tbody>
</table>
     <div id="tablefooter">
          <div id="tablenav">
            	<div>
                     <img src="<?=$theme->themePath("css/images/first.gif")?>" width="16" height="16" alt="First Page" onclick="sorter3.move(-1,true)" />
                    <img src="<?=$theme->themePath("css/images/previous.gif")?>" width="16" height="16" alt="First Page" onclick="sorter3.move(-1)" />
                    <img src="<?=$theme->themePath("css/images/next.gif")?>" width="16" height="16" alt="First Page" onclick="sorter3.move(1)" />
                    <img src="<?=$theme->themePath("css/images/last.gif")?>" width="16" height="16" alt="Last Page" onclick="sorter3.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter3.showall()">view all</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
                    <select onchange="sorter3.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entries Per Page</span>
                </div>
                <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
        </div>
</div>
	<script type="text/javascript">
	var sorter3 = new TINY.table.sorter('sorter3','product_table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		sum:[8],
		avg:[6,7,8,9],
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>