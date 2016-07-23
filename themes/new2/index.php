<?include "layout/tag_header.php"?>
<body class="page page-id-2567 page-template-default custom responsive pagelines-template-theme default full_width ">
<div id="site" class="fullwidth">
<div id="page" class="thepage">
<div class="page-canvas"> 
<?include "layout/header.php"?>

<?include "contents/main.php"?>
<div id="morefoot_area" class="container-group"></div>
<div class="clear"></div>
</div>
</div>
</div>

<?include "layout/footer.php"?>
</div>
<div class="lay"></div>
<?include "layout/loader.php"?>

<script language="javascript">
   function site_url(path){
      return "<?=SITE_URL?>"+path;
   }
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24670397-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script></body></html>