<?php
//Use this file to display page options (print and share icons)

$enableTooltip = get_theme_mod('enableTooltip', 'on');
?>

<div class="pm-page-share-options">
						
    <a href="#" class="pm-rounded-btn small" id="pm-print-btn" target="_self" ><?php esc_html_e('Print page', 'viennatheme'); ?> &nbsp;<i class="fa fa-print"></i></a>
    
    <ul class="pm-page-social-icons">
        <li class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>" <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Share on Google Plus', 'viennatheme') .'"' : '' ?>><a href="https://plus.google.com/share?url=<?php urlencode(the_permalink()); ?>" title="<?php esc_html_e('Share on Google Plus', 'viennatheme'); ?>" class="fa fa-google-plus" target="_blank"></a></li>
        <li class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>" <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Share on Twitter', 'viennatheme') .'"' : '' ?>><a href="http://twitter.com/home?status=<?php urlencode(the_title()); ?>" title="<?php esc_html_e('Share on Twitter', 'viennatheme'); ?>" class="fa fa-twitter" target="_blank"></a></li>
        <li class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>" <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Share on Facebook', 'viennatheme') .'"' : '' ?>><a href="http://www.facebook.com/share.php?u=<?php urlencode(the_permalink()); ?>" title="<?php esc_html_e('Share on Facebook', 'viennatheme'); ?>" class="fa fa-facebook" target="_blank"></a></li>
        
    </ul>
    
</div>