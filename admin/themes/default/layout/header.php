<div class="top_line">&nbsp;</div>
<div class="logo_area">
   <div class="logo">
      <img src="<?=$theme->themePath("css/images/Ginsenlogo.png")?>">
   </div>
   
   <div class="cms_title">Ginsen Information Management System</div>
   <div class="current_lang">
       <span class="language"><?=strtoupper($current_lang)?></span>
       <span class="logout"><a href="<?=site_url("Login/logout")?>">Log Out</a></span>
   </div>
   
   <div class="clear"></div>
</div>

<nav class="header">
   <?get_plugins($plugin_name)?>
</nav>