<?php /* Template Name: Staff Template */ ?>
<?php get_header(); ?>

<?php if($content = $post->post_content) { ?>

    <div class="container pm-containerPadding-top-80">
        <div class="row">
            <div class="col-lg-12">
            
                <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                    
                    <?php the_content(); ?>
                
                <?php endwhile; else: ?>
                     
                <?php endif; ?> 
            
            </div>
        </div>
    </div>

<?php } ?>

<?php 
	$terms = get_terms('staff_titles');
?>

<!-- Staff filter system -->
<?php if($content = $post->post_content) { ?>
	<div class="container pm-containerPadding-top-60 pm-containerPadding-bottom-80">
<?php } else { ?>
	<div class="container pm-containerPadding80">
<?php } ?>
    <div class="row">
    
        <div class="col-lg-12 pm-containerPadding-bottom-40">
            
            <div class="pm-featured-header-container">
            
            	<?php 
				
					global $vienna_options;
					
					$staff_panel_title = $vienna_options['staff-panel-title']; 
					$staff_panel_message = $vienna_options['staff-panel-message']; 
					$staff_panel_image = $vienna_options['staff-panel-image']; 
				
				?>
            
                <!-- Featured panel header -->
                <?php if($staff_panel_title !== '' || $staff_panel_message !== '' || $staff_panel_image['url'] !== '') : ?>
                
                    <div class="pm-featured-header-title-container" style="background-image:url(<?php echo esc_html($staff_panel_image['url']); ?>);">
                        <p class="pm-featured-header-title"><?php echo esc_attr($staff_panel_title); ?></p>
                        <p class="pm-featured-header-message"><?php echo esc_attr($staff_panel_message); ?></p>
                    </div>
                
                <?php endif; ?>                
                <!-- Featured panel header end -->
                
                <!-- Filter menu -->
                <div class="pm-isotope-filter-container">
                    <ul class="pm-isotope-filter-system">
                        <li class="pm-isotope-filter-system-expand"><?php esc_html_e('Expand', 'viennatheme'); ?> <i class="fa fa-angle-down"></i></li>
                        <li><a href="#" class="current" id="all"><?php esc_html_e('View all', 'viennatheme'); ?></a></li>
                        <?php
							foreach ($terms as $term) {
								echo '<li><a href="#" id="'.$term->slug.'">'.ucfirst($term->name).'</a></li>';	
							}
						?>
                    </ul>
                </div>
                <!-- Filter menu end -->
            
            </div>
            
        </div><!-- /.col-lg-12 -->
        
        <?php
			//global $paged;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
			$arguments = array(
				'post_type' => 'post_staff',
				'post_status' => 'publish',
				'paged' => $paged,
				'posts_per_page' => -1,
				//'posts_per_page' => $staffPostsDisplay,
				//'tag' => get_query_var('tag')
			);
		
			$blog_query = new WP_Query($arguments);
		
			pm_ln_set_query($blog_query);
			
			$count_posts = wp_count_posts('post_staff');
			$published_posts = $count_posts->publish;
			
		?>
        
        <div id="pm-isotope-item-container">
        
        	<?php if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        		
				<?php get_template_part( 'content', 'staffpost' ); ?>
            
            <?php endwhile; else: ?>
                 <p><?php esc_html_e('No staff profiles were found.', 'viennatheme'); ?></p>
            <?php endif; ?>
                        
            <?php pm_ln_restore_query(); ?> 
        
        </div>
        
        
                        
    </div>
</div>
<!-- Staff filter system end -->



<?php get_footer(); ?>