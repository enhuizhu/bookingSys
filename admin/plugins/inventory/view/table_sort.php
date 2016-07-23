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
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                    <th class="nosort"><h3>Product Id</h3></th>
                    <th><h3>Product Name</h3></th>
                    <th><h3>Category Name</h3></th>
                    <th><h3>Price</h3></th>
                    <th><h3>Operation</h3></th>
                </tr>
            </thead>
            <tbody>
               <?foreach($all_products as $product):?>
			   <tr>
			      <td><?=$product["aid"]?></td>
			      <td><?=$product["name"]?></td>
			      <td><?=$product["cat_name"]?></td>
			      <td>&pound;<?=$product["price"]?></td>
			      <td><a href="javascript:void(0)" data='<?=json_encode($product)?>' class="add_to_cart" onclick="add_to_list(this)">Add to list</a></td>
			   </tr>
			   <?endforeach;?>
            </tbody>
        </table>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                    <img src="<?=PLUG_IN?>/css/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="<?=PLUG_IN?>/css/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="<?=PLUG_IN?>/css/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="<?=PLUG_IN?>/css/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
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
	<script type="text/javascript" src="<?=PLUG_IN?>js/script.js"></script>
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