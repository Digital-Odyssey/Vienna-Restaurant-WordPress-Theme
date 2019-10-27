<?php  $enableTooltip = get_theme_mod('enableTooltip', 'on'); ?>

<div class="pm-single-post-share-container half-width">
    <p><?php esc_html_e('Share this with friends','viennatheme'); ?></p>
    <ul class="pm-single-post-share-list half-width">
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Facebook', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="http://www.facebook.com/share.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" class="fa fa-facebook fb"></a>
        </li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Twitter', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="fa fa-twitter tw"></a>
        </li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Google Plus', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank" class="fa fa-google-plus gp"></a>
        </li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Digg', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="http://digg.com/submit?url=<?php urlencode(the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="fa fa-digg" target="_blank">
        </a></li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Delicious', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="https://delicious.com/save?v=5&amp;provider=<?php echo $_SERVER['SERVER_NAME']; ?>&amp;noui&amp;jump=close&amp;url=<?php urlencode(the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="fa fa-delicious" target="_blank"></a>
        </li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('Reddit', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="http://reddit.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="fa fa-reddit" target="_blank"></a>
        </li>
        <li <?php echo $enableTooltip == 'on' ? 'title="'. esc_html__('StumbleUpon', 'viennatheme') .'"' : '' ?> class="<?php echo $enableTooltip == 'on' ? 'pm_tip_static_top' : '' ?>">
        	<a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" class="fa fa-stumbleupon" target="_blank"></a>
        </li>
    </ul>
</div>