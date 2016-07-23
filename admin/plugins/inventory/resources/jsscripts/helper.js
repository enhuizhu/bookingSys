function show_send(){
    jQuery(".lay,.status").show();
}

function hide_send(){
     jQuery(".lay,.status").hide();
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

  function center_box(el){
    var win_w=jQuery(window).width();
	var win_h=jQuery(window).height();
	var box_w=jQuery(el).width();
	var box_h=jQuery(el).height();
	var pos_l=Math.round((win_w-box_w)/2);
	var pos_t=Math.round((win_h-box_h)/2);
	jQuery(el).css({"left":pos_l+"px","top":pos_t+"px"});
  }