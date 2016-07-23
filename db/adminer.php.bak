<?php
/** Adminer - Compact MySQL management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://php.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
*/error_reporting(6135);$vd=(!ereg('^(unsafe_raw)?$',ini_get("filter.default"))||ini_get("filter.default_flags"));if($vd){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$b){$Fd=filter_input_array(constant("INPUT$b"),FILTER_UNSAFE_RAW);if($Fd){$$b=$Fd;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEQAAAAAAERExAAAAARERExEAABERMREzMQABExMRERMRAAExMRETMRAAATERERMRAAABExERExAAAAETERExEAAAATERETERERARMRETESESEBMTETESEREQExEzESEREhETMxEREhERIREREAARISIRAAAAAAERERD/4z8A/wM/APgDAADAAwAAgAMAAIAHAACADwAAgB8AAIAfAACAAQAAAAEAAAABAAAAAAAAAAAAAAcAAAD/gQAA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css");echo'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:.8em 0;}form{margin:0;}table{margin:1em 20px .8em 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{margin-bottom:1em;border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:0 .5em .5em 0;border:1px solid #999;}p{margin:0 20px 1em 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tr:hover td,tr:hover th{background:#ddf;}.version{color:#777;font-size:67%;}.js .hidden{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:0 20px 1em 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript");?>
document.body.className='js';function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days,params){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date+(params||'');}
function verifyVersion(){cookie('adminer_version=0',1);var script=document.createElement('script');script.src='https://adminer.svn.sourceforge.net/svnroot/adminer/trunk/version.js';document.body.appendChild(script);}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
function formUncheck(id){document.getElementById(id).checked=false;}
function formChecked(el,name){var checked=0;var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^(table|a|input)$/i.test(el.tagName)){return;}
el=el.parentNode;}
el=el.firstChild.firstChild;el.click&&el.click();el.onclick&&el.onclick();}
function selectAddRow(field){var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[[0-9]+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function bodyLoad(version){var jushRoot='https://jush.svn.sourceforge.net/svnroot/jush/trunk/';var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank"';jush.urls.sql[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';jush.urls.sqlset[0]=jush.urls.sql[0];jush.urls.sqlstatus[0]=jush.urls.sql[0];jush.style(jushRoot+'jush.css');jush.highlight_tag('pre',0);jush.highlight_tag('code');}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}
function selectValue(select){return select.value||select.options[select.selectedIndex].text;}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
var added='.',rowCount;function reEscape(s){return s.replace(/[\[\]\\^$*+?.(){|}]/,'\\$&');}
function idfEscape(s){return'`'+s.replace(/`/,'``')+'`';}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var table=reEscape(field.value);var column='';var match;if((match=/(.+)_(.+)/.exec(table))||(match=/(.*[a-z])([A-Z].*)/.exec(table))){table=match[1];column=match[2];}
var plural='(?:e?s)?';var tabCol=table+plural+'_?'+column;var re=new RegExp('(^'+idfEscape(table+plural)+'\\.'+idfEscape(column)+'$'
+'|^'+idfEscape(tabCol)+'\\.'
+'|^'+idfEscape(column+plural)+'\\.'+idfEscape(table)+'$'
+')|\\.'+idfEscape(tabCol)+'$','i');var candidate;for(var i=opts.length;i--;){if(opts[i].value.substr(0,1)!='`'){if(i==opts.length-2&&candidate&&!match[1]&&name=='fields[1]'){return false;}
break;}
if(match=re.exec(opts[i].value)){if(candidate){return false;}
candidate=i;}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/([0-9]+)(\.[0-9]+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');for(var i=0;i<spans.length-1;i++){row.removeChild(spans[i]);}
var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddColumn(field){var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[[0-9]+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange=function(){};}
var that,x,y,em,tablePos;function schemaMousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var isTop=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';isTop=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-[0-9]+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(isTop){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(isTop?-1:1)*shift)/em+'em';}
lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
cookie('adminer_schema='+encodeURIComponent(s.substr(1)),30,'; path="'+location.pathname+location.search+'"');}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;}}exit;}if(!isset($_SERVER["REQUEST_URI"])){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"].($_SERVER["QUERY_STRING"]!=""?"?$_SERVER[QUERY_STRING]":"");}@ini_set("session.use_trans_sid",false);if(!ini_get("session.auto_start")){session_name("adminer_sid");$ub=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"));if(version_compare(PHP_VERSION,'5.2.0')>=0){$ub[]=true;}call_user_func_array('session_set_cookie_params',$ub);session_start();}if(get_magic_quotes_gpc()){$va=array(&$_GET,&$_POST,&$_COOKIE);while(list($e,$b)=each($va)){foreach($b
as$ea=>$r){unset($va[$e][$ea]);if(is_array($r)){$va[$e][stripslashes($ea)]=$r;$va[]=&$va[$e][stripslashes($ea)];}else{$va[$e][stripslashes($ea)]=($vd?$r:stripslashes($r));}}}unset($va);}if(function_exists("set_magic_quotes_runtime")){set_magic_quotes_runtime(false);}@set_time_limit(0);$lb="2.3.2";function
connection(){global$d;return$d;}function
idf_escape($Ga){return"`".str_replace("`","``",$Ga)."`";}function
idf_unescape($Ga){return
str_replace("``","`",$Ga);}function
escape_string($b){global$d;return
substr($d->quote($b),1,-1);}function
bracket_escape($Ga,$ee=false){static$xd=array(':'=>':1',']'=>':2','['=>':3');return
strtr($Ga,($ee?array_flip($xd):$xd));}function
h($Q){return
htmlspecialchars($Q,ENT_QUOTES);}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
checkbox($h,$q,$da,$sd="",$ud=""){static$U=0;$U++;$g="<input type='checkbox' name='$h' value='".h($q)."'".($da?" checked":"").($ud?" onclick=\"$ud\"":"")." id='checkbox-$U'>";return($sd!=""?"<label for='checkbox-$U'>$g".h($sd)."</label>":$g);}function
optionlist($Kb,$de=null,$kd=false){$g="";foreach($Kb
as$ea=>$r){if(is_array($r)){$g.='<optgroup label="'.h($ea).'">';}foreach((is_array($r)?$r:array($ea=>$r))as$e=>$b){$g.='<option'.($kd||is_string($e)?' value="'.h($e).'"':'').(($kd||is_string($e)?(string)$e:$b)===$de?' selected':'').'>'.h($b);}if(is_array($r)){$g.='</optgroup>';}}return$g;}function
html_select($h,$Kb,$q="",$Wa=true){if($Wa){return"<select name='".h($h)."'".(is_string($Wa)?" onchange=\"$Wa\"":"").">".optionlist($Kb,$q)."</select>";}$g="";foreach($Kb
as$e=>$b){$g.="<label><input type='radio' name='".h($h)."' value='".h($e)."'".($e==$q?" checked":"").">".h($b)."</label>";}return$g;}function
get_vals($m,$ja=0){global$d;$g=array();$f=$d->query($m);if($f){while($a=$f->fetch_row()){$g[]=$a[$ja];}}return$g;}function
unique_array($a,$w){foreach($w
as$s){if(ereg("PRIMARY|UNIQUE",$s["type"])){$g=array();foreach($s["columns"]as$e){if(!isset($a[$e])){continue
2;}$g[$e]=$a[$e];}return$g;}}$g=array();foreach($a
as$e=>$b){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$e)){$g[$e]=$b;}}return$g;}function
where($D){$g=array();foreach(array("where","null")as$V){foreach((array)$D[$V]as$e=>$b){$e=bracket_escape($e,"back");$g[]=(preg_match('~^[A-Z0-9_]+\\(`(?:[^`]|``)+`\\)$~',$e)?$e:idf_escape($e)).($V=="null"?" IS NULL":(ereg('\\.',$b)?" LIKE ".exact_value(addcslashes($b,"%_")):" = ".exact_value($b)));}}return
implode(" AND ",$g);}function
where_check($b){parse_str($b,$fe);return
where($fe);}function
where_link($i,$ja,$q,$ge="="){return"&where%5B$i%5D%5Bcol%5D=".urlencode($ja)."&where%5B$i%5D%5Bop%5D=".urlencode($ge)."&where%5B$i%5D%5Bval%5D=".urlencode($q);}function
cookie($h,$q){$ub=array($h,$q,time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"));if(version_compare(PHP_VERSION,'5.2.0')>=0){$ub[]=true;}return
call_user_func_array('setcookie',$ub);}function
restart_session(){if(!ini_get("session.use_cookies")){session_start();}}function
redirect($z,$la=null){if(isset($la)){restart_session();$_SESSION["messages"][]=$la;}if(isset($z)){header("Location: ".($z!=""?$z:"."));exit;}}function
query_redirect($m,$z,$la,$Zb=true,$ie=true,$Ib=false){global$d,$o,$p;if($ie){$Ib=!$d->query($m);}$tc="";if($m){$tc=$p->messageQuery($m);}if($Ib){$o=error().$tc;return
false;}if($Zb){redirect($z,$la.$tc);}return
true;}function
queries($m=null){global$d;static$Da=array();if(!isset($m)){return
implode(";\n",$Da);}$Da[]=$m;return$d->query($m);}function
queries_redirect($z,$la,$Zb){return
query_redirect(queries(),$z,$la,$Zb,false,!$Zb);}function
remove_from_uri($ta=""){return
substr(preg_replace("~(?<=[?&])($ta".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($Eb){return" ".($Eb==$_GET["page"]?$Eb+1:'<a href="'.h(remove_from_uri("page").($Eb?"&page=$Eb":"")).'">'.($Eb+1)."</a>");}function
get_file($e,$Xc=false){$O=$_FILES[$e];if(!$O||$O["error"]){return$O["error"];}return
file_get_contents($Xc&&ereg('\\.gz$',$O["name"])?"compress.zlib://$O[tmp_name]":($Xc&&ereg('\\.bz2$',$O["name"])?"compress.bzip2://$O[tmp_name]":$O["tmp_name"]));}function
upload_error($o){$ed=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):null);return($o?'Unable to upload a file.'.($ed?" ".sprintf('Maximum allowed file size is %sB.',$ed):""):'File does not exist.');}function
odd($g=' class="odd"'){static$i=0;if(!$g){$i=-1;}return($i++%
2?$g:'');}function
is_utf8($b){return(preg_match('~~u',$b)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$b));}function
shorten_utf8($Q,$na=80,$he=""){if(!preg_match("(^([\t\r\n -\x{FFFF}]{0,$na})($)?)u",$Q,$k)){preg_match("(^([\t\r\n -~]{0,$na})($)?)",$Q,$k);}return
h($k[1]).$he.(isset($k[2])?"":"<em>...</em>");}function
friendly_url($b){return
preg_replace('~[^a-z0-9_]~i','-',$b);}function
hidden_fields($va,$ce=array()){while(list($e,$b)=each($va)){if(is_array($b)){foreach($b
as$ea=>$r){$va[$e."[$ea]"]=$r;}}elseif(!in_array($e,$ce)){echo'<input type="hidden" name="'.h($e).'" value="'.h($b).'">';}}}function
column_foreign_keys($n){$g=array();foreach(foreign_keys($n)as$H){foreach($H["source"]as$b){$g[$b][]=$H;}}return$g;}function
input($c,$q,$_){global$pa,$p;$h=h(bracket_escape($c["field"]));echo"<td class='function'>";$Ea=(isset($_GET["select"])?array("orig"=>'original'):array())+$p->editFunctions($c);if($c["type"]=="enum"){echo
nbsp($Ea[""])."<td>".($Ea["orig"]?"<label><input type='radio' name='fields[$h]' value='-1' checked><em>$Ea[orig]</em></label> ":""),$p->editInput($_GET["edit"],$c," name='fields[$h]'",$q);preg_match_all("~'((?:[^']|'')*)'~",$c["length"],$P);foreach($P[1]as$i=>$b){$b=stripcslashes(str_replace("''","'",$b));$da=(is_int($q)?$q==$i+1:$q===$b);echo" <label><input type='radio' name='fields[$h]' value='".($i+1)."'".($da?' checked':'').'>'.h($b).'</label>';}}else{$Va=0;foreach($Ea
as$e=>$b){if($e===""||!$b){break;}$Va++;}$Wa=($Va?" onchange=\"var f = this.form['function[".addcslashes($h,"\r\n'\\")."]']; if ($Va > f.selectedIndex) f.selectedIndex = $Va;\"":"");$kb=" name='fields[$h]'$Wa";echo(count($Ea)>1?html_select("function[$h]",$Ea,!isset($_)||in_array($_,$Ea)?$_:""):nbsp(reset($Ea))).'<td>';$Yc=$p->editInput($_GET["edit"],$c,$kb,$q);if($Yc!=""){echo$Yc;}elseif($c["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$c["length"],$P);foreach($P[1]as$i=>$b){$b=stripcslashes(str_replace("''","'",$b));$da=(is_int($q)?($q>>$i)&1:in_array($b,explode(",",$q),true));echo" <label><input type='checkbox' name='fields[$h][$i]' value='".(1<<$i)."'".($da?' checked':'')."$Wa>".h($b).'</label>';}}elseif(ereg('binary|blob',$c["type"])&&ini_get("file_uploads")){echo"<input type='file' name='fields-$h'$Wa>";}elseif(ereg('text|blob',$c["type"])){echo"<textarea cols='50' rows='12'$kb>".h($q).'</textarea>';}else{$Pc=(!ereg('int',$c["type"])&&preg_match('~^([0-9]+)(,([0-9]+))?$~',$c["length"],$k)?($k[1]+($k[3]?1:0)+($k[2]&&!$c["unsigned"]?1:0)):($pa[$c["type"]]?$pa[$c["type"]]+($c["unsigned"]?0:1):0));echo"<input value='".h($q)."'".($Pc?" maxlength='$Pc'":"").(ereg('char',$c["type"])&&$c["length"]>20?" size='40'":"")."$kb>";}}}function
process_input($c){global$d,$p;$Ga=bracket_escape($c["field"]);$_=$_POST["function"][$Ga];$q=$_POST["fields"][$Ga];if($c["type"]=="enum"?$q==-1:$_=="orig"){return
false;}elseif($c["type"]=="enum"||$c["auto_increment"]?$q=="":$_=="NULL"){return"NULL";}elseif($c["type"]=="enum"){return
intval($q);}elseif($c["type"]=="set"){return
array_sum((array)$q);}elseif(ereg('binary|blob',$c["type"])&&ini_get("file_uploads")){$O=get_file("fields-$Ga");if(!is_string($O)){return
false;}return$d->quote($O);}else{return$p->processInput($c,$q,$_);}}function
search_tables(){global$p,$d;$N=false;foreach(table_status()as$n=>$Z){$h=$p->tableName($Z);if(isset($Z["Engine"])&&$h!=""&&(!$_POST["tables"]||in_array($n,$_POST["tables"]))){$f=$d->query("SELECT 1 FROM ".idf_escape($n)." WHERE ".implode(" AND ",$p->selectSearchProcess(fields($n),array()))." LIMIT 1");if($f->num_rows){if(!$N){echo"<ul>\n";$N=true;}echo"<li><a href='".h(ME."select=".urlencode($n)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>".h($h)."</a>\n";}}}echo($N?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_csv($a){foreach($a
as$e=>$b){if(preg_match("~[\"\n,]~",$b)||$b===""){$a[$e]='"'.str_replace('"','""',$b).'"';}}echo
implode(",",$a)."\n";}function
apply_sql_function($_,$ja){return($_?($_=="count distinct"?"COUNT(DISTINCT ":strtoupper("$_("))."$ja)":$ja);}function
is_email($be){$fd='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Fb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("(^$fd+(\\.$fd+)*@($Fb?\\.)+$Fb\$)i",$be);}function
is_url($Q){$Fb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^https?://($Fb?\\.)+$Fb(:[0-9]+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
print_fieldset($U,$Wd,$Vd=false){echo"<fieldset><legend><a href='#fieldset-$U' onclick=\"return !toggle('fieldset-$U');\">$Wd</a></legend><div id='fieldset-$U'".($Vd?"":" class='hidden'").">\n";}function
bold($Q,$Ud){return($Ud?"<b>$Q</b>":$Q);}define("DB",$_GET["db"]);define("SID_FORM",SID&&!ini_get("session.use_only_cookies")?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':'');define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(SID_FORM?SID.'&':'').($_GET["server"]!=""?'server='.urlencode($_GET["server"]).'&':'').(DB!=""?'db='.urlencode(DB).'&':''));function
lang($Xd,$Nb){$Pa=($Nb==1?0:((!$Nb||$Nb>=5)&&ereg('cs|sk|ru','en')?2:1));return
sprintf($Xd[$Pa],$Nb);}class
Adminer{var$functions=array("char_length","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","unix_timestamp","upper");var$grouping=array("avg","count","count distinct","group_concat","max","min","sum");var$operators=array("=","<",">","<=",">=","!=","LIKE","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL");function
name(){return"Adminer";}function
credentials(){return
array($_GET["server"],$_SESSION["usernames"][$_GET["server"]],$_SESSION["passwords"][$_GET["server"]]);}function
permanentLogin(){return"";}function
database(){return
DB;}function
loginForm($A){echo'<table cellspacing="0">
<tr><th>Server<td><input name="server" value="',h($_GET["server"]),'">
<tr><th>Username<td><input name="username" value="',h($A),'">
<tr><th>Password<td><input type="password" name="password">
</table>
',"<p><input type='submit' value='".'Login'."'>\n";if($this->permanentLogin()){echo
checkbox("permanent",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}}function
login($Fe,$ua){return
true;}function
tableName($Vb){return
h($Vb["Name"]);}function
fieldName($c,$Ja=0){return'<span title="'.h($c["full_type"]).'">'.h($c["field"]).'</span>';}function
selectLinks($Vb,$u=""){echo'<p class="tabs">';$za=array("select"=>'Select data',"table"=>'Show structure');if(isset($Vb["Rows"])){$za["create"]='Alter table';}else{$za["view"]='Alter view';}if(isset($u)){$za["edit"]='New item';}foreach($za
as$e=>$b){echo" <a href='".h(ME)."$e=".urlencode($Vb["Name"]).($e=="edit"?$u:"")."'>".bold($b,isset($_GET[$e]))."</a>";}echo"\n";}function
backwardKeys($n,$De){return
array();}function
backwardKeysPrint($Ce,$a){}function
selectQuery($m){return"<p><code class='jush-sql'>".h(str_replace("\n"," ",$m))."</code> <a href='".h(ME)."sql=".urlencode($m)."'>".'Edit'."</a>\n";}function
rowDescription($n){return"";}function
rowDescriptions($Qa,$Yd){return$Qa;}function
selectVal($b,$y,$c){$g=($b!="<i>NULL</i>"&&$c["type"]=="char"?"<code>$b</code>":$b);if(ereg('blob|binary',$c["type"])&&!is_utf8($b)){$g=lang(array('%d byte','%d bytes'),strlen($b));}return($y?"<a href='$y'>$g</a>":$g);}function
editVal($b,$c){return$b;}function
selectColumnsPrint($v,$t){print_fieldset("select",'Select',$v);$i=0;$Kd=array('Functions'=>$this->functions,'Aggregation'=>$this->grouping);foreach($v
as$e=>$b){$b=$_GET["columns"][$e];echo"<div>".html_select("columns[$i][fun]",array(-1=>"")+$Kd,$b["fun"]),"<select name='columns[$i][col]'><option>".optionlist($t,$b["col"],true)."</select></div>\n";$i++;}echo"<div>".html_select("columns[$i][fun]",array(-1=>"")+$Kd,"","this.nextSibling.onchange();"),"<select name='columns[$i][col]' onchange='selectAddRow(this);'><option>".optionlist($t,null,true)."</select></div>\n","</div></fieldset>\n";}function
selectSearchPrint($D,$t,$w){print_fieldset("search",'Search',$D);foreach($w
as$i=>$s){if($s["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$s["columns"]))."</i>) AGAINST"," <input name='fulltext[$i]' value='".h($_GET["fulltext"][$i])."'>",checkbox("boolean[$i]",1,isset($_GET["boolean"][$i]),"BOOL"),"<br>\n";}}$i=0;foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){echo"<div><select name='where[$i][col]'><option value=''>".'(anywhere)'.optionlist($t,$b["col"],true)."</select>",html_select("where[$i][op]",$this->operators,$b["op"]),"<input name='where[$i][val]' value='".h($b["val"])."'></div>\n";$i++;}}echo"<div><select name='where[$i][col]' onchange='selectAddRow(this);'><option value=''>".'(anywhere)'.optionlist($t,null,true)."</select>",html_select("where[$i][op]",$this->operators),"<input name='where[$i][val]'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($Ja,$t,$w){print_fieldset("sort",'Sort',$Ja);$i=0;foreach((array)$_GET["order"]as$e=>$b){if(isset($t[$b])){echo"<div><select name='order[$i]'><option>".optionlist($t,$b,true)."</select>",checkbox("desc[$i]",1,isset($_GET["desc"][$e]),'descending')."</div>\n";$i++;}}echo"<div><select name='order[$i]' onchange='selectAddRow(this);'><option>".optionlist($t,null,true)."</select>",checkbox("desc[$i]",1,0,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($ma){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input name='limit' size='3' value='".h($ma)."'>","</div></fieldset>\n";}function
selectLengthPrint($Ka){if(isset($Ka)){echo"<fieldset><legend>".'Text length'."</legend><div>",'<input name="text_length" size="3" value="'.h($Ka).'">',"</div></fieldset>\n";}}function
selectActionPrint(){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectEmailPrint($Ae,$t){}function
selectColumnsProcess($t,$w){$v=array();$fa=array();foreach((array)$_GET["columns"]as$e=>$b){if($b["fun"]=="count"||(isset($t[$b["col"]])&&(!$b["fun"]||in_array($b["fun"],$this->functions)||in_array($b["fun"],$this->grouping)))){$v[$e]=apply_sql_function($b["fun"],(isset($t[$b["col"]])?idf_escape($b["col"]):"*"));if(!in_array($b["fun"],$this->grouping)){$fa[]=$v[$e];}}}return
array($v,$fa);}function
selectSearchProcess($l,$w){global$d;$g=array();foreach($w
as$i=>$s){if($s["type"]=="FULLTEXT"&&$_GET["fulltext"][$i]!=""){$g[]="MATCH (".implode(", ",array_map('idf_escape',$s["columns"])).") AGAINST (".$d->quote($_GET["fulltext"][$i]).(isset($_GET["boolean"][$i])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){$Xa=process_length($b["val"]);$dc=" $b[op]".(ereg('NULL$',$b["op"])?"":(ereg('IN$',$b["op"])?" (".($Xa!=""?$Xa:"NULL").")":" ".$this->processInput($l[$b["col"]],$b["val"])));if($b["col"]!=""){$g[]=idf_escape($b["col"]).$dc;}else{$Ma=array();foreach($l
as$h=>$c){if(is_numeric($b["val"])||!ereg('int|float|double|decimal',$c["type"])){$h=idf_escape($h);$Ma[]=(ereg('char|text|enum|set',$c["type"])&&!ereg('^utf8',$c["collation"])?"CONVERT($h USING utf8)":$h);}}$g[]=($Ma?"(".implode("$dc OR ",$Ma)."$dc)":"0");}}}return$g;}function
selectOrderProcess($l,$w){$g=array();foreach((array)$_GET["order"]as$e=>$b){if(isset($l[$b])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()`(?:[^`]|``)+`\\)|COUNT\\(\\*\\))$~',$b)){$g[]=idf_escape($b).(isset($_GET["desc"][$e])?" DESC":"");}}return$g;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($D,$Yd){return
false;}function
messageQuery($m){restart_session();$U="sql-".count($_SESSION["messages"]);$_SESSION["history"][$_GET["server"]][DB][]=(strlen($m)>1e6?ereg_replace('[\x80-\xFF]+$','',substr($m,0,1e6))."\n...":$m);return" <a href='#$U' onclick=\"return !toggle('$U');\">".'SQL command'."</a><div id='$U' class='hidden'><pre class='jush-sql'>".shorten_utf8($m,1000).'</pre><a href="'.h(ME.'sql=&history='.(count($_SESSION["history"][$_GET["server"]][DB])-1)).'">'.'Edit'.'</a></div>';}function
editFunctions($c){$g=array("");if(ereg('char|date|time',$c["type"])){$g=(ereg('char',$c["type"])?array("","md5","sha1","password","encrypt","uuid"):array("","now"));}if(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET))){if(ereg('int|float|double|decimal',$c["type"])){$g=array("","+","-");}if(ereg('date',$c["type"])){$g[]="+ interval";$g[]="- interval";}if(ereg('time',$c["type"])){$g[]="addtime";$g[]="subtime";}if(ereg('char|text',$c["type"])){$g[]="concat";}}if($c["null"]){array_unshift($g,"NULL");}return$g;}function
editInput($n,$c,$kb,$q){if($c["type"]=="enum"){return($c["null"]?"<label><input type='radio'$kb value=''".(isset($q)||isset($_GET["select"])?"":" checked")."><em>NULL</em></label> ":"")."<input type='radio'$kb value='0'".($q===0?" checked":"").">";}return"";}function
processInput($c,$q,$_=""){global$d;$h=$c["field"];$g=$d->quote($q);if(ereg('^(now|uuid)$',$_)){$g="$_()";}elseif(ereg('^[+-]$',$_)){$g=idf_escape($h)." $_ $g";}elseif(ereg('^[+-] interval$',$_)){$g=idf_escape($h)." $_ ".(preg_match("~^([0-9]+|'[0-9.: -]') [A-Z_]+$~i",$q)?$q:$g);}elseif(ereg('^(addtime|subtime|concat)$',$_)){$g="$_(".idf_escape($h).", $g)";}elseif(ereg('^(md5|sha1|password|encrypt)$',$_)){$g="$_($g)";}return$g;}function
dumpOutput($v){$g=array('text'=>'open','file'=>'save');if(function_exists('gzencode')){$g['gz']='gzip';}if(function_exists('bzcompress')){$g['bz2']='bzip2';}return
html_select("output",$g,"text",$v);}function
dumpFormat($v){return
html_select("format",array('sql'=>'SQL','csv'=>'CSV'),"sql",$v);}function
navigation($Sb){global$lb,$d;echo'<h1>
<a href="http://www.adminer.org/" id="h1">',$this->name(),'</a>
<span class="version">',$lb,'</span>
<a href="http://www.adminer.org/#download" id="version">',(version_compare($lb,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Sb!="auth"){$ya=get_databases();echo'<form action="" method="post">
<p class="logout">
<a href="',h(ME),'sql=">',bold('SQL command',isset($_GET["sql"])),'</a>
<a href="',h(ME),'dump=',urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"]),'">',bold('Dump',isset($_GET["dump"])),'</a>
<input type="hidden" name="token" value="',$_SESSION["tokens"][$_GET["server"]],'">
<input type="submit" name="logout" value="Logout">
</p>
</form>
<form action="">
<p>
',SID_FORM;if($_GET["server"]!=""){echo'<input type="hidden" name="server" value="',h($_GET["server"]),'">';}echo($ya?html_select("db",array(""=>"(".'database'.")")+$ya,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">');if(isset($_GET["sql"])){echo'<input type="hidden" name="sql" value="">';}if(isset($_GET["schema"])){echo'<input type="hidden" name="schema" value="">';}if(isset($_GET["dump"])){echo'<input type="hidden" name="dump" value="">';}echo' <input type="submit" value="Use"',($ya?" class='hidden'":""),'>
</p>
</form>
';if($Sb!="db"&&DB!=""&&$d->select_db(DB)){$Qb=tables_list();if(!$Qb){echo"<p class='message'>".'No tables.'."\n";}else{$this->tablesPrint($Qb);}echo'<p><a href="'.h(ME).'create=">'.bold('Create new table',$_GET["create"]==="")."</a>\n";}}}function
tablesPrint($Qb){echo"<p id='tables'>\n";foreach($Qb
as$n){echo'<a href="'.h(ME).'select='.urlencode($n).'">'.bold('select',$_GET["select"]==$n).'</a> ','<a href="'.h(ME).'table='.urlencode($n).'">'.bold($this->tableName(array("Name"=>$n)),$_GET["table"]==$n)."</a><br>\n";}}}$p=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($Od,$o="",$Mc=array(),$_d=""){global$Be,$lb,$p,$d;header("Content-Type: text/html; charset=utf-8");header("X-Frame-Options: deny");$pd=$Od.($_d!=""?": ".h($_d):"");echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$pd.($_GET["server"]!=""&&$_GET["server"]!="localhost"?h(" - $_GET[server]"):"")." - ".$p->name(),'</title>
<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=favicon.ico&amp;version=2.3.2",'">
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=default.css&amp;version=2.3.2";echo'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}echo'
<body onload="bodyLoad(\'',substr($d->server_info,0,3),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion();"),'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=functions.js&amp;version=2.3.2",'"></script>

<div id="content">
';if(isset($Mc)){$y=substr(preg_replace('~db=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.($y!=""?h($y):".").'">'.(isset($_GET["server"])?h($_GET["server"]):'Server').'</a> &raquo; ';if(is_array($Mc)){if(DB!=""){echo'<a href="'.h(substr(ME,0,-1)).'">'.h(DB).'</a> &raquo; ';}foreach($Mc
as$e=>$b){$Bb=(is_array($b)?$b[1]:$b);if($Bb!=""){echo'<a href="'.h(ME."$e=").urlencode(is_array($b)?$b[0]:$b).'">'.h($Bb).'</a> &raquo; ';}}}echo"$Od\n";}echo"<h2>$pd</h2>\n";restart_session();if($_SESSION["messages"]){echo"<div class='message'>".implode("</div>\n<div class='message'>",$_SESSION["messages"])."</div>\n";$_SESSION["messages"]=array();}if(!$_POST&&!isset($_SESSION["passwords"])){$_SESSION["passwords"]=array();}$ya=&$_SESSION["databases"][$_GET["server"]];if(DB!=""&&$ya&&!in_array(DB,$ya,true)){$ya=null;}if($o){echo"<div class='error'>$o</div>\n";}}function
page_footer($Sb=false){global$p;echo'</div>

<div id="menu">
';$p->navigation($Sb);echo'</div>
';}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){}function
dsn($je,$A,$ua){set_exception_handler('auth_error');parent::__construct($je,$A,$ua);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));}function
select_db($Ic){return$this->query("USE ".idf_escape($Ic));}function
query($m,$Hb=false){$f=parent::query($m);if(!$f){$ne=$this->errorInfo();$this->error=$ne[2];return
false;}$this->store_result($f);return$f;}function
multi_query($m){return$this->_result=$this->query($m);}function
store_result($f=null){if(!$f){$f=$this->_result;}if($f->columnCount()){$f->num_rows=$f->rowCount();return$f;}$this->affected_rows=$f->rowCount();return
true;}function
next_result(){return$this->_result->nextRowset();}function
result($f,$c=0){if(!$f){return
false;}$a=$f->fetch();return$a[$c];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$a=(object)$this->getColumnMeta($this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=(in_array("blob",$a->flags)?63:0);return$a;}}}if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($J,$A,$ua){list($ye,$ac)=explode(":",$J,2);return@$this->real_connect(($J!=""?$ye:ini_get("mysqli.default_host")),("$J$A"!=""?$A:ini_get("mysqli.default_user")),("$J$A$ua"!=""?$ua:ini_get("mysqli.default_pw")),null,(is_numeric($ac)?$ac:ini_get("mysqli.default_port")),(!is_numeric($ac)?$ac:null));}function
result($f,$c=0){if(!$f){return
false;}$a=$f->fetch_array();return$a[$c];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($J,$A,$ua){$this->_link=@mysql_connect(($J!=""?$J:ini_get("mysql.default_host")),("$J$A"!=""?$A:ini_get("mysql.default_user")),("$J$A$ua"!=""?$ua:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);}else{$this->error=mysql_error();}return(bool)$this->_link;}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($Ic){return
mysql_select_db($Ic,$this->_link);}function
query($m,$Hb=false){$f=@($Hb?mysql_unbuffered_query($m,$this->_link):mysql_query($m,$this->_link));if(!$f){$this->error=mysql_error($this->_link);return
false;}if($f===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($f);}function
multi_query($m){return$this->_result=$this->query($m);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($f,$c=0){if(!$f){return
false;}return
mysql_result($f->_result,0,$c);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($f){$this->_result=$f;$this->num_rows=mysql_num_rows($f);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$a=mysql_fetch_field($this->_result,$this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=($a->blob?63:0);return$a;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($J,$A,$ua){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:([0-9])~',';port=\\1',$J)),$A,$ua);$this->server_info=$this->result($this->query("SELECT VERSION()"));return
true;}function
query($m,$Hb=false){$this->setAttribute(1000,!$Hb);return
parent::query($m,$Hb);}}}else{page_header('No MySQL extension',sprintf('None of the supported PHP extensions (%s) are available.','MySQLi, MySQL, PDO_MySQL'),null);page_footer("auth");exit;}function
connect(){global$p;$d=new
Min_DB;$Ac=$p->credentials();if($d->connect($Ac[0],$Ac[1],$Ac[2])){$d->query("SET SQL_QUOTE_SHOW_CREATE=1");$d->query("SET NAMES utf8");return$d;}return$d->error;}function
get_databases($oe=true){$g=&$_SESSION["databases"][$_GET["server"]];if(!isset($g)){restart_session();$g=get_vals("SHOW DATABASES");if($oe){ob_flush();flush();}}return$g;}function
db_collation($x,$K){global$d;$g=null;$f=$d->query("SHOW CREATE DATABASE ".idf_escape($x));if($f){$ca=$d->result($f,1);if(preg_match('~ COLLATE ([^ ]+)~',$ca,$k)){$g=$k[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ca,$k)){$g=$K[$k[1]][0];}}return$g;}function
engines(){global$d;$g=array();$f=$d->query("SHOW ENGINES");while($a=$f->fetch_assoc()){if(ereg("YES|DEFAULT",$a["Support"])){$g[]=$a["Engine"];}}return$g;}function
tables_list(){return
get_vals("SHOW TABLES");}function
table_status($h=""){global$d;$g=array();$f=$d->query("SHOW TABLE STATUS".($h!=""?" LIKE ".$d->quote(addcslashes($h,"%_")):""));while($a=$f->fetch_assoc()){if($a["Engine"]=="InnoDB"){$a["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["Comment"]);}if($h!=""){return$a;}$g[$a["Name"]]=$a;}return$g;}function
table_status_referencable(){$g=array();foreach(table_status()as$h=>$a){if($a["Engine"]=="InnoDB"){$g[$h]=$a;}}return$g;}function
fields($n){global$d;$g=array();$f=$d->query("SHOW FULL COLUMNS FROM ".idf_escape($n));if($f){while($a=$f->fetch_assoc()){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$a["Type"],$k);$g[$a["Field"]]=array("field"=>$a["Field"],"full_type"=>$a["Type"],"type"=>$k[1],"length"=>$k[2],"unsigned"=>ltrim($k[3].$k[4]),"default"=>($a["Default"]!=""||ereg("char",$k[1])?$a["Default"]:null),"null"=>($a["Null"]=="YES"),"auto_increment"=>($a["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$a["Extra"],$k)?$k[1]:""),"collation"=>$a["Collation"],"privileges"=>array_flip(explode(",",$a["Privileges"])),"comment"=>$a["Comment"],"primary"=>($a["Key"]=="PRI"),);}}return$g;}function
indexes($n,$ra=null){global$d;if(!is_object($ra)){$ra=$d;}$g=array();$f=$ra->query("SHOW INDEX FROM ".idf_escape($n));if($f){while($a=$f->fetch_assoc()){$g[$a["Key_name"]]["type"]=($a["Key_name"]=="PRIMARY"?"PRIMARY":($a["Index_type"]=="FULLTEXT"?"FULLTEXT":($a["Non_unique"]?"INDEX":"UNIQUE")));$g[$a["Key_name"]]["columns"][$a["Seq_in_index"]]=$a["Column_name"];$g[$a["Key_name"]]["lengths"][$a["Seq_in_index"]]=$a["Sub_part"];}}return$g;}function
foreign_keys($n){global$d,$Sa;static$_a='(?:[^`]|``)+';$g=array();$f=$d->query("SHOW CREATE TABLE ".idf_escape($n));if($f){$qe=$d->result($f,1);preg_match_all("~CONSTRAINT `($_a)` FOREIGN KEY \\(((?:`$_a`,? ?)+)\\) REFERENCES `($_a)`(?:\\.`($_a)`)? \\(((?:`$_a`,? ?)+)\\)(?: ON DELETE (".implode("|",$Sa)."))?(?: ON UPDATE (".implode("|",$Sa)."))?~",$qe,$P,PREG_SET_ORDER);foreach($P
as$k){preg_match_all("~`($_a)`~",$k[2],$X);preg_match_all("~`($_a)`~",$k[5],$Oa);$g[$k[1]]=array("db"=>idf_unescape($k[4]!=""?$k[3]:$k[4]),"table"=>idf_unescape($k[4]!=""?$k[4]:$k[3]),"source"=>array_map('idf_unescape',$X[1]),"target"=>array_map('idf_unescape',$Oa[1]),"on_delete"=>$k[6],"on_update"=>$k[7],);}}return$g;}function
view($h){global$d;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)* AS ~U','',$d->result($d->query("SHOW CREATE VIEW ".idf_escape($h)),1)));}function
collations(){global$d;$g=array();$f=$d->query("SHOW COLLATION");while($a=$f->fetch_assoc()){$g[$a["Charset"]][]=$a["Collation"];}ksort($g);foreach($g
as$e=>$b){sort($g[$e]);}return$g;}function
information_schema($x){global$d;return($d->server_info>=5&&$x=="information_schema");}function
error(){global$d;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$d->error));}function
exact_value($b){global$d;return"BINARY ".$d->quote($b);}$pa=array();$hc=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Binary'=>array("binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),)as$e=>$b){$pa+=$b;$hc[$e]=array_keys($b);}$rb=array("unsigned","zerofill","unsigned zerofill");function
int32($G){while($G>=2147483648){$G-=4294967296;}while($G<=-2147483649){$G+=4294967296;}return(int)$G;}function
long2str($r,$Nc){$C='';foreach($r
as$b){$C.=pack('V',$b);}if($Nc){return
substr($C,0,end($r));}return$C;}function
str2long($C,$Nc){$r=array_values(unpack('V*',str_pad($C,4*ceil(strlen($C)/4),"\0")));if($Nc){$r[]=strlen($C);}return$r;}function
xxtea_mx($S,$T,$aa,$ea){return
int32((($S>>5&0x7FFFFFF)^$T<<2)+(($T>>3&0x1FFFFFFF)^$S<<4))^int32(($aa^$T)+($ea^$S));}function
encrypt_string($xb,$e){if($xb==""){return"";}$e=array_values(unpack("V*",pack("H*",md5($e))));$r=str2long($xb,true);$G=count($r)-1;$S=$r[$G];$T=$r[0];$ka=floor(6+52/($G+1));$aa=0;while($ka-->0){$aa=int32($aa+0x9E3779B9);$wb=$aa>>2&3;for($W=0;$W<$G;$W++){$T=$r[$W+1];$Ta=xxtea_mx($S,$T,$aa,$e[$W&3^$wb]);$S=int32($r[$W]+$Ta);$r[$W]=$S;}$T=$r[0];$Ta=xxtea_mx($S,$T,$aa,$e[$W&3^$wb]);$S=int32($r[$G]+$Ta);$r[$G]=$S;}return
long2str($r,false);}function
decrypt_string($xb,$e){if($xb==""){return"";}$e=array_values(unpack("V*",pack("H*",md5($e))));$r=str2long($xb,false);$G=count($r)-1;$S=$r[$G];$T=$r[0];$ka=floor(6+52/($G+1));$aa=int32($ka*0x9E3779B9);while($aa){$wb=$aa>>2&3;for($W=$G;$W>0;$W--){$S=$r[$W-1];$Ta=xxtea_mx($S,$T,$aa,$e[$W&3^$wb]);$T=int32($r[$W]-$Ta);$r[$W]=$T;}$S=$r[$G];$Ta=xxtea_mx($S,$T,$aa,$e[$W&3^$wb]);$T=int32($r[0]-$Ta);$r[0]=$T;$aa=int32($aa-0x9E3779B9);}return
long2str($r,true);}if(isset($_POST["server"])){session_regenerate_id();$_SESSION["usernames"][$_POST["server"]]=$_POST["username"];$_SESSION["passwords"][$_POST["server"]]=$_POST["password"];if($_POST["permanent"]){cookie("adminer_permanent",base64_encode($_POST["server"]).":".base64_encode($_POST["username"]).":".base64_encode(encrypt_string($_POST["password"],$p->permanentLogin())));}if(count($_POST)==($_POST["permanent"]?4:3)){$z=((string)$_GET["server"]===$_POST["server"]?remove_from_uri(session_name()):preg_replace('~^([^?]*).*~','\\1',ME).($_POST["server"]!=""?'?server='.urlencode($_POST["server"]):''));if(SID_FORM){$Pa=strpos($z,'?');$z=($Pa?substr_replace($z,SID."&",$Pa+1,0):"$z?".SID);}redirect($z);}$_GET["server"]=$_POST["server"];}elseif($_POST["logout"]){$E=$_SESSION["tokens"][$_GET["server"]];if($E&&$_POST["token"]!=$E){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("usernames","passwords","databases","tokens","history")as$b){unset($_SESSION[$b][$_GET["server"]]);}if(!isset($_SESSION["passwords"])){$_SESSION["passwords"]=array();}cookie("adminer_permanent","");redirect(substr(preg_replace('~db=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($_COOKIE["adminer_permanent"]&&!isset($_SESSION["usernames"][$_GET["server"]])){list($J,$A,$Td)=array_map('base64_decode',explode(":",$_COOKIE["adminer_permanent"]));if(($_GET["server"]==""&&!$_POST)||$J==$_GET["server"]){session_regenerate_id();$_SESSION["usernames"][$J]=$A;$_SESSION["passwords"][$J]=decrypt_string($Td,$p->permanentLogin());if($J!=$_GET["server"]){redirect(preg_replace('~^([^?]*).*~','\\1',ME).'?server='.urlencode($J));}}}function
auth_error($wd=null){global$d,$p;$bc=session_name();$A=$_SESSION["usernames"][$_GET["server"]];unset($_SESSION["usernames"][$_GET["server"]]);page_header('Login',(isset($A)?h($wd?$wd->getMessage():(is_string($d)?$d:'Invalid credentials.')):(!$_COOKIE[$bc]&&$_GET[$bc]&&ini_get("session.use_only_cookies")?'Session support must be enabled.':(($_COOKIE[$bc]||$_GET[$bc])&&!isset($_SESSION["passwords"])?'Session expired, please login again.':""))),null);echo"<form action='' method='post'>\n";$p->loginForm($A);echo"<div>";hidden_fields($_POST,array("server","username","password"));echo"</div>\n","</form>\n";page_footer("auth");}$A=&$_SESSION["usernames"][$_GET["server"]];if(!isset($A)){$A=$_GET["username"];}$d=(isset($A)?connect():'');if(is_string($d)||!$p->login($A,$_SESSION["passwords"][$_GET["server"]])){auth_error();exit;}unset($A);if(!$_SESSION["tokens"][$_GET["server"]]){$_SESSION["tokens"][$_GET["server"]]=rand(1,1e6);}if(isset($_POST["server"])&&$_POST["token"]){$_POST["token"]=$_SESSION["tokens"][$_GET["server"]];}$E=$_SESSION["tokens"][$_GET["server"]];$o=($_POST?($_POST["token"]==$E?"":'Invalid CSRF token. Send the form again.'):($_SERVER["REQUEST_METHOD"]!="POST"?"":sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.','"post_max_size"')));function
connect_error(){global$d,$lb,$E,$o;if(DB!=""){page_header('Database'.": ".h(DB),'Invalid database.',false);}else{if($_POST["db"]&&!$o){unset($_SESSION["databases"][$_GET["server"]]);foreach($_POST["db"]as$x){if(!queries("DROP DATABASE ".idf_escape($x))){break;}}queries_redirect(substr(ME,0,-1),'Database has been dropped.',!$d->error);}page_header('Select database',$o,null);echo"<p>";foreach(array('database'=>'Create new database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$e=>$b){echo"<a href='".h(ME)."$e='>$b</a>\n";}echo"<p>".sprintf('MySQL version: %s through PHP extension %s',"<b".($d->server_info<4.1?" class='binary'":"").">$d->server_info</b>","<b>$d->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h($d->result($d->query("SELECT USER()")))."</b>")."\n";$ya=get_databases();if($ya){$K=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' onclick='tableClick(event);'>\n","<thead><tr><td><input type='hidden' name='token' value='$E'>&nbsp;<th>".'Database'."<td>".'Collation'."</thead>\n";foreach($ya
as$x){$zd=h(ME)."db=".urlencode($x);echo"<tr".odd()."><td>".checkbox("db[]",$x,in_array($x,(array)$_POST["db"])),"<th><a href='$zd'>".h($x)."</a>","<td><a href='$zd&amp;database='>".nbsp(db_collation($x,$K))."</a>","\n";}echo"</table>\n","<p><input type='submit' name='drop' value='".'Drop'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /db/) + ')');\">\n","</form>\n";}}page_footer("db");}if(isset($_GET["status"])){$_GET["variables"]=$_GET["status"];}if(!(DB!=""?$d->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"]))){if(DB!=""){unset($_SESSION["databases"][$_GET["server"]]);}connect_error();exit;}function
select($f,$ra=null){if(!$f->num_rows){echo"<p class='message'>".'No rows.'."\n";}else{echo"<table cellspacing='0' class='nowrap'>\n";$za=array();$w=array();$t=array();$yd=array();$pa=array();odd('');for($i=0;$a=$f->fetch_row();$i++){if(!$i){echo"<thead><tr>";for($M=0;$M<count($a);$M++){$c=$f->fetch_field();$ba=$c->orgtable;$_b=$c->orgname;if($ba!=""){if(!isset($w[$ba])){$w[$ba]=array();foreach(indexes($ba,$ra)as$s){if($s["type"]=="PRIMARY"){$w[$ba]=array_flip($s["columns"]);break;}}$t[$ba]=$w[$ba];}if(isset($t[$ba][$_b])){unset($t[$ba][$_b]);$w[$ba][$_b]=$M;$za[$M]=$ba;}}if($c->charsetnr==63){$yd[$M]=true;}$pa[$M]=$c->type;echo"<th".($ba!=""||$c->name!=$_b?" title='".h(($ba!=""?"$ba.":"").$_b)."'":"").">".h($c->name);}echo"</thead>\n";}echo"<tr".odd().">";foreach($a
as$e=>$b){if(!isset($b)){$b="<i>NULL</i>";}else{if($yd[$e]&&!is_utf8($b)){$b="<i>".lang(array('%d byte','%d bytes'),strlen($b))."</i>";}elseif($b==""){$b="&nbsp;";}else{$b=h($b);if($pa[$e]==254){$b="<code>$b</code>";}}if(isset($za[$e])&&!$t[$za[$e]]){$y="edit=".urlencode($za[$e]);foreach($w[$za[$e]]as$Lb=>$M){$y.="&where".urlencode("[".bracket_escape($Lb)."]")."=".urlencode($a[$M]);}$b="<a href='".h(ME.$y)."'>$b</a>";}}echo"<td>$b";}}echo"</table>\n";}}function
referencable_primary($pe){$g=array();foreach(table_status_referencable()as$Y=>$n){if($Y!=$pe){foreach(fields($Y)as$c){if($c["primary"]){if($g[$Y]){unset($g[$Y]);break;}$g[$Y]=$c;}}}}return$g;}function
edit_type($e,$c,$K,$F=array()){global$hc,$rb,$mb;echo'<td><select name="',$e,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist($hc+($F?array('Foreign keys'=>$F):array()),$c["type"]),'</select>
<td><input name="',$e,'[length]" value="',h($c["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td>',"<select name='$e"."[collation]'".(ereg('(char|text|enum|set)$',$c["type"])?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($K,$c["collation"]).'</select>',($rb?"<select name='$e"."[unsigned]'".(!$c["type"]||ereg('(int|float|double|decimal)$',$c["type"])?"":" class='hidden'").'><option>'.optionlist($rb,$c["unsigned"]).'</select> ':' ');}function
process_length($na){global$Ua;return(preg_match("~^\\s*(?:$Ua)(?:\\s*,\\s*(?:$Ua))*\\s*\$~",$na)&&preg_match_all("~$Ua~",$na,$P)?implode(",",$P[0]):preg_replace('~[^0-9,+-]~','',$na));}function
process_type($c,$tb="COLLATE"){global$d,$rb;return" $c[type]".($c["length"]!=""&&!ereg('^date|time$',$c["type"])?"(".process_length($c["length"]).")":"").(ereg('int|float|double|decimal',$c["type"])&&in_array($c["unsigned"],$rb)?" $c[unsigned]":"").(ereg('char|text|enum|set',$c["type"])&&$c["collation"]?" $tb ".$d->quote($c["collation"]):"");}function
process_field($c,$vb){global$d;return
idf_escape($c["field"]).process_type($vb).($c["null"]?" NULL":" NOT NULL").(!isset($c["default"])?"":" DEFAULT ".($c["type"]=="timestamp"&&eregi("^CURRENT_TIMESTAMP$",$c["default"])?$c["default"]:$d->quote($c["default"]))).($c["on_update"]?" ON UPDATE $c[on_update]":"")." COMMENT ".$d->quote($c["comment"]);}function
type_class($V){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$e=>$b){if(ereg("$e|$b",$V)){return" class='$e'";}}}function
edit_fields($l,$K,$V="TABLE",$ld=0,$F=array()){global$mb;$jb=false;foreach($l
as$c){if($c["comment"]!=""){$jb=true;break;}}echo'<thead><tr class="wrap">
';if($V=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($V=="TABLE"?'Column name':'Parameter name'),'<td>Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Length
<td>Options
';if($V=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">A_I</acronym>
<td class="hidden">Default values
<td',($jb?"":" class='hidden'"),'>Comment
';}echo'<td>',"<input type='image' name='add[0]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.3.2' alt='+' title='".'Add next'."'>",'<script type="text/javascript">row_count = ',count($l),';</script>
</thead>
';foreach($l
as$i=>$c){$i++;$md=(isset($_POST["add"][$i-1])||(isset($c["field"])&&!$_POST["drop_col"][$i]));echo'<tr',($md?"":" style='display: none;'"),'>
';if($V=="PROCEDURE"){echo"<td>".html_select("fields[$i][inout]",$mb,$c["inout"]);}echo'<th>';if($md){echo'<input name="fields[',$i,'][field]" value="',h($c["field"]),'" onchange="',($c["field"]!=""||count($l)>1?"":"editingAddRow(this, $ld); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$i,'][orig]" value="',h($c[($_POST?"orig":"field")]),'">
';edit_type("fields[$i]",$c,$K,$F);if($V=="TABLE"){echo'<td>',checkbox("fields[$i][null]",1,$c["null"]),'<td><input type="radio" name="auto_increment_col" value="',$i,'"';if($c["auto_increment"]){echo' checked';}echo'>
<td class="hidden">',checkbox("fields[$i][has_default]",1,$c["has_default"]),'<input name="fields[',$i,'][default]" value="',h($c["default"]),'" onchange="this.previousSibling.checked = true;">
<td',($jb?"":" class='hidden'"),'><input name="fields[',$i,'][comment]" value="',h($c["comment"]),'" maxlength="255">
';}echo"<td><input type='image' name='add[$i]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.3.2' alt='+' title='".'Add next'."' onclick='return !editingAddRow(this, $ld, 1);'>","&nbsp;<input type='image' name='drop_col[$i]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=cross.gif&amp;version=2.3.2' alt='x' title='".'Remove'."' onclick='return !editingRemoveRow(this);'>","&nbsp;<input type='image' name='up[$i]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=up.gif&amp;version=2.3.2' alt='^' title='".'Move up'."'>","&nbsp;<input type='image' name='down[$i]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=down.gif&amp;version=2.3.2' alt='v' title='".'Move down'."'>","\n";}return$jb;}function
process_fields(&$l){ksort($l);$ha=0;if($_POST["up"]){$pb=0;foreach($l
as$e=>$c){if(key($_POST["up"])==$e){unset($l[$e]);array_splice($l,$pb,0,array($c));break;}if(isset($c["field"])){$pb=$ha;}$ha++;}}if($_POST["down"]){$N=false;foreach($l
as$e=>$c){if(isset($c["field"])&&$N){unset($l[key($_POST["down"])]);array_splice($l,$ha,0,array($N));break;}if(key($_POST["down"])==$e){$N=$c;}$ha++;}}$l=array_values($l);if($_POST["add"]){array_splice($l,key($_POST["add"]),0,array(array()));}}function
normalize_enum($k){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($k[0]{0}.$k[0]{0},$k[0]{0},substr($k[0],1,-1))),'\\'))."'";}function
routine($h,$V){global$d,$Ua,$mb,$pa;$Kc=array("bit"=>"tinyint","bool"=>"tinyint","boolean"=>"tinyint","integer"=>"int","double precision"=>"float","real"=>"float","dec"=>"decimal","numeric"=>"decimal","fixed"=>"decimal","national char"=>"char","national varchar"=>"varchar");$od="(".implode("|",array_keys($pa+$Kc)).")(?:\\s*\\(((?:[^'\")]*|$Ua)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$_a="\\s*(".($V=="FUNCTION"?"":implode("|",$mb)).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$od";$ca=$d->result($d->query("SHOW CREATE $V ".idf_escape($h)),2);preg_match("~\\(((?:$_a\\s*,?)*)\\)".($V=="FUNCTION"?"\\s*RETURNS\\s+$od":"")."\\s*(.*)~is",$ca,$k);$l=array();preg_match_all("~$_a\\s*,?~is",$k[1],$P,PREG_SET_ORDER);foreach($P
as$ta){$h=str_replace("``","`",$ta[2]).$ta[3];$Lc=strtolower($ta[4]);$l[]=array("field"=>$h,"type"=>(isset($Kc[$Lc])?$Kc[$Lc]:$Lc),"length"=>preg_replace_callback("~$Ua~s",'normalize_enum',$ta[5]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$ta[7] $ta[6]"))),"inout"=>strtoupper($ta[1]),"collation"=>strtolower($ta[8]),);}if($V!="FUNCTION"){return
array("fields"=>$l,"definition"=>$k[10]);}$ze=array("type"=>$k[10],"length"=>$k[11],"unsigned"=>$k[13],"collation"=>$k[14]);return
array("fields"=>$l,"returns"=>$ze,"definition"=>$k[15]);}function
grant($I,$L,$t,$Rb){if(!$L){return
true;}if($L==array("ALL PRIVILEGES","GRANT OPTION")){return($I=="GRANT"?queries("$I ALL PRIVILEGES$Rb WITH GRANT OPTION"):queries("$I ALL PRIVILEGES$Rb")&&queries("$I GRANT OPTION$Rb"));}return
queries("$I ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$t, ",$L).$t).$Rb);}function
drop_create($Ad,$ca,$z,$Nd,$le,$me,$h){if($_POST["drop"]){return
query_redirect($Ad,$z,$Nd,true,!$_POST["dropped"]);}$sa=$h!=""&&($_POST["dropped"]||queries($Ad));$re=queries($ca);if(!queries_redirect($z,($h!=""?$le:$me),$re)&&$sa){restart_session();$_SESSION["messages"][]=$Nd;}return$sa;}function
tar_file($ec,$fc){$g=pack("a100a8a8a8a12a12",$ec,644,0,0,decoct(strlen($fc)),decoct(time()));$Pd=8*32;for($i=0;$i<strlen($g);$i++){$Pd+=ord($g{$i});}$g.=sprintf("%06o",$Pd)."\0 ";return$g.str_repeat("\0",512-strlen($g)).$fc.str_repeat("\0",511-(strlen($fc)+511)%
512);}function
dump_triggers($n,$B){global$d;if($_POST["format"]=="sql"&&$B&&$d->server_info>=5){$f=$d->query("SHOW TRIGGERS LIKE ".$d->quote(addcslashes($n,"%_")));if($f->num_rows){$C="\nDELIMITER ;;\n";while($a=$f->fetch_assoc()){$C.="\n".($B=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($a["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($a["Trigger"])." $a[Timing] $a[Event] ON ".idf_escape($a["Table"])." FOR EACH ROW\n$a[Statement];;\n";}echo"$C\nDELIMITER ;\n";}}}function
dump_table($n,$B,$ic=false){global$d;if($_POST["format"]=="csv"){echo"\xef\xbb\xbf";if($B){dump_csv(array_keys(fields($n)));}}elseif($B){$f=$d->query("SHOW CREATE TABLE ".idf_escape($n));if($f){if($B=="DROP+CREATE"){echo"DROP ".($ic?"VIEW":"TABLE")." IF EXISTS ".idf_escape($n).";\n";}$ca=$d->result($f,1);echo($B!="CREATE+ALTER"?$ca:($ic?substr_replace($ca," OR REPLACE",6,0):substr_replace($ca," IF NOT EXISTS",12,0))).";\n\n";}if($B=="CREATE+ALTER"&&!$ic){$m="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".$d->quote($n)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$l=array();$f=$d->query($m);$ab="";while($a=$f->fetch_assoc()){$qa=$a["COLUMN_DEFAULT"];$a["default"]=(isset($qa)?$d->quote($qa):"NULL");$a["after"]=$d->quote($ab);$a["alter"]=escape_string(idf_escape($a["COLUMN_NAME"])." $a[COLUMN_TYPE]".($a["COLLATION_NAME"]?" COLLATE $a[COLLATION_NAME]":"").(isset($qa)?" DEFAULT ".($qa=="CURRENT_TIMESTAMP"?$qa:$a["default"]):"").($a["IS_NULLABLE"]=="YES"?"":" NOT NULL").($a["EXTRA"]?" $a[EXTRA]":"").($a["COLUMN_COMMENT"]?" COMMENT ".$d->quote($a["COLUMN_COMMENT"]):"").($ab?" AFTER ".idf_escape($ab):" FIRST"));echo", ADD $a[alter]";$l[]=$a;$ab=$a["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $m;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($l
as$a){echo"
				WHEN ".$d->quote($a["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != ".$d->quote($a["COLUMN_TYPE"])." OR _extra != '$a[EXTRA]' OR _column_comment != ".$d->quote($a["COLUMN_COMMENT"])." OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";}echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".idf_escape($n)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}}function
dump_data($n,$B,$v=""){global$d;$se=1048576;if($B){if($_POST["format"]!="csv"&&$B=="TRUNCATE+INSERT"){echo"TRUNCATE ".idf_escape($n).";\n";}$l=fields($n);$f=$d->query(($v?$v:"SELECT * FROM ".idf_escape($n)),1);if($f){$ob="";$xa="";while($a=$f->fetch_assoc()){if($_POST["format"]=="csv"){dump_csv($a);}else{if(!$ob){$ob="INSERT INTO ".idf_escape($n)." (".implode(", ",array_map('idf_escape',array_keys($a))).") VALUES";}foreach($a
as$e=>$b){$a[$e]=(isset($b)?(ereg('int|float|double|decimal',$l[$e]["type"])?$b:$d->quote($b)):"NULL");}$C=implode(",\t",$a);if($B=="INSERT+UPDATE"){$u=array();foreach($a
as$e=>$b){$u[]=idf_escape($e)." = $b";}echo"$ob ($C) ON DUPLICATE KEY UPDATE ".implode(", ",$u).";\n";}else{$C="\n($C)";if(!$xa){$xa=$ob.$C;}elseif(strlen($xa)+2+strlen($C)<$se){$xa.=",$C";}else{$xa.=";\n";echo$xa;$xa=$ob.$C;}}}}if($_POST["format"]!="csv"&&$B!="INSERT+UPDATE"&&$xa){$xa.=";\n";echo$xa;}}}}function
dump_headers($Qd,$xe=false){$ec=($Qd!=""?friendly_url($Qd):"adminer");$Za=$_POST["output"];$Na=($_POST["format"]=="sql"?"sql":($xe?"tar":"csv"));header("Content-Type: ".($Za=="bz2"?"application/x-bzip":($Za=="gz"?"application/x-gzip":($Na=="tar"?"application/x-tar":($Na=="sql"||$Za!="file"?"text/plain":"text/csv")."; charset=utf-8"))));if($Za!="text"){header("Content-Disposition: attachment; filename=$ec.$Na".($Za!="file"&&!ereg('[^0-9a-z]',$Za)?".$Za":""));}session_write_close();if($_POST["output"]=="bz2"){ob_start('bzcompress',1e6);}if($_POST["output"]=="gz"){ob_start('gzencode',1e6);}return$Na;}session_cache_limiter("");if(!ini_get("session.use_cookies")||@ini_set("session.use_cookies",false)!==false){session_write_close();}$Sa=array("RESTRICT","CASCADE","SET NULL","NO ACTION");$Ra=" onclick=\"return confirm('".'Are you sure?'."');\"";$Ua='\'(?:\'\'|[^\'\\\\]|\\\\.)*\'|"(?:""|[^"\\\\]|\\\\.)*"';$mb=array("IN","OUT","INOUT");if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["download"])){$j=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$j-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$d->result($d->query("SELECT ".idf_escape($_GET["field"])." FROM ".idf_escape($j)." WHERE ".where($_GET)." LIMIT 1"));exit;}elseif(isset($_GET["table"])){$j=$_GET["table"];$l=fields($j);if(!$l){$o=error();}$Z=($l?table_status($j):array());page_header(($l&&!isset($Z["Rows"])?'View':'Table').": ".h($j),$o);$p->selectLinks($Z);if($l){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Column'."<td>".'Type'."<td>".'Comment'."</thead>\n";foreach($l
as$c){echo"<tr".odd()."><th>".h($c["field"]),"<td>".h($c["full_type"]).($c["null"]?" <i>NULL</i>":"").($c["auto_increment"]?" <i>".'Auto Increment'."</i>":""),"<td>".nbsp($c["comment"]),"\n";}echo"</table>\n";if(isset($Z["Rows"])){echo"<h3>".'Indexes'."</h3>\n";$w=indexes($j);if($w){echo"<table cellspacing='0'>\n";foreach($w
as$h=>$s){ksort($s["columns"]);$zb=array();foreach($s["columns"]as$e=>$b){$zb[]="<i>".h($b)."</i>".($s["lengths"][$e]?"(".$s["lengths"][$e].")":"");}echo"<tr title='".h($h)."'><th>$s[type]<td>".implode(", ",$zb)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($j).'">'.'Alter indexes'."</a>\n";if($Z["Engine"]=="InnoDB"){echo"<h3>".'Foreign keys'."</h3>\n";$F=foreign_keys($j);if($F){echo"<table cellspacing='0'>\n";foreach($F
as$h=>$H){$y=($H["db"]!=""?"<strong>".h($H["db"])."</strong>.":"").h($H["table"]);echo"<tr>","<th><i>".implode("</i>, <i>",array_map('h',$H["source"]))."</i>","<td><a href='".h($H["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($H["db"]),ME):ME)."table=".urlencode($H["table"])."'>$y</a>","(<em>".implode("</em>, <em>",array_map('h',$H["target"]))."</em>)",'<td><a href="'.h(ME.'foreign='.urlencode($j).'&name='.urlencode($h)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p><a href="'.h(ME).'foreign='.urlencode($j).'">'.'Add foreign key'."</a>\n";}if($d->server_info>=5){echo"<h3>".'Triggers'."</h3>\n";$f=$d->query("SHOW TRIGGERS LIKE ".$d->quote(addcslashes($j,"%_")));if($f->num_rows){echo"<table cellspacing='0'>\n";while($a=$f->fetch_assoc()){echo"<tr valign='top'><td>$a[Timing]<td>$a[Event]<th>".h($a["Trigger"])."<td><a href='".h(ME.'trigger='.urlencode($j).'&name='.urlencode($a["Trigger"]))."'>".'Alter'."</a>\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($j).'">'.'Add trigger'."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),DB);$Ha=array();$Dd=array();preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$_COOKIE["adminer_schema"],$P,PREG_SET_ORDER);foreach($P
as$i=>$k){$Ha[$k[1]]=array($k[2],$k[3]);$Dd[]="\n\t'".addcslashes($k[1],"\r\n'\\")."': [ $k[2], $k[3] ]";}$hb=0;$Cd=-1;$Fa=array();$Bd=array();$Ed=array();foreach(table_status()as$a){if(!isset($a["Engine"])){continue;}$Pa=0;$Fa[$a["Name"]]["fields"]=array();foreach(fields($a["Name"])as$h=>$c){$Pa+=1.25;$c["pos"]=$Pa;$Fa[$a["Name"]]["fields"][$h]=$c;}$Fa[$a["Name"]]["pos"]=($Ha[$a["Name"]]?$Ha[$a["Name"]]:array($hb,0));if($a["Engine"]=="InnoDB"){foreach(foreign_keys($a["Name"])as$b){if(!$b["db"]){$R=$Cd;if($Ha[$a["Name"]][1]||$Ha[$b["table"]][1]){$R=min(floatval($Ha[$a["Name"]][1]),floatval($Ha[$b["table"]][1]))-1;}else{$Cd-=.1;}while($Ed[(string)$R]){$R-=.0001;}$Fa[$a["Name"]]["references"][$b["table"]][(string)$R]=array($b["source"],$b["target"]);$Bd[$b["table"]][$a["Name"]][(string)$R]=$b["target"];$Ed[(string)$R]=true;}}}$hb=max($hb,$Fa[$a["Name"]]["pos"][0]+2.5+$Pa);}echo'<div id="schema" style="height: ',$hb,'em;">
<script type="text/javascript">
tablePos = {',implode(",",$Dd)."\n",'};
em = document.getElementById(\'schema\').offsetHeight / ',$hb,';
document.onmousemove = schemaMousemove;
document.onmouseup = schemaMouseup;
</script>
';foreach($Fa
as$h=>$n){echo"<div class='table' style='top: ".$n["pos"][0]."em; left: ".$n["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($h).'"><strong>'.h($h)."</strong></a><br>\n";foreach($n["fields"]as$c){$b='<span'.type_class($c["type"]).' title="'.h($c["full_type"].($c["null"]?" NULL":'')).'">'.h($c["field"]).'</span>';echo($c["primary"]?"<em>$b</em>":$b)."<br>\n";}foreach((array)$n["references"]as$ib=>$yb){foreach($yb
as$R=>$Tb){$sb=$R-$Ha[$h][1];$i=0;foreach($Tb[0]as$X){echo"<div class='references' title='".h($ib)."' id='refs$R-".($i++)."' style='left: $sb"."em; top: ".$n["fields"][$X]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$sb)."em;'></div></div>\n";}}}foreach((array)$Bd[$h]as$ib=>$yb){foreach($yb
as$R=>$t){$sb=$R-$Ha[$h][1];$i=0;foreach($t
as$Oa){echo"<div class='references' title='".h($ib)."' id='refd$R-".($i++)."' style='left: $sb"."em; top: ".$n["fields"][$Oa]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=arrow.gif) no-repeat right center;&amp;version=2.3.2'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$sb)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($Fa
as$h=>$n){foreach((array)$n["references"]as$ib=>$yb){foreach($yb
as$R=>$Tb){$cc=$hb;$pc=-10;foreach($Tb[0]as$e=>$X){$Hd=$n["pos"][0]+$n["fields"][$X]["pos"];$Gd=$Fa[$ib]["pos"][0]+$Fa[$ib]["fields"][$Tb[1][$e]]["pos"];$cc=min($cc,$Hd,$Gd);$pc=max($pc,$Hd,$Gd);}echo"<div class='references' id='refl$R' style='left: $R"."em; top: $cc"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($pc-$cc)."em;'></div></div>\n";}}}echo'</div>
';}elseif(isset($_GET["dump"])){$j=$_GET["dump"];if($_POST){$Na=dump_headers(($j!=""?$j:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));if($_POST["format"]=="sql"){echo"-- Adminer $lb dump
SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".$d->quote($d->result($d->query("SELECT @@time_zone"))).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

";}$B=$_POST["db_style"];foreach((DB!=""?array(DB):(array)$_POST["databases"])as$x){if($d->select_db($x)){if($_POST["format"]=="sql"&&ereg('CREATE',$B)&&($f=$d->query("SHOW CREATE DATABASE ".idf_escape($x)))){if($B=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($x).";\n";}$ca=$d->result($f,1);echo($B=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$ca):$ca).";\n";}if($_POST["format"]=="sql"){if($B){echo"USE ".idf_escape($x).";\n\n";}if(in_array("CREATE+ALTER",array($B,$_POST["table_style"]))){echo"SET @adminer_alter = '';\n\n";}$Aa="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$ga){$f=$d->query("SHOW $ga STATUS WHERE Db = ".$d->quote($x));while($a=$f->fetch_assoc()){$Aa.=($B!='DROP+CREATE'?"DROP $ga IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$d->result($d->query("SHOW CREATE $ga ".idf_escape($a["Name"])),2).";;\n\n";}}}if($_POST["events"]){$f=$d->query("SHOW EVENTS");if($f){while($a=$f->fetch_assoc()){$Aa.=($B!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$d->result($d->query("SHOW CREATE EVENT ".idf_escape($a["Name"])),3).";;\n\n";}}}if($Aa){echo"DELIMITER ;;\n\n$Aa"."DELIMITER ;\n\n";}}if($_POST["table_style"]||$_POST["data_style"]){$nb=array();foreach(table_status()as$a){$n=(DB==""||in_array($a["Name"],(array)$_POST["tables"]));$Sd=(DB==""||in_array($a["Name"],(array)$_POST["data"]));if($n||$Sd){if(isset($a["Engine"])){if($Na=="tar"){ob_start();}dump_table($a["Name"],($n?$_POST["table_style"]:""));if($Sd){dump_data($a["Name"],$_POST["data_style"]);}if($n){dump_triggers($a["Name"],$_POST["table_style"]);}if($Na=="tar"){echo
tar_file((DB!=""?"":"$x/")."$a[Name].csv",ob_get_clean());}elseif($_POST["format"]=="sql"){echo"\n";}}elseif($_POST["format"]=="sql"){$nb[]=$a["Name"];}}}foreach($nb
as$we){dump_table($we,$_POST["table_style"],true);}if($Na=="tar"){echo
pack("x512");}}if($B=="CREATE+ALTER"&&$_POST["format"]=="sql"){$m="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $m;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";$f=$d->query($m);while($a=$f->fetch_assoc()){$Wb=$d->quote($a["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["TABLE_COMMENT"]):$a["TABLE_COMMENT"]);echo"
				WHEN ".$d->quote($a["TABLE_NAME"])." THEN
					".(isset($a["ENGINE"])?"IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $Wb THEN
						ALTER TABLE ".idf_escape($a["TABLE_NAME"])." ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$Wb;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($B,$_POST["table_style"]))&&$_POST["format"]=="sql"){echo"SELECT @adminer_alter;\n";}}}exit;}page_header('Export',"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$Qc=array('','USE','DROP+CREATE','CREATE');$gd=array('','DROP+CREATE','CREATE');$ve=array('','TRUNCATE+INSERT','INSERT','INSERT+UPDATE');if($d->server_info>=5){$Qc[]='CREATE+ALTER';$gd[]='CREATE+ALTER';}echo"<tr><th>".'Output'."<td><input type='hidden' name='token' value='$E'>".$p->dumpOutput(0)."\n";echo"<tr><th>".'Format'."<td>".$p->dumpFormat(0)."\n","<tr><th>".'Database'."<td>".html_select('db_style',$Qc,(DB!=""?'':'CREATE'));if($d->server_info>=5){$da=$_GET["dump"]=="";echo
checkbox("routines",1,$da,'Routines');if($d->server_info>=5.1){echo
checkbox("events",1,$da,'Events');}}echo"<tr><th>".'Tables'."<td>".html_select('table_style',$gd,'DROP+CREATE'),"<tr><th>".'Data'."<td>".html_select('data_style',$ve,'INSERT'),'</table>
<p><input type="submit" value="Export">

<table cellspacing="0">
';$oc=array();if(DB!=""){$da=($j!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$da onclick='formCheck(this, /^tables\\[/);'>".'Tables'."</label>","<th style='text-align: right;'><label>".'Data'."<input type='checkbox' id='check-data'$da onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$nb="";foreach(table_status()as$a){$h=$a["Name"];$qb=ereg_replace("_.*","",$h);$da=($j==""||$j==(substr($j,-1)=="%"?"$qb%":$h));$zb="<tr><td>".checkbox("tables[]",$h,$da,$h,"formUncheck('check-tables');");if(!$a["Engine"]){$nb.="$zb\n";}else{echo"$zb<td align='right'><label>".($a["Engine"]=="InnoDB"&&$a["Rows"]?sprintf('~ %s',$a["Rows"]):$a["Rows"]).checkbox("data[]",$h,$da,"","formUncheck('check-data');")."</label>\n";}$oc[$qb]++;}echo$nb;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($j==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Database'."</label></thead>\n";foreach(get_databases()as$x){if(!information_schema($x)){$qb=ereg_replace("_.*","",$x);echo"<tr><td>".checkbox("databases[]",$x,$j==""||$j=="$qb%",$x,"formUncheck('check-databases');")."</label>\n";$oc[$qb]++;}}}echo'</table>
</form>
';$Va=true;foreach($oc
as$e=>$b){if($e!=""&&$b>1){echo($Va?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$e%")."'>".h($e)."</a>";$Va=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');$f=$d->query("SELECT User, Host FROM mysql.user ORDER BY Host, User");if(!$f){echo'<form action=""><p>
',SID_FORM;if($_GET["server"]!=""){echo'<input type="hidden" name="server" value="',h($_GET["server"]),'">';}echo'Username: <input name="user">
Server: <input name="host" value="localhost">
<input type="hidden" name="grant" value="">
<input type="submit" value="Edit">
</form>
';$f=$d->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<table cellspacing='0'>\n","<thead><tr><th>&nbsp;<th>".'Username'."<th>".'Server'."</thead>\n";while($a=$f->fetch_assoc()){echo'<tr'.odd().'><td><a href="'.h(ME.'user='.urlencode($a["User"]).'&host='.urlencode($a["Host"])).'">'.'edit'.'</a><td>'.h($a["User"])."<td>".h($a["Host"])."\n";}echo"</table>\n",'<p><a href="'.h(ME).'user=">'.'Create user'."</a>";}elseif(isset($_GET["sql"])){restart_session();$bb=&$_SESSION["history"][$_GET["server"]][DB];if(!$o&&$_POST["clear"]){$bb=array();redirect(remove_from_uri("history"));}page_header('SQL command',$o);if(!$o&&$_POST){$Ia=false;$m=$_POST["query"];if($_POST["webfile"]){$Ia=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$m=($Ia?fread($Ia,1e6):false);}elseif($_POST["file"]){$m=get_file("sql_file",true);}if(is_string($m)){if(function_exists('memory_get_usage')){@ini_set("memory_limit",2*strlen($m)+memory_get_usage()+8e6);}if($m!=""&&strlen($m)<1e6&&(!$bb||end($bb)!=$m)){$bb[]=$m;}$uc="(\\s|/\\*.*\\*/|(#|-- )[^\n]*\n|--\n)";$ae="(CREATE|DROP)$uc+(DATABASE|SCHEMA)\\b~isU";if(!ini_get("session.use_cookies")){session_write_close();}$vc=";";$ha=0;$cd=true;$ra=(DB!=""?connect():null);if(is_object($ra)){$ra->select_db(DB);}$Da=0;$jc="";while($m!=""){if(!$ha&&preg_match('~^\\s*DELIMITER\\s+(.+)~i',$m,$k)){$vc=$k[1];$m=substr($m,strlen($k[0]));}else{preg_match('('.preg_quote($vc).'|[\'`"]|/\\*|-- |#|$)',$m,$k,PREG_OFFSET_CAPTURE,$ha);$N=$k[0][0];$ha=$k[0][1]+strlen($N);if(!$N&&$Ia&&!feof($Ia)){$m.=fread($Ia,1e5);}else{if(!$N&&rtrim($m)==""){break;}if(!$N||$N==$vc){$cd=false;$ka=substr($m,0,$k[0][1]);$Da++;echo"<pre class='jush-sql' id='sql-$Da'>".shorten_utf8(trim($ka),1000)."</pre>\n";ob_flush();flush();$_c=explode(" ",microtime());if(!$d->multi_query($ka)){echo"<p class='error'>".'Error in query'.": ".error()."\n";$jc.=" <a href='#sql-$Da'>$Da</a>";if($_POST["error_stops"]){break;}}else{do{$f=$d->store_result();$wc=explode(" ",microtime());$Tc=" <span class='time'>(".sprintf('%.3f s',max(0,$wc[0]-$_c[0]+$wc[1]-$_c[1])).")</span>";if(is_object($f)){select($f,$ra);echo"<p>".($f->num_rows?lang(array('%d row','%d rows'),$f->num_rows):"").$Tc;if($ra&&preg_match("~^($uc|\\()*SELECT\\b~isU",$ka)){$U="explain-$Da";echo", <a href='#$U' onclick=\"return !toggle('$U');\">EXPLAIN</a>\n","<div id='$U' class='hidden'>\n";select($ra->query("EXPLAIN $ka"));echo"</div>\n";}}else{if(preg_match("~^$uc*$ae",$m)){restart_session();$_SESSION["databases"][$_GET["server"]]=null;session_write_close();}echo"<p class='message' title='".h($d->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$d->affected_rows)."$Tc\n";}unset($f);$_c=$wc;}while($d->next_result());}$m=substr($m,$ha);$ha=0;}else{while(preg_match('~'.($N=='/*'?'\\*/':(ereg('-- |#',$N)?"\n":"$N|\\\\.")).'|$~s',$m,$k,PREG_OFFSET_CAPTURE,$ha)){$C=$k[0][0];$ha=$k[0][1]+strlen($C);if(!$C&&$Ia&&!feof($Ia)){$m.=fread($Ia,1e6);}elseif($C[0]!="\\"){break;}}}}}}if($jc&&$Da>1){echo"<p class='error'>".'Error in query'.": $jc\n";}if($cd){echo"<p class='message'>".'No commands to execute.'."\n";}}else{echo"<p class='error'>".upload_error($m)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data">
<p><textarea name="query" rows="20" cols="80" style="width: 98%;">';$ka=$_GET["sql"];if($_POST){$ka=$_POST["query"];}elseif($_GET["history"]!=""){$ka=$bb[$_GET["history"]];}echo
h($ka),'</textarea>
<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Execute">
',checkbox("error_stops",1,$_POST["error_stops"],'Stop on error'),'
<p>
';if(!ini_get("file_uploads")){echo'File uploads are disabled.';}else{echo'File upload: <input type="file" name="sql_file">
<input type="submit" name="file" value="Run file">
';}echo'
<p>';$Jc=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$e=>$b){if(extension_loaded($b)){$Jc[]=".$e";}}echo
sprintf('Webserver file %s',"<code>adminer.sql".($Jc?"[".implode("|",$Jc)."]":"")."</code>"),' <input type="submit" name="webfile" value="Run file">

';if($bb){print_fieldset("history",'History',$_GET["history"]!="");foreach($bb
as$e=>$b){echo'<a href="'.h(ME."sql=&history=$e").'">'.'Edit'.'</a> <code class="jush-sql">'.shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$b)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$j=$_GET["edit"];$D=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$Ya=(isset($_GET["select"])?$_POST["edit"]:$D);$l=fields($j);foreach($l
as$h=>$c){if(!isset($c["privileges"][$Ya?"update":"insert"])||$p->fieldName($c)==""){unset($l[$h]);}}if($_POST&&!$o&&!isset($_GET["select"])){$z=$_POST["referer"];if($_POST["insert"]){$z=($Ya?null:$_SERVER["REQUEST_URI"]);}elseif(!ereg('^.+&select=.+$',$z)){$z=ME."select=".urlencode($j);$i=0;foreach((array)$_GET["set"]as$e=>$b){if($b==$_POST["fields"][$e]){$z.=where_link($i++,bracket_escape($e,"back"),$b);}}}if(isset($_POST["delete"])){query_redirect("DELETE FROM ".idf_escape($_GET["edit"])." WHERE $D LIMIT 1",$z,'Item has been deleted.');}else{$u=array();foreach($l
as$h=>$c){$b=process_input($c);if(!$Ya){$u[idf_escape($h)]=($b!==false?$b:"''");}elseif($b!==false){$u[]="\n".idf_escape($h)." = $b";}}if(!$u){redirect($z);}if($Ya){query_redirect("UPDATE ".idf_escape($j)." SET".implode(",",$u)."\nWHERE $D\nLIMIT 1",$z,'Item has been updated.');}else{query_redirect("INSERT INTO ".idf_escape($j)." (".implode(", ",array_keys($u)).")\nVALUES (".implode(", ",$u).")",$z,'Item has been inserted.');}}}$Y=$p->tableName(table_status($j));page_header(($Ya?'Edit':'Insert'),$o,array("select"=>array($j,$Y)),$Y);unset($a);if($_POST["save"]){$a=(array)$_POST["fields"];}elseif($D){$v=array();foreach($l
as$h=>$c){if(isset($c["privileges"]["select"])){$v[]=($_POST["clone"]&&$c["auto_increment"]?"'' AS ":(ereg("enum|set",$c["type"])?"1*".idf_escape($h)." AS ":"")).idf_escape($h);}}$a=array();if($v){$f=$d->query("SELECT ".implode(", ",$v)." FROM ".idf_escape($j)." WHERE $D ".(isset($_GET["select"])?"HAVING COUNT(*) = 1":"LIMIT 1"));$a=$f->fetch_assoc();}}echo'
<form action="" method="post" enctype="multipart/form-data">
';if($l){unset($ca);echo"<table cellspacing='0'>\n";foreach($l
as$h=>$c){echo"<tr><th>".$p->fieldName($c);$qa=$_GET["set"][bracket_escape($h)];$q=(isset($a)?($a[$h]!=""&&ereg("enum|set",$c["type"])?intval($a[$h]):$a[$h]):($_POST["clone"]&&$c["auto_increment"]?"":(isset($_GET["select"])?false:(isset($qa)?$qa:$c["default"]))));if(!$_POST["save"]&&is_string($q)){$q=$p->editVal($q,$c);}$_=($_POST["save"]?(string)$_POST["function"][$h]:($D&&$c["on_update"]=="CURRENT_TIMESTAMP"?"now":($q===false?null:(isset($q)?'':'NULL'))));if($c["type"]=="timestamp"&&$q=="CURRENT_TIMESTAMP"){$q="";$_="now";}input($c,$q,$_);echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="',$E,'">
<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
';if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}if($l){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Ya?'Save and continue edit':'Save and insert next')."'>\n";}}if($Ya){echo"<input type='submit' name='delete' value='".'Delete'."'$Ra>\n";}echo'</form>
';}elseif(isset($_GET["create"])){$j=$_GET["create"];$dd=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$Wc=referencable_primary($j);$F=array();foreach($Wc
as$Y=>$c){$F[idf_escape($Y).".".idf_escape($c["field"])]=$Y;}$Pb=array();$Ub=array();if($j!=""){$Pb=fields($j);$Ub=table_status($j);}if($_POST&&!$o&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){query_redirect("DROP TABLE ".idf_escape($_GET["create"]),substr(ME,0,-1),'Table has been dropped.');}else{$Hc=" PRIMARY KEY";if($j!=""&&$_POST["auto_increment_col"]){foreach(indexes($j)as$s){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$s["columns"],true)){$Hc="";break;}if($s["type"]=="PRIMARY"){$Hc=" UNIQUE";}}}$l="";ksort($_POST["fields"]);$Ob=reset($Pb);$ab="FIRST";foreach($_POST["fields"]as$e=>$c){$vb=(isset($pa[$c["type"]])?$c:$Wc[$F[$c["type"]]]);if($c["field"]!=""){if($vb){if(!$c["has_default"]){$c["default"]=null;}$qa=eregi_replace(" *on update CURRENT_TIMESTAMP","",$c["default"]);if($qa!=$c["default"]){$c["on_update"]="CURRENT_TIMESTAMP";$c["default"]=$qa;}$ad=process_field($c,$vb);$Zc=($e==$_POST["auto_increment_col"]);if($ad!=process_field($Ob,$Ob)||$Ob["auto_increment"]!=$Zc){$l.="\n".($j!=""?($c["orig"]!=""?"CHANGE ".idf_escape($c["orig"]):"ADD"):" ")." $ad".($Zc?" AUTO_INCREMENT$Hc":"").($j!=""?" $ab":"").",";}if(!isset($pa[$c["type"]])){$l.=($j!=""?"\nADD":"")." FOREIGN KEY (".idf_escape($c["field"]).") REFERENCES ".idf_escape($F[$c["type"]])." (".idf_escape($vb["field"])."),";}}$ab="AFTER ".idf_escape($c["field"]);}elseif($c["orig"]!=""){$l.="\nDROP ".idf_escape($c["orig"]).",";}if($c["orig"]!=""){$Ob=next($Pb);}}$La="COMMENT=".$d->quote($_POST["Comment"]).($_POST["Engine"]&&$_POST["Engine"]!=$Ub["Engine"]?" ENGINE=".$d->quote($_POST["Engine"]):"").($_POST["Collation"]&&$_POST["Collation"]!=$Ub["Collation"]?" COLLATE ".$d->quote($_POST["Collation"]):"").($_POST["Auto_increment"]!=""?" AUTO_INCREMENT=".preg_replace('~[^0-9]+~','',$_POST["Auto_increment"]):"");if(in_array($_POST["partition_by"],$dd)){$zc=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$e=>$b){$q=$_POST["partition_values"][$e];$zc[]="\nPARTITION ".idf_escape($b)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($q!=""?" ($q)":" MAXVALUE");}}$La.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($zc?" (".implode(",",$zc)."\n)":($_POST["partitions"]?" PARTITIONS ".intval($_POST["partitions"]):""));}elseif($d->server_info>=5.1&&$j!=""){$La.="\nREMOVE PARTITIONING";}$z=ME."table=".urlencode($_POST["name"]);if($j!=""){query_redirect("ALTER TABLE ".idf_escape($j)."$l\nRENAME TO ".idf_escape($_POST["name"]).",\n$La",$z,'Table has been altered.');}else{cookie("adminer_engine",$_POST["Engine"]);query_redirect("CREATE TABLE ".idf_escape($_POST["name"])." (".substr($l,0,-1)."\n) $La",$z,'Table has been created.');}}}page_header(($j!=""?'Alter table':'Create table'),$o,array("table"=>$j),$j);$a=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"")),"partition_names"=>array(""),);if($_POST){$a=$_POST;if($a["auto_increment_col"]){$a["fields"][$a["auto_increment_col"]]["auto_increment"]=true;}process_fields($a["fields"]);}elseif($j!=""){$a=$Ub;$a["name"]=$j;$a["fields"]=array();if(!$_GET["auto_increment"]){$a["Auto_increment"]="";}foreach($Pb
as$c){$c["has_default"]=isset($c["default"]);if($c["on_update"]){$c["default"].=" ON UPDATE $c[on_update]";}$a["fields"][]=$c;}if($d->server_info>=5.1){$eb="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".$d->quote(DB)." AND TABLE_NAME = ".$d->quote($j);$f=$d->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $eb ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($a["partition_by"],$a["partitions"],$a["partition"])=$f->fetch_row();$a["partition_names"]=array();$a["partition_values"]=array();$f=$d->query("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $eb AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");while($Vc=$f->fetch_assoc()){$a["partition_names"][]=$Vc["PARTITION_NAME"];$a["partition_values"][]=$Vc["PARTITION_DESCRIPTION"];}$a["partition_names"][]="";}}$K=collations();$Gc=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($Gc&&count($a["fields"])>$Gc){echo"<p class='error'>".h(sprintf('Maximum number of allowed fields exceeded. Please increase %s and %s.','suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}$Fc=engines();foreach($Fc
as$Oc){if(!strcasecmp($Oc,$a["Engine"])){$a["Engine"]=$Oc;break;}}echo'
<form action="" method="post" id="form">
<p>
Table name: <input name="name" maxlength="64" value="',h($a["name"]),'">
',($Fc?html_select("Engine",array(""=>"(".'engine'.")")+$Fc,$a["Engine"]):""),' ',html_select("Collation",array(""=>"(".'collation'.")")+$K,$a["Collation"]),' <input type="submit" value="Save">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$jb=edit_fields($a["fields"],$K,"TABLE",$Gc,$F);echo'</table>
<p>
Auto Increment: <input name="Auto_increment" size="6" value="',h($a["Auto_increment"]),'">
Comment: <input name="Comment" value="',h($a["Comment"]);?>" maxlength="60">
<script type="text/javascript">
document.write('<label><input type="checkbox" onclick="columnShow(this.checked, 5);">Default values<\/label>');
document.write('<label><input type="checkbox"<?php if($jb){echo' checked';}echo' onclick="columnShow(this.checked, 6);">Show column comments<\\/label>\');
</script>
<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Save">
';if(strlen($_GET["create"])){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}if($d->server_info>=5.1){$Rc=ereg('RANGE|LIST',$a["partition_by"]);print_fieldset("partition",'Partition by',$a["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$dd,$a["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($a["partition"]),'">)
Partitions: <input name="partitions" size="2" value="',h($a["partitions"]),'"',($Rc||!$a["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($Rc?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($a["partition_names"]as$e=>$b){echo'<tr>','<td><input name="partition_names[]" value="'.h($b).'"'.($e==count($a["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($a["partition_values"][$e]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$j=$_GET["indexes"];$Uc=array("PRIMARY","UNIQUE","INDEX","FULLTEXT");$w=indexes($j);if($_POST&&!$o&&!$_POST["add"]){$Yb=array();foreach($_POST["indexes"]as$s){if(in_array($s["type"],$Uc)){$t=array();$Ec=array();$u=array();ksort($s["columns"]);foreach($s["columns"]as$e=>$ja){if($ja!=""){$na=$s["lengths"][$e];$u[]=idf_escape($ja).($na?"(".intval($na).")":"");$t[count($t)+1]=$ja;$Ec[count($Ec)+1]=($na?$na:null);}}if($t){foreach($w
as$h=>$gb){ksort($gb["columns"]);ksort($gb["lengths"]);if($s["type"]==$gb["type"]&&$gb["columns"]===$t&&$gb["lengths"]===$Ec){unset($w[$h]);continue
2;}}$Yb[]="\nADD $s[type]".($s["type"]=="PRIMARY"?" KEY":"")." (".implode(", ",$u).")";}}}foreach($w
as$h=>$gb){$Yb[]="\nDROP INDEX ".idf_escape($h);}if(!$Yb){redirect(ME."table=".urlencode($j));}query_redirect("ALTER TABLE ".idf_escape($j).implode(",",$Yb),ME."table=".urlencode($j),'Indexes have been altered.');}page_header('Indexes',$o,array("table"=>$j),$j);$l=array_keys(fields($j));$a=array("indexes"=>$w);if($_POST){$a=$_POST;if($_POST["add"]){foreach($a["indexes"]as$e=>$s){if($s["columns"][count($s["columns"])]!=""){$a["indexes"][$e]["columns"][]="";}}$s=end($a["indexes"]);if($s["type"]||array_filter($s["columns"],'strlen')||array_filter($s["lengths"],'strlen')){$a["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($a["indexes"]as$e=>$s){$a["indexes"][$e]["columns"][]="";}$a["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0">
<thead><tr><th>Index Type<th>Column (length)</thead>
';$M=0;foreach($a["indexes"]as$s){echo"<tr><td>".html_select("indexes[$M][type]",array(-1=>"")+$Uc,$s["type"],($M==count($a["indexes"])-1?"indexesAddRow(this);":1))."<td>\n";ksort($s["columns"]);foreach($s["columns"]as$i=>$ja){echo"<span>".html_select("indexes[$M][columns][$i]",array(-1=>"")+$l,$ja,($i==count($s["columns"])?"indexesAddColumn(this);":1)),"<input name='indexes[$M][lengths][$i]' size='2' value='".h($s["lengths"][$i])."'> </span>\n";}echo"\n";$M++;}echo'</table>
<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add next"></noscript>
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$o&&!isset($_POST["add_x"])){restart_session();if($_POST["drop"]){unset($_SESSION["databases"][$_GET["server"]]);query_redirect("DROP DATABASE ".idf_escape(DB),remove_from_uri("db|database"),'Database has been dropped.');}elseif(DB!==$_POST["name"]){unset($_SESSION["databases"][$_GET["server"]]);$fb=explode("\n",str_replace("\r","",$_POST["name"]));$Ib=false;$pb="";foreach($fb
as$x){if(count($fb)==1||$x!=""){if(!queries("CREATE DATABASE ".idf_escape($x).($_POST["collation"]?" COLLATE ".$d->quote($_POST["collation"]):""))){$Ib=true;}$pb=$x;}}if(query_redirect(queries(),ME."db=".urlencode($pb),'Database has been created.',DB=="",false,$Ib)){$f=$d->query("SHOW TABLES");while($a=$f->fetch_row()){if(!queries("RENAME TABLE ".idf_escape($a[0])." TO ".idf_escape($_POST["name"]).".".idf_escape($a[0]))){break;}}if(!$a){queries("DROP DATABASE ".idf_escape(DB));}queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_POST["name"]),'Database has been renamed.',!$a);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($_POST["name"])." COLLATE ".$d->quote($_POST["collation"]),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$o,array(),DB);$K=collations();$h=DB;$tb=null;if($_POST){$h=$_POST["name"];$tb=$_POST["collation"];}elseif(DB==""){$f=$d->query("SHOW GRANTS");while($a=$f->fetch_row()){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$a[0],$k)&&$k[1]){$h=stripcslashes(idf_unescape($k[2]));break;}}}else{$tb=db_collation(DB,$K);}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($h,"\n")?'<textarea name="name" rows="10" cols="40">'.h($h).'</textarea><br>':'<input name="name" value="'.h($h).'" maxlength="64">')."\n",html_select("collation",array(""=>"(".'collation'.")")+$K,$tb),'<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Save">
';if(strlen(DB)){echo"<input type='submit' name='drop' value='".'Drop'."'$Ra>\n";}elseif(!$_POST["add_x"]&&$_GET["db"]==""){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.3.2' alt='+' title='".'Add next'."'>\n";}echo'</form>
';}elseif(isset($_GET["call"])){$ia=$_GET["call"];page_header('Call'.": ".h($ia),$o);$ga=routine($ia,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Xa=array();$Aa=array();foreach($ga["fields"]as$i=>$c){if(substr($c["inout"],-3)=="OUT"){$Aa[$i]="@".idf_escape($c["field"])." AS ".idf_escape($c["field"]);}if(!$c["inout"]||substr($c["inout"],0,2)=="IN"){$Xa[]=$i;}}if(!$o&&$_POST){$Sc=array();foreach($ga["fields"]as$e=>$c){if(in_array($e,$Xa)){$b=process_input($c);if($b===false){$b="''";}if(isset($Aa[$e])){$d->query("SET @".idf_escape($c["field"])." = $b");}}$Sc[]=(isset($Aa[$e])?"@".idf_escape($c["field"]):$b);}if(!$d->multi_query((isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($ia)."(".implode(", ",$Sc).")")){echo"<p class='error'>".error()."\n";}else{do{$f=$d->store_result();if(is_object($f)){select($f);}else{echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$d->affected_rows)."\n";}}while($d->next_result());if($Aa){select($d->query("SELECT ".implode(", ",$Aa)));}}}echo'
<form action="" method="post">
';if($Xa){echo"<table cellspacing='0'>\n";foreach($Xa
as$e){$c=$ga["fields"][$e];echo"<tr><th>".h($c["field"]);$q=$_POST["fields"][$e];if($q!=""&&ereg("enum|set",$c["type"])){$q=intval($q);}input($c,$q,(string)$_POST["function"][$h]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Call">
</form>
';}elseif(isset($_GET["foreign"])){$j=$_GET["foreign"];if($_POST&&!$o&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".idf_escape($j)."\nDROP FOREIGN KEY ".idf_escape($_GET["name"]),ME."table=".urlencode($j),'Foreign key has been dropped.');}else{$X=array_filter($_POST["source"],'strlen');ksort($X);$Oa=array();foreach($X
as$e=>$b){$Oa[$e]=$_POST["target"][$e];}query_redirect("ALTER TABLE ".idf_escape($j).($_GET["name"]!=""?"\nDROP FOREIGN KEY ".idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$X)).") REFERENCES ".idf_escape($_POST["table"])." (".implode(", ",array_map('idf_escape',$Oa)).")".(in_array($_POST["on_delete"],$Sa)?" ON DELETE $_POST[on_delete]":"").(in_array($_POST["on_update"],$Sa)?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($j),($_GET["name"]!=""?'Foreign key has been altered.':'Foreign key has been created.'));$o='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$o";}}page_header('Foreign key',$o,array("table"=>$j),$j);$a=array("table"=>$j,"source"=>array(""));if($_POST){$a=$_POST;ksort($a["source"]);if($_POST["add"]){$a["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$a["target"]=array();}}elseif($_GET["name"]!=""){$F=foreign_keys($j);$a=$F[$_GET["name"]];$a["source"][]="";}$X=array_keys(fields($j));$Oa=($j===$a["table"]?$X:array_keys(fields($a["table"])));echo'
<form action="" method="post">
<p>
';if($a["db"]==""){echo'Target table:
',html_select("table",array_keys(table_status_referencable()),$a["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th>Source<th>Target</thead>
';$M=0;foreach($a["source"]as$e=>$b){echo"<tr>","<td>".html_select("source[".intval($e)."]",array(-1=>"")+$X,$b,($M==count($a["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".intval($e)."]",$Oa,$a["target"][$e]);$M++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+$Sa,$a["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+$Sa,$a["on_update"]),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}echo'<input type="hidden" name="token" value="',$E,'">
</form>
';}elseif(isset($_GET["view"])){$j=$_GET["view"];$sa=false;if($_POST&&!$o){$sa=drop_create("DROP VIEW ".idf_escape($j),"CREATE VIEW ".idf_escape($_POST["name"])." AS\n$_POST[select]",substr(ME,0,-1),'View has been dropped.','View has been altered.','View has been created.',$j);}page_header(($j!=""?'Alter view':'Create view'),$o,array("table"=>$j),$j);$a=array();if($_POST){$a=$_POST;}elseif($j!=""){$a=view($j);$a["name"]=$j;}echo'
<form action="" method="post">
<p><textarea name="select" rows="10" cols="80" style="width: 98%;">',h($a["select"]),'</textarea>
<p>
<input type="hidden" name="token" value="',$E,'">
';if($sa){echo'<input type="hidden" name="dropped" value="1">';}echo'Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<input type="submit" value="Save">
</form>
';}elseif(isset($_GET["event"])){$wa=$_GET["event"];$Rd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$lc=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$o){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($wa),substr(ME,0,-1),'Event has been dropped.');}elseif(in_array($_POST["INTERVAL_FIELD"],$Rd)&&isset($lc[$_POST["STATUS"]])){$Ld="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".$d->quote($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".$d->quote($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".$d->quote($_POST["ENDS"]):""):"AT ".$d->quote($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";query_redirect(($wa!=""?"ALTER EVENT ".idf_escape($wa).$Ld.($wa!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Ld)."\n".$lc[$_POST["STATUS"]]." COMMENT ".$d->quote($_POST["EVENT_COMMENT"])." DO\n$_POST[EVENT_DEFINITION]",substr(ME,0,-1),($wa!=""?'Event has been altered.':'Event has been created.'));}}page_header(($wa!=""?'Alter event'.": ".h($wa):'Create event'),$o);$a=array();if($_POST){$a=$_POST;}elseif($wa!=""){$f=$d->query("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".$d->quote(DB)." AND EVENT_NAME = ".$d->quote($wa));$a=$f->fetch_assoc();}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($a["EVENT_NAME"]),'" maxlength="64">
<tr><th>Start<td><input name="STARTS" value="',h("$a[EXECUTE_AT]$a[STARTS]"),'">
<tr><th>End<td><input name="ENDS" value="',h($a["ENDS"]),'">
<tr><th>Every<td><input name="INTERVAL_VALUE" value="',h($a["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$Rd,$a["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$lc,$a["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($a["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$a["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p><textarea name="EVENT_DEFINITION" rows="10" cols="80" style="width: 98%;">',h($a["EVENT_DEFINITION"]),'</textarea>
<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Save">
';if($wa!=""){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}echo'</form>
';}elseif(isset($_GET["procedure"])){$ia=$_GET["procedure"];$ga=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$sa=false;if($_POST&&!$o&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$u=array();$l=(array)$_POST["fields"];ksort($l);foreach($l
as$c){if($c["field"]!=""){$u[]=(in_array($c["inout"],$mb)?"$c[inout] ":"").idf_escape($c["field"]).process_type($c,"CHARACTER SET");}}$sa=drop_create("DROP $ga ".idf_escape($ia),"CREATE $ga ".idf_escape($_POST["name"])." (".implode(", ",$u).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"")."\n$_POST[definition]",substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$ia);}page_header(($ia!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($ia):(isset($_GET["function"])?'Create function':'Create procedure')),$o);$K=get_vals("SHOW CHARACTER SET");sort($K);$a=array("fields"=>array());if($_POST){$a=$_POST;$a["fields"]=(array)$a["fields"];process_fields($a["fields"]);}elseif($ia!=""){$a=routine($ia,$ga);$a["name"]=$ia;}echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="nowrap">
';edit_fields($a["fields"],$K,$ga);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$a["returns"],$K);}echo'</table>
<p><textarea name="definition" rows="10" cols="80" style="width: 98%;">',h($a["definition"]),'</textarea>
<p>
<input type="hidden" name="token" value="',$E,'">
';if($sa){echo'<input type="hidden" name="dropped" value="1">';}echo'Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<input type="submit" value="Save">
';if($ia!=""){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}echo'</form>
';}elseif(isset($_GET["trigger"])){$j=$_GET["trigger"];$Md=array("BEFORE","AFTER");$nd=array("INSERT","UPDATE","DELETE");$sa=false;if($_POST&&!$o&&in_array($_POST["Timing"],$Md)&&in_array($_POST["Event"],$nd)){$sa=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]),"CREATE TRIGGER ".idf_escape($_POST["Trigger"])." $_POST[Timing] $_POST[Event] ON ".idf_escape($j)." FOR EACH ROW\n$_POST[Statement]",ME."table=".urlencode($j),'Trigger has been dropped.','Trigger has been altered.','Trigger has been created.',$_GET["name"]);}page_header(($_GET["name"]!=""?'Alter trigger'.": ".h($_GET["name"]):'Create trigger'),$o,array("table"=>$j));$a=array("Trigger"=>$j."_bi");if($_POST){$a=$_POST;}elseif($_GET["name"]!=""){$f=$d->query("SHOW TRIGGERS WHERE `Trigger` = ".$d->quote($_GET["name"]));$a=$f->fetch_assoc();}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$Md,$a["Timing"],"if (/^".h(preg_quote($j,"/"))."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".h(addcslashes($j,"\r\n'\\"))."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Event<td>',html_select("Event",$nd,$a["Event"],"this.form['Timing'].onchange();"),'<tr><th>Name<td><input name="Trigger" value="',h($a["Trigger"]),'" maxlength="64">
</table>
<p><textarea name="Statement" rows="10" cols="80" style="width: 98%;">',h($a["Statement"]),'</textarea>
<p>
<input type="hidden" name="token" value="',$E,'">
';if($sa){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}echo'</form>
';}elseif(isset($_GET["user"])){$yc=$_GET["user"];$L=array(""=>array("All privileges"=>""));$f=$d->query("SHOW PRIVILEGES");while($a=$f->fetch_assoc()){foreach(explode(",",($a["Privilege"]=="Grant option"?"":$a["Context"]))as$Mb){$L[$Mb][$a["Privilege"]]=$a["Comment"];}}$L["Server Admin"]+=$L["File access on server"];$L["Databases"]["Create routine"]=$L["Procedures"]["Create routine"];unset($L["Procedures"]["Create routine"]);$L["Columns"]=array();foreach(array("Select","Insert","Update","References")as$b){$L["Columns"][$b]=$L["Tables"][$b];}unset($L["Server Admin"]["Usage"]);foreach($L["Tables"]as$e=>$b){unset($L["Databases"][$e]);}$Jb=array();if($_POST){foreach($_POST["objects"]as$e=>$b){$Jb[$b]=(array)$Jb[$b]+(array)$_POST["grants"][$e];}}$Ba=array();$Dc="";if(isset($_GET["host"])&&($f=$d->query("SHOW GRANTS FOR ".$d->quote($yc)."@".$d->quote($_GET["host"])))){while($a=$f->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$a[0],$k)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$k[1],$P,PREG_SET_ORDER)){foreach($P
as$b){if($b[1]!="USAGE"){$Ba["$k[2]$b[2]"][$b[1]]=true;}if(ereg(' WITH GRANT OPTION',$a[0])){$Ba["$k[2]$b[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$a[0],$k)){$Dc=$k[1];}}}if($_POST&&!$o){$cb=(isset($_GET["host"])?$d->quote($yc)."@".$d->quote($_GET["host"]):"''");$Ca=$d->quote($_POST["user"])."@".$d->quote($_POST["host"]);$Cc=$d->quote($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $cb",ME."privileges=",'User has been dropped.');}else{if($cb!=$Ca){$o=!queries(($d->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $Ca IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $Cc");}elseif($_POST["pass"]!=$Dc||!$_POST["hashed"]){queries("SET PASSWORD FOR $Ca = ".($_POST["hashed"]?$Cc:"PASSWORD($Cc)"));}if(!$o){$Cb=array();foreach($Jb
as$oa=>$I){if(isset($_GET["grant"])){$I=array_filter($I);}$I=array_keys($I);if(isset($_GET["grant"])){$Cb=array_diff(array_keys(array_filter($Jb[$oa],'strlen')),$I);}elseif($cb==$Ca){$jd=array_keys((array)$Ba[$oa]);$Cb=array_diff($jd,$I);$I=array_diff($I,$jd);unset($Ba[$oa]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$oa,$k)&&(!grant("REVOKE",$Cb,$k[2]," ON $k[1] FROM $Ca")||!grant("GRANT",$I,$k[2]," ON $k[1] TO $Ca"))){$o=true;break;}}}if(!$o&&isset($_GET["host"])){if($cb!=$Ca){queries("DROP USER $cb");}elseif(!isset($_GET["grant"])){foreach($Ba
as$oa=>$Cb){if(preg_match('~^(.+)(\\(.*\\))?$~U',$oa,$k)){grant("REVOKE",array_keys($Cb),$k[2]," ON $k[1] FROM $Ca");}}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$o);if($cb!=$Ca){$d->query("DROP USER $Ca");}}}page_header((isset($_GET["host"])?'Username'.": ".h("$yc@$_GET[host]"):'Create user'),$o,array("privileges"=>array('','Privileges')));if($_POST){$a=$_POST;$Ba=$Jb;}else{$a=$_GET+array("host"=>$d->result($d->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)")));$a["pass"]=$Dc;$a["hashed"]=true;$Ba[""]=true;}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($a["user"]),'">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($a["host"]),'">
<tr><th>Password<td><input id="pass" name="pass" value="',h($a["pass"]),'">
';if(!$a["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$a["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($d->server_info,0,3)."/en/grant.html'>".'Privileges'."</a>";$i=0;foreach($Ba
as$oa=>$I){echo'<th>'.($oa!="*.*"?"<input name='objects[$i]' value='".h($oa)."' size='10'>":"<input type='hidden' name='objects[$i]' value='*.*' size='10'>*.*");$i++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Mb=>$Bb){foreach((array)$L[$Mb]as$Ab=>$Wb){echo"<tr".odd()."><td".($Bb?">$Bb<td":" colspan='2'").' lang="en" title="'.h($Wb).'">'.h($Ab);$i=0;foreach($Ba
as$oa=>$I){$h="'grants[$i][".h(strtoupper($Ab))."]'";$q=$I[strtoupper($Ab)];if($Mb=="Server Admin"&&$oa!=(isset($Ba["*.*"])?"*.*":"")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$h><option><option value='1'".($q?" selected":"").">".'Grant'."<option value='0'".($q=="0"?" selected":"").">".'Revoke'."</select>";}else{echo"<td align='center'><input type='checkbox' name=$h value='1'".($q?" checked":"").($Ab=="All privileges"?" id='grants-$i-all'":($Ab=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$i-all');\"")).">";}$i++;}}}echo"</table>\n",'<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop"',$Ra,'>';}echo'</form>
';}elseif(isset($_GET["processlist"])){if($_POST&&!$o){$gc=0;foreach((array)$_POST["kill"]as$b){if(queries("KILL ".ereg_replace("[^0-9]+","",$b))){$gc++;}}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$gc),$gc||!$_POST["kill"]);}page_header('Process list',$o);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);">
';$f=$d->query("SHOW PROCESSLIST");for($i=0;$a=$f->fetch_assoc();$i++){if(!$i){echo"<thead><tr lang='en'><th>&nbsp;<th>".implode("<th>",array_keys($a))."</thead>\n";}echo"<tr".odd()."><td>".checkbox("kill[]",$a["Id"],0)."<td>".implode("<td>",array_map('nbsp',$a))."\n";}echo'</table>
<p>
<input type="hidden" name="token" value="',$E,'">
<input type="submit" value="Kill">
</form>
';}elseif(isset($_GET["select"])){$j=$_GET["select"];$Z=table_status($j);$w=indexes($j);$l=fields($j);$F=column_foreign_keys($j);$Jd=array();$t=array();unset($Ka);foreach($l
as$e=>$c){$h=$p->fieldName($c);if(isset($c["privileges"]["select"])&&$h!=""){$t[$e]=html_entity_decode(strip_tags($h));if(ereg('text|blob',$c["type"])){$Ka=$p->selectLengthProcess();}}$Jd+=$c["privileges"];}list($v,$fa)=$p->selectColumnsProcess($t,$w);$D=$p->selectSearchProcess($l,$w);$Ja=$p->selectOrderProcess($l,$w);$ma=$p->selectLimitProcess();$eb=($v?implode(", ",$v):"*")."\nFROM ".idf_escape($j).($D?"\nWHERE ".implode(" AND ",$D):"");$qc=($fa&&count($fa)<count($v)?"\nGROUP BY ".implode(", ",$fa):"").($Ja?"\nORDER BY ".implode(", ",$Ja):"");if($_POST&&!$o){$hd="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$mc=($w["PRIMARY"]?($v?array_flip($w["PRIMARY"]["columns"]):array()):null);foreach($v
as$e=>$b){$b=$_GET["columns"][$e];if(!$b["fun"]){unset($mc[$b["col"]]);}}if($_POST["export"]){dump_headers($j);dump_table($j,"");if($_POST["format"]!="sql"){$a=array_keys($l);if($v){$a=array();foreach($v
as$b){$a[]=(ereg('^`(.*)`$',$b,$k)?idf_unescape($k[1]):$b);}}dump_csv($a);}if(!is_array($_POST["check"])||$mc===array()){dump_data($j,"INSERT","SELECT $eb".(is_array($_POST["check"])?($D?" AND ":" WHERE ")."($hd)":"").$qc);}else{$Id=array();foreach($_POST["check"]as$b){$Id[]="(SELECT $eb ".($D?"AND ":"WHERE ").where_check($b).$qc." LIMIT 1)";}dump_data($j,"INSERT",implode(" UNION ALL ",$Id));}exit;}if(!$p->selectEmailProcess($D,$F)){if(!$_POST["import"]){$f=true;$db=0;$sc=($_POST["delete"]?"DELETE FROM ":($_POST["clone"]?"INSERT INTO ":"UPDATE ")).idf_escape($j);$u=array();if(!$_POST["delete"]){foreach($t
as$h=>$b){$b=process_input($l[$h]);if($_POST["clone"]){$u[idf_escape($h)]=($b!==false?$b:idf_escape($h));}elseif($b!==false){$u[]=idf_escape($h)." = $b";}}$sc.=($_POST["clone"]?" (".implode(", ",array_keys($u)).")\nSELECT ".implode(", ",$u)."\nFROM ".idf_escape($j):" SET\n".implode(",\n",$u));}if($_POST["delete"]||$u){if($_POST["all"]||($mc===array()&&$_POST["check"])){$f=queries($sc.($_POST["all"]?($D?"\nWHERE ".implode(" AND ",$D):""):"\nWHERE $hd"));$db=$d->affected_rows;}else{foreach((array)$_POST["check"]as$b){$f=queries($sc."\nWHERE ".where_check($b).(count($fa)<count($v)?"":"\nLIMIT 1"));if(!$f){break;}$db+=$d->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(array('%d item has been affected.','%d items have been affected.'),$db),$f);}elseif(is_string($O=get_file("csv_file",true))){$O=preg_replace("~^\xEF\xBB\xBF~",'',$O);$f=true;$Ma=array_keys($l);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$O,$P);$db=count($P[0]);queries("START TRANSACTION");foreach($P[0]as$e=>$b){preg_match_all('~(("[^"]*")+|[^,]*),~',"$b,",$rc);if(!$e&&!array_diff($rc[1],$Ma)){$Ma=$rc[1];$db--;}else{$u="";foreach($rc[1]as$i=>$Lb){$u.=", ".idf_escape($Ma[$i])." = ".($Lb==""&&$l[$Ma[$i]]["null"]?"NULL":$d->quote(str_replace('""','"',preg_replace('~^"|"$~','',$Lb))));}$u=substr($u,1);$f=queries("INSERT INTO ".idf_escape($_GET["select"])." SET$u ON DUPLICATE KEY UPDATE$u");if(!$f){break;}}}if($f){queries("COMMIT");}queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$db),$f);queries("ROLLBACK");}else{$o=upload_error($O);}}}$Y=$p->tableName($Z);page_header('Select'.": $Y",$o);$u=null;if(isset($Jd["insert"])){$u="";foreach((array)$_GET["where"]as$b){if(count($F[$b["col"]])==1&&($b["op"]=="="||(!$b["op"]&&!ereg('[_%]',$b["val"])))){$u.="&set".urlencode("[".bracket_escape($b["col"])."]")."=".urlencode($b["val"]);}}}$p->selectLinks($Z,$u);if(!$t){echo"<p class='error'>".'Unable to select the table'.($l?"":": ".error()).".\n";}else{echo"<form action='' id='form'>\n","<div style='display: none;'>",($_GET["server"]!=""?'<input type="hidden" name="server" value="'.h($_GET["server"]).'">':""),(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">':"");echo'<input type="hidden" name="select" value="'.h($j).'">',"</div>\n";$p->selectColumnsPrint($v,$t);$p->selectSearchPrint($D,$t,$w);$p->selectOrderPrint($Ja,$t,$w);$p->selectLimitPrint($ma);$p->selectLengthPrint($Ka);$p->selectActionPrint($Ka);echo"</form>\n";$m="SELECT ".(intval($ma)&&$fa&&count($fa)<count($v)?"SQL_CALC_FOUND_ROWS ":"").$eb.$qc.($ma!=""?"\nLIMIT ".intval($ma).($_GET["page"]?" OFFSET ".($ma*$_GET["page"]):""):"");echo$p->selectQuery($m);$f=$d->query($m);if(!$f){echo"<p class='error'>".error()."\n";}else{$Xb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";if(!$f->num_rows){echo"<p class='message'>".'No rows.'."\n";}else{$Qa=array();while($a=$f->fetch_assoc()){$Qa[]=$a;}$Gb=(intval($ma)&&$fa&&count($fa)<count($v)?$d->result($d->query(" SELECT FOUND_ROWS()")):count($Qa));$bd=$p->backwardKeys($j,$Y);echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n","<thead><tr><td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'>";$Bc=array();reset($v);$Ja=1;foreach($Qa[0]as$e=>$b){$b=$_GET["columns"][key($v)];$c=$l[$v?$b["col"]:$e];$h=($c?$p->fieldName($c,$Ja):"*");if($h!=""){$Ja++;$Bc[$e]=$h;echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($e).($_GET["order"][0]==$e&&!$_GET["desc"][0]?'&desc%5B0%5D=1':'')).'">'.apply_sql_function($b["fun"],$h)."</a>";}next($v);}echo($bd?"<th>".'Relations':"")."</thead>\n";foreach($p->rowDescriptions($Qa,$F)as$G=>$a){$xc=unique_array($a,$w);$Db="";foreach($xc
as$e=>$b){$Db.="&".(isset($b)?urlencode("where[".bracket_escape($e)."]")."=".urlencode($b):"null%5B%5D=".urlencode($e));}echo"<tr".odd()."><td>".checkbox("check[]",substr($Db,1),in_array(substr($Db,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($v)!=count($fa)||information_schema(DB)?'':" <a href='".h(ME."edit=".urlencode($j).$Db)."'>".'edit'."</a>");foreach($a
as$e=>$b){if(isset($Bc[$e])){$c=$l[$e];if($b!=""&&(!isset($Xb[$e])||$Xb[$e]!="")){$Xb[$e]=(is_email($b)?$Bc[$e]:"");}$y="";$b=$p->editVal($b,$c);if(!isset($b)){$b="<i>NULL</i>";}else{if(ereg('blob|binary',$c["type"])&&$b!=""){$y=h(ME.'download='.urlencode($j).'&field='.urlencode($e).$Db);}if($b==""){$b="&nbsp;";}elseif($Ka!=""&&ereg('text|blob',$c["type"])&&is_utf8($b)){$b=shorten_utf8($b,max(0,intval($Ka)));}else{$b=h($b);}if(!$y){foreach((array)$F[$e]as$H){if(count($F[$e])==1||count($H["source"])==1){foreach($H["source"]as$i=>$X){$y.=where_link($i,$H["target"][$i],$Qa[$G][$X]);}$y=h(($H["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($H["db"]),ME):ME).'select='.urlencode($H["table"]).$y);break;}}}if($e=="COUNT(*)"){$y=h(ME."select=".urlencode($j));$i=0;foreach((array)$_GET["where"]as$r){if(!array_key_exists($r["col"],$xc)){$y.=h(where_link($i++,$r["col"],$r["val"],urlencode($r["op"])));}}foreach($xc
as$ea=>$r){$y.=h(where_link($i++,$ea,$r,(isset($r)?"=":"IS NULL")));}}}if(!$y&&is_email($b)){$y="mailto:$b";}if(!$y&&is_url($a[$e])){$y="http://www.adminer.org/redirect/?url=".urlencode($a[$e]);}$b=$p->selectVal($b,$y,$c);echo"<td>$b";}}$p->backwardKeysPrint($bd,$Qa[$G]);echo"</tr>\n";}echo"</table>\n";if(intval($ma)&&count($fa)>=count($v)){ob_flush();flush();$Gb=$d->result($d->query("SELECT COUNT(*) FROM ".idf_escape($j).($D?" WHERE ".implode(" AND ",$D):"")));}echo"<p class='pages'>";if(intval($ma)&&$Gb>$ma){$nc=floor(($Gb-1)/$ma);echo'Page'.":".pagination(0).($_GET["page"]>3?" ...":"");for($i=max(1,$_GET["page"]-2);$i<min($nc,$_GET["page"]+3);$i++){echo
pagination($i);}echo($_GET["page"]+3<$nc?" ...":"").pagination($nc);}echo" (".lang(array('%d row','%d rows'),$Gb).") ".checkbox("all",1,0,'whole result')."\n",(information_schema(DB)?"":"<fieldset><legend>".'Edit'."</legend><div><input type='submit' name='edit' value='".'Edit'."'> <input type='submit' name='clone' value='".'Clone'."'> <input type='submit' name='delete' value='".'Delete'."' onclick=\"return confirm('".'Are you sure?'." (' + (this.form['all'].checked ? $Gb : formChecked(this, /check/)) + ')');\"></div></fieldset>\n");print_fieldset("export",'Export');echo$p->dumpOutput(1)." ".$p->dumpFormat(1);echo" <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}print_fieldset("import",'CSV Import',!$f->num_rows);echo"<input type='hidden' name='token' value='$E'><input type='file' name='csv_file'> <input type='submit' name='import' value='".'Import'."'>\n","</div></fieldset>\n";$p->selectEmailPrint(array_filter($Xb,'strlen'),$t);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$La=isset($_GET["status"]);page_header($La?'Status':'Variables');$f=$d->query($La?"SHOW STATUS":"SHOW VARIABLES");echo"<table cellspacing='0'>\n";while($a=$f->fetch_assoc()){echo"<tr>","<th><code class='jush-".($La?"sqlstatus":"sqlset")."'>".h($a["Variable_name"])."</code>","<td>".nbsp($a["Value"]);}echo"</table>\n";}else{$kc=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($kc&&!$o&&!$_POST["search"]){$f=true;$la="";if(count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"])){queries("SET foreign_key_checks = 0");}if(isset($_POST["truncate"])){foreach((array)$_POST["tables"]as$n){if(!queries("TRUNCATE ".idf_escape($n))){$f=false;break;}}$la='Tables have been truncated.';}elseif(isset($_POST["move"])){$qd=array();foreach($kc
as$n){$qd[]=idf_escape($n)." TO ".idf_escape($_POST["target"]).".".idf_escape($n);}$f=queries("RENAME TABLE ".implode(", ",$qd));$la='Tables have been moved.';}elseif((!isset($_POST["drop"])||!$_POST["views"]||queries("DROP VIEW ".implode(", ",array_map('idf_escape',$_POST["views"]))))&&(!$_POST["tables"]||($f=queries((isset($_POST["optimize"])?"OPTIMIZE":(isset($_POST["check"])?"CHECK":(isset($_POST["repair"])?"REPAIR":(isset($_POST["drop"])?"DROP":"ANALYZE"))))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))))){if(isset($_POST["drop"])){$la='Tables have been dropped.';}else{while($a=$f->fetch_assoc()){$la.=h("$a[Table]: $a[Msg_text]")."<br>";}}}queries_redirect(substr(ME,0,-1),$la,$f);}page_header('Database'.": ".h(DB),$o,false);echo'<p><a href="'.h(ME).'database=">'.'Alter database'."</a>\n",'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n","<h3>".'Tables and views'."</h3>\n";$Z=table_status();if(!$Z){echo"<p class='message'>".'No tables.'."\n";}else{echo"<form action='' method='post'>\n","<p><input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Search'."'>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE";$_GET["where"][0]["val"]="%$_POST[query]%";search_tables();}echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);"><th>'.'Table'.'<td>'.'Engine'.'<td>'.'Collation'.'<td>'.'Data Length'.'<td>'.'Index Length'.'<td>'.'Data Free'.'<td>'.'Auto Increment'.'<td>'.'Rows'.'<td>'.'Comment'."</thead>\n";$rd=array();foreach($Z
as$a){$h=$a["Name"];echo'<tr'.odd().'><td>'.checkbox((isset($a["Rows"])?"tables[]":"views[]"),$h,in_array($h,$kc,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($h).'">'.h($h).'</a>';if(isset($a["Rows"])){echo"<td>$a[Engine]<td>$a[Collation]";foreach(array("Data_length"=>"create","Index_length"=>"indexes","Data_free"=>"edit","Auto_increment"=>"auto_increment=1&create","Rows"=>"select")as$e=>$y){$b=number_format($a[$e],0,'.',',');echo'<td align="right">'.($a[$e]!=""?'<a href="'.h(ME."$y=").urlencode($h).'">'.str_replace(" ","&nbsp;",($e=="Rows"&&$a["Engine"]=="InnoDB"&&$b?sprintf('~ %s',$b):$b)).'</a>':'&nbsp;');$rd[$y]+=($a["Engine"]!="InnoDB"||$y!="edit"?$a[$e]:0);}echo"<td>".nbsp($a["Comment"]);}else{echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($h).'">'.'View'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($h).'">?</a>','<td>&nbsp;';}}echo"<tr><td>&nbsp;<th>".sprintf('%d in total',count($Z)),"<td>".$d->result($d->query("SELECT @@storage_engine")),"<td>".db_collation(DB,collations());foreach(array("create","indexes","edit")as$b){echo"<td align='right'>".number_format($rd[$b],0,'.',',');}echo"</table>\n";if(!information_schema(DB)){echo"<p><input type='hidden' name='token' value='$E'><input type='submit' value='".'Analyze'."'> <input type='submit' name='optimize' value='".'Optimize'."'> <input type='submit' name='check' value='".'Check'."'> <input type='submit' name='repair' value='".'Repair'."'> <input type='submit' name='truncate' value='".'Truncate'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /tables/) + ')');\"> <input type='submit' name='drop' value='".'Drop'."' onclick=\"return confirm('".'Are you sure?'." (' + formChecked(this, /tables|views/) + ')');\">\n";$fb=get_databases();if(count($fb)!=1){$x=(isset($_POST["target"])?$_POST["target"]:DB);echo"<p>".'Move to other database'.($fb?": ".html_select("target",$fb,$x):': <input name="target" value="'.h($x).'">')." <input type='submit' name='move' value='".'Move'."'>\n";}}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.'Create table'."</a>\n";if($d->server_info>=5){echo'<a href="'.h(ME).'view=">'.'Create view'."</a>\n","<h3>".'Routines'."</h3>\n";$f=$d->query("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".$d->quote(DB));if($f->num_rows){echo"<table cellspacing='0'>\n";while($a=$f->fetch_assoc()){echo"<tr>","<td>".h($a["ROUTINE_TYPE"]),'<th><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'callf=':'call=').urlencode($a["ROUTINE_NAME"]).'">'.h($a["ROUTINE_NAME"]).'</a>','<td><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'function=':'procedure=').urlencode($a["ROUTINE_NAME"]).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p><a href="'.h(ME).'procedure=">'.'Create procedure'.'</a> <a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if($d->server_info>=5.1&&($f=$d->query("SHOW EVENTS"))){echo"<h3>".'Events'."</h3>\n";if($f->num_rows){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."</thead>\n";while($a=$f->fetch_assoc()){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($a["Name"]).'">'.h($a["Name"])."</a>","<td>".($a["Execute at"]?'At given time'."<td>".$a["Execute at"]:'Every'." ".$a["Interval value"]." ".$a["Interval field"]."<td>$a[Starts]"),"<td>$a[Ends]";}echo"</table>\n";}echo'<p><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}}page_footer();