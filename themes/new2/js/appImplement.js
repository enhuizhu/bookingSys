var mySwiper=null;
var current_week_num=0;
window.onload = function() {
  mySwiper = new Swiper('.swiper-container',{
    //Your options here:
    mode:'horizontal',
    loop: false
    //etc..
  });  
}

function next_week(){
  if(is_last_slide()){
     add_slide();
  }else{
     mySwiper.swipeNext();
  }
}


function is_last_slide(){
  /*get the lengh of slide*/
   var slid_num=jQuery(".swiper-slide").length;
   if(mySwiper.activeIndex==slid_num-1){
      return true;
   }
   return false;
}


function add_slide(){
 //Create new instance of slide:
var newSlide = mySwiper.createSlide('<p>loading..</p>');
newSlide.append() // - new slide will be added as the last slide of slider after all existing slides
current_week_num++;
last_slide=jQuery(".swiper-slide:last-child");
/*do the animation*/
mySwiper.swipeNext();
jQuery.ajax({
   url:site_url("booking/ajax_schedule"),
   type:"post",
   data:"week_num="+current_week_num,
   beforeSend:function(xhr){
      
   },
   success:function(data){
      last_slide.html(data);
	 }
 });

}


jQuery(document).ready(function(){
    jQuery("#next_btn").click(function(){
	    next_week();
	});

	jQuery("#pre_btn").click(function(){
	    mySwiper.swipePrev();
	});
	
	jQuery("[data-app_date]").click(function(){
	   var app_date=jQuery(this).attr("data-app_date");
	   var request_url=site_url("Booking/add_app?app_date="+app_date);
	   location.href=request_url;
	 });
	
});
