<?php /* Template Name: Blog Template */ ?>
<?php get_header(); ?>

<?php 
	$getPageLayout = get_post_meta(get_the_ID(), 'pm_page_layout_meta', true);
	$pageLayout = $getPageLayout !== '' ? $getPageLayout : 'no-sidebar';
?>


<?php
	//global $paged;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$arguments = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged,
		//'tag' => get_query_var('tag')
	);

	$blog_query = new WP_Query($arguments);

?>

<div class="container pm-containerPadding80">
    <div class="row">
    
    	<div class="col-lg-12 col-md-12 col-sm-12">
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; else: ?>
            <?php endif; ?>
        </div>

		<?php if($pageLayout === 'no-sidebar') { ?>
        
        	<div class="col-lg-12 col-md-12 col-sm-12 pm-main-posts">
            
            	<?php if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        		
                	<?php get_template_part( 'content', 'fullpost' ); ?>
                
                <?php endwhile; else: ?>
                     <p><?php esc_html_e('No posts were found.', 'viennatheme'); ?></p>
                <?php endif; ?> 
                
                <?php get_template_part( 'content', 'pagination' ); ?>
                
                <?php wp_reset_postdata(); ?> 
            
            </div>
            
        <?php }  ?>
        
        <?php if($pageLayout === 'right-sidebar') {?>
                        
            <!-- Retrive right sidebar post template -->
            <div class="col-lg-8 col-md-8 col-sm-12 pm-main-posts sidebar">
            
				<?php if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        		
                	<?php get_template_part( 'content', 'halfpost' ); ?>
                
                <?php endwhile; else: ?>
                     <p><?php esc_html_e('No posts were found.', 'viennatheme'); ?></p>
                <?php endif; ?> 
                
                <?php get_template_part( 'content', 'pagination' ); ?>
                
                <?php wp_reset_postdata(); ?> 
                            
            </div>
            
             <!-- Right Sidebar -->
             <?php get_sidebar('blog'); ?>
             <!-- /Right Sidebar -->
             
        <?php }  ?>
        
        <?php if($pageLayout === 'left-sidebar') { ?>
                
        	 <!-- Left Sidebar -->
             <?php get_sidebar('blog'); ?>
             <!-- /Left Sidebar -->
        
            <!-- Retrive right sidebar post template -->
            <div class="col-lg-8 col-md-8 col-sm-8 pm-main-posts sidebar">
            
				<?php if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        		
                	<?php get_template_part( 'content', 'halfpost' ); ?>
                
                <?php endwhile; else: ?>
                     <p><?php esc_html_e('No posts were found.', 'viennatheme'); ?></p>
                <?php endif; ?> 
                
                <?php get_template_part( 'content', 'pagination' ); ?>
                
                <?php wp_reset_postdata(); ?> 
            
            </div>
        
        <?php }  ?>
    
	</div> <!-- /row -->
</div> <!-- /container -->

<?php get_footer(); ?>