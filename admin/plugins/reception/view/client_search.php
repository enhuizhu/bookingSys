<link rel="stylesheet" type="text/css" href="<?=PLUG_IN?>css/reception.css"/>
<div id="tablewrapper">		
		<div id="tableheader">
        	<div class="search">
                <select id="columns2" onchange="sorter2.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter2.search('query')" />
            </div>
            <span class="details">
				<div>Records <span id="startrecord2"></span>-<span id="endrecord2"></span> of <span id="totalrecords2"></span></div>
        		<div><a href="javascript:sorter2.reset()">reset</a></div>
        	</span>
        </div>
<table class="common tinytable" id="client">
   <thead>
   <tr>
      <th class="nosort"><h3>Client Id</h3></th>
      <th><h3>Medical Record No</h3></th>
      <th><h3>First Name</h3></th>
      <th><h3>Family Name</h3></th>
      <th><h3>Post Code</h3></th>
      <th><h3>Email</h3></th>
      <th><h3>Home Phone</h3></th>
      <th><h3>Mobile Phone</h3></th>
      <th><h3>Sell Products</h3></th>
      <th><h3>View Transactions</h3></th>
   </tr>
  </thead>
  <tbody>
  <?foreach($all_clients as $client):?>
   <tr>
     <td><?=$client["user_id"]?></td>
     <td><?=$client["record_no"]?></td>
     <td><?=$client["first_name"]?></td>
     <td><?=$client["family_name"]?></td>
     <td><?=$client["post_code"]?></td>
     <td><?=$client["email"]?></td>
     <td><?=$client["home_phone"]?></td>
     <td><?=$client["mobile_phone"]?></td>
     <td><a href="javascript:void(0)" class="small_text" data-info='<?=json_encode($client)?>' onclick="sell_product(<?=$client["user_id"]?>,this)"> Sell Product</a></td>
	 <td><a href="javascript:void(0)" class="small_text" onclick="view_transaction(<?=$client["user_id"]?>)"> view Transactions</a></td>
   </tr>
  <?endforeach;?>
  </tbody>
</table>
        <div id="tablefooter">
          <div id="tablenav2">
            	<div>
                    <img src="<?=PLUG_IN?>/css/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter2.move(-1,true)" />
                    <img src="<?=PLUG_IN?>/css/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter2.move(-1)" />
                    <img src="<?=PLUG_IN?>/css/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter2.move(1)" />
                    <img src="<?=PLUG_IN?>/css/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter2.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown2"></select>
				</div>
                <div>
                	<a href="javascript:sorter2.showall()">view all</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
                    <select onchange="sorter2.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entries Per Page</span>
                </div>
                <div class="page">Page <span id="currentpage2"></span> of <span id="totalpages2"></span></div>
            </div>
        </div>
</div>
<?include "pop_up_form.php"?>
<?include "transaction_form.php";?>
<script language="javascript">
  function plugin_url(path){
     return "<?=plugins_action_url("reception")?>/"+path;
  }
  
  	var sorter2 = new TINY.table.sorter('sorter2','client',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns2',
		currentid:'currentpage2',
		totalid:'totalpages2',
		startingrecid:'startrecord2',
		endingrecid:'endrecord2',
		totalrecid:'totalrecords2',
		hoverid:'selectedrow',
		pageddid:'pagedropdown2',
		navid:'tablenav2',
		sortcolumn:1,
		sortdir:1,
		sum:[8],
		avg:[6,7,8,9],
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
</script>
<script language="javascript" src="<?=PLUG_IN?>js/shopping_cart_class.js"></script>
<script language="javascript" src="<?=PLUG_IN?>js/reception.js"></script>


