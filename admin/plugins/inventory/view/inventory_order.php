<?
$action_list=array();
foreach($branchs as $branch){
  $action_list[$branch["bran_id"]]=$branch["bran_name"];
  if($branch["bran_id"]==$bran_id){
     $select_branch=$branch["bran_name"];
  }
}
plugin_sub_header("inventory/inventory_order",$action_list); 
?>
<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/turboshop.css"/>
<?if(isset($bran_id)&&!empty($bran_id)):?>
<?include "global_js.php"?>
 <br>
 <?
  $action_list=array();
  $action_list["search_order/".$bran_id]="Search Order";
  $action_list["make_order/".$bran_id]="Make Order";
  plugin_sub_header("inventory",$action_list); 
?>
<br>
<h3><?=$select_branch?></h3>
<br>
<?if(isset($products)&&!empty($products)):?>
<div id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div><a href="javascript:sorter.reset()">reset</a></div>
        	</span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable common" style="width:99%">
            <thead>
                <tr>
                    <th>
   <?if($model=="order"):?>
  <h3 class="nosort">Product Id</h3>
 <?else:?>
  <h3 class="nosort">Order Id</h3>
 <?endif;?>
</th>
<th><h3>Product Name</h3></th>
<th><h3>Catgory Name</h3></th>
<?if($model=="order"):?>
 <th><h3>Make Order</h3></th>
<?elseif($model=="search"):?>
 <th><h3>Quntity</h3></th>
 <th><h3>Total Price</h3></th>
 <th><h3>Order Date</h3></th>
<?endif;?>
                </tr>
            </thead>
            <tbody>
                <?foreach($products as $product):?>
  <tr>
     <td>
	  <?if($model=="order"):?>
	   <?=$product["id"]?>
	  <?else:?>
	   <?=$product["order_id"]?>
	  <?endif;?>
	 </td> 
     <td><?=$product["name"]?></td> 
     <td><?=$product["cat_name"]?></td>
<?if($model=="order"):?>
     <td>
	    <a href="javascript:void(0)" data-info='<?=json_encode($product)?>' onclick="make_order(<?=$product["id"]?>,this)">Make Order</a>
	 </td>
<?else:?>
      <td><?=$product["quntity"]?></td>
      <td><?=$product["total_price"]?></td>
      <td><?=$product["order_date"]?></td>
<?endif;?>
  </tr>
<?endforeach;?>
            </tbody>
        </table>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                     <img src="<?=$theme->themePath("css/images/first.gif")?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="<?=$theme->themePath("css/images/previous.gif")?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="<?=$theme->themePath("css/images/next.gif")?>" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="<?=$theme->themePath("css/images/last.gif")?>" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">view all</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
                    <select onchange="sorter.size(this.value)">
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
	var sorter = new TINY.table.sorter('sorter','table',{
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
	  
   <?if($model=="order"):?>
     <?include "order_list.php"?>
   <?endif;?>
<?endif;?>
<?else:?>
  <div class="note"> 
    Please chose one branch!
  </div>
<?endif;?>
<?include "pop_up.php"?>
<?include "order_form.php"?>

