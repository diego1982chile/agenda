<div class="clear"></div><!-- end .clear --> 
<?php if (!$sf_user->isAuthenticated()) : ?> 
        <div id="content_wrap" class="content_bg_sidebar">
            <div class="corners_bottom_sidebar"></div><!-- end .corners_bottom_nosidebar -->
            <div class="corners_top_sidebar"></div><!-- end .corners_top_nosidebar -->
<?php else : ?>
            <div id="content_wrap" class="content_bg_nosidebar">
    	<div class="corners_bottom_nosidebar"></div><!-- end .corners_bottom_nosidebar -->
    	<div class="corners_top_nosidebar"></div><!-- end .corners_top_nosidebar -->   
    
<?php endif; ?>
