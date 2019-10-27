<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_event_items extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(
			"num_of_posts" => '3',
			"title" => 'Upcoming Events',
			"message" => 'Come and join us at our upcoming events across the city',
			"header_image" => '',
			"post_order" => 'DESC',
			"order_by_event_date" => 'no',
			"tag" => '',
			"display_tag_menu" => 'off',
			"display_expired_events" => 'no'
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();
		
		//Fetch data
		
		$todaysDate = date( 'Y-m-d' ); //This date format is required by WordPress to match dates
			
		if($tag !== ''){
			
			if( $display_expired_events === 'yes' ) {
				
				if($order_by_event_date === 'yes') {
				
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'tax_query' => array(
								array(
									'taxonomy' => 'eventtags',
									'field' => 'slug',
									'terms' => array( $tag )
								)
						),
						'posts_per_page' => $num_of_posts,
						'orderby' => 'meta_value',
						'meta_key' => 'pm_event_date_meta',
					);
					
				} else {
					
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'tax_query' => array(
								array(
									'taxonomy' => 'eventtags',
									'field' => 'slug',
									'terms' => array( $tag )
								)
						),
						'posts_per_page' => $num_of_posts,
					);
					
				}
				
			} else {
			
				if($order_by_event_date === 'yes') {
				
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'tax_query' => array(
								array(
									'taxonomy' => 'eventtags',
									'field' => 'slug',
									'terms' => array( $tag )
								)
						),
						'posts_per_page' => $num_of_posts,
						'orderby' => 'meta_value',
						'meta_key' => 'pm_event_date_meta',
						'meta_query' => array(
							array(
								'key' => 'pm_event_date_meta',
								'value' => $todaysDate,
								'compare' => '>=',
								'type' => 'DATE'
							)
						),
					);
					
				} else {
					
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'tax_query' => array(
								array(
									'taxonomy' => 'eventtags',
									'field' => 'slug',
									'terms' => array( $tag )
								)
						),
						'posts_per_page' => $num_of_posts,
						'meta_query' => array(
							array(
								'key' => 'pm_event_date_meta',
								'value' => $todaysDate,
								'compare' => '>=',
								'type' => 'DATE'
							)
						),
					);
					
				}
				
			}
			
			
			
		} else {
			
			if( $display_expired_events === 'yes' ) {
				
				if($order_by_event_date === 'yes') {
				
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'posts_per_page' => $num_of_posts,
						'orderby' => 'meta_value',
						'meta_key' => 'pm_event_date_meta',
					);
					
				} else {
					
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'posts_per_page' => $num_of_posts,
					);
					
				}//end if
				
			} else {
			
				if($order_by_event_date === 'yes') {
				
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'posts_per_page' => $num_of_posts,
						'orderby' => 'meta_value',
						'meta_key' => 'pm_event_date_meta',
						'meta_query' => array(
							array(
								'key' => 'pm_event_date_meta',
								'value' => $todaysDate,
								'compare' => '>=',
								'type' => 'DATE'
							)
						),
					);
					
				} else {
					
					$arguments = array(
						'post_type' => 'post_event',
						'post_status' => 'publish',
						'order' => (string) trim($post_order),
						'posts_per_page' => $num_of_posts,
						'meta_query' => array(
							array(
								'key' => 'pm_event_date_meta',
								'value' => $todaysDate,
								'compare' => '>=',
								'type' => 'DATE'
							)
						),
					);
					
				}//end if
			
			}//display_expired_events if
			
			
			
		}//end parent if
	
		$event_query = new WP_Query($arguments);

        ?>
        
        <?php 
			$img = wp_get_attachment_image_src($header_image, "full_size"); 
			$header_image = $img[0];
		?>

        <!-- Element Code start -->
        
        <div class="row">
	
            <div class="col-lg-12 pm-containerPadding-bottom-30 pm-containerPadding-top-30">
                <div class="pm-featured-header-container">
                    <div class="pm-featured-header-title-container" style="background-image:url(<?php echo esc_url($header_image); ?>);">
                        <p class="pm-featured-header-title"><?php esc_attr_e($title); ?></p>
                        <p class="pm-featured-header-message"><?php esc_attr_e($message); ?></p>
                    </div>
                </div>
                
                <?php if($display_tag_menu === 'on') : ?>
                
                    <div class="pm-isotope-filter-container shortcode">
                        <ul class="pm-isotope-filter-system">					
                            <li><a class="current"><?php esc_attr_e($tag); ?></a></li>							
                        </ul>
                    </div>
                
                <?php endif; ?>
                
            </div>
            
            <div<?php echo ($num_of_posts > 3 ? ' id="pm-eventItems-carousel"' : '') ?>>
            
                <?php if ($event_query->have_posts()) : while ($event_query->have_posts()) : $event_query->the_post(); ?>
                
                    <?php
						$pm_event_featured_image_meta = get_post_meta(get_the_ID(), 'pm_event_featured_image_meta', true);
						$pm_event_date_meta = get_post_meta(get_the_ID(), 'pm_event_date_meta', true);
						$month = date_i18n("M", strtotime($pm_event_date_meta));
						$day = date_i18n("d", strtotime($pm_event_date_meta));
						$year = date_i18n("Y", strtotime($pm_event_date_meta));
						$pm_event_fan_page_meta = get_post_meta(get_the_ID(), 'pm_event_fan_page_meta', true);
						$pm_event_start_time_meta = get_post_meta(get_the_ID(), 'pm_event_start_time_meta', true);
						$pm_event_end_time_meta = get_post_meta(get_the_ID(), 'pm_event_end_time_meta', true);
					?>
                    
                    <?php if($num_of_posts == "1"){ ?>
                        <div class="col-lg-12 pm-column-spacing">
                    <?php } elseif($num_of_posts == "2") { ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing">
                    <?php } elseif($num_of_posts == "3") { ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 pm-column-spacing">
                    <?php } else { ?>
                        <div class="pm-eventItem-carousel-item">	
                    <?php } ?>
                    
                        <div class="pm-event-item-container">
                            <div class="pm-event-item-img-container" style="background-image:url(<?php echo esc_url($pm_event_featured_image_meta); ?>);">
                                
                                <?php if( !empty($pm_event_date_meta) ) : ?>
                                
                                    <div class="pm-event-item-date">
                                        <p class="pm-event-item-month"><?php esc_attr_e($month); ?></p>
                                        <p class="pm-event-item-day"><?php esc_attr_e($day); ?></p>
                                    </div>
                                
                                <?php endif; ?>
                                
                            </div>
                            <div class="pm-event-item-desc">
                                <p class="pm-event-item-title"><?php the_title(); ?></p>
                                <div class="pm-event-item-divider"></div>
                                
                                <?php if($pm_event_start_time_meta !== '' && $pm_event_end_time_meta !== '') : ?>
                
                                    <p class="pm-event-item-times"><strong class="pm-primary"><?php  esc_html_e('START:', 'viennatheme') .'</strong> '. esc_attr_e($pm_event_start_time_meta) ?> <strong class="pm-primary"><?php  esc_html_e('END:', 'viennatheme') ?></strong> <?php esc_attr_e($pm_event_end_time_meta) ?></p>
                                
                                <?php endif; ?>
                                
                                <p class="pm-event-item-excerpt">
                                    <?php $excerpt = get_the_excerpt(); ?>
                                    <?php echo pm_ln_string_limit_words($excerpt,20); ?><a href="<?php the_permalink(); ?>"> {...}</a> 
                                </p>
                                <div class="pm-event-item-divider"></div>
                                <ul class="pm-event-item-btns">
                                    <li><a href="<?php the_permalink(); ?>" class="pm-rounded-btn small"><?php esc_html_e('More Info','viennatheme'); ?></a></li>
                                    <?php if($pm_event_fan_page_meta !== '') { ?>
                                        <li><a href="<?php echo esc_url($pm_event_fan_page_meta); ?>" class="pm-rounded-btn small event-fan-page" target="_blank"><i class="fa fa-facebook"></i> &nbsp;<?php esc_html_e('Fan Page','viennatheme'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                <?php endwhile; else: ?>
                     <div class="col-lg-12"><p><?php esc_html_e('No events were found.', 'viennatheme'); ?></p></div>
                <?php endif; ?>
            
            </div>
        
        </div>
        
        <!-- Element Code / END -->

		<?php wp_reset_postdata(); ?>

        <?php		

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_event_items",
    "name"      => __("Event Items", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(
			
		
		array(
            "type" => "dropdown",
            "heading" => __("Post Count", 'viennatheme'),
            "param_name" => "num_of_posts",
            "description" => __("Set the amount of posts you would like fetch. This field accepts a positive integer.", 'viennatheme'),
			"value"      => array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10' ), //Add default value in $atts
        ),
			
		array(
            "type" => "textfield",
            "heading" => __("Title", 'viennatheme'),
            "param_name" => "title",
            //"description" => __("Enter a typicon icon value.", 'viennatheme'),
			"value" => 'Upcoming Events',
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Message", 'viennatheme'),
            "param_name" => "message",
            //"description" => __("Enter a typicon icon value.", 'viennatheme'),
			"value" => 'Come and join us at our upcoming events across the city',
        ),
		
		array(
            "type" => "attach_image",
            "heading" => __("Header Image", 'viennatheme'),
            "param_name" => "header_image",
            //"description" => __("Upload an avatar for your testimonial. Recommended size 230x230px", 'viennatheme')
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Post Order", 'viennatheme'),
            "param_name" => "post_order",
            "description" => __("Set the order in which event posts are displayed.", 'viennatheme'),
			"value"      => array( 'DESC' => 'DESC', 'ASC' => 'ASC' ), //Add default value in $atts
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Order by date of event?", 'viennatheme'),
            "param_name" => "order_by_event_date",
            "description" => __("Display events in order of their event date rather than date published.", 'viennatheme'),
			"value"      => array( 'no' => 'no', 'yes' => 'yes' ), //Add default value in $atts
        ),
		
		
					
		array(
            "type" => "textfield",
            "heading" => __("Tag", 'viennatheme'),
            "param_name" => "tag",
            "description" => __("Fetch event posts by a particular tag. This field accepts a tag slug.", 'viennatheme'),
			"value" => '',
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Category", 'viennatheme'),
            "param_name" => "category",
            "description" => __("Fetch event posts by a particular category. This field accepts a category slug.", 'viennatheme'),
			"value" => '',
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Display Menu?", 'viennatheme'),
            "param_name" => "display_tag_menu",
            //"description" => __("Set the order in which service posts are displayed.", 'viennatheme'),
			"value"      => array( 'off' => 'off', 'on' => 'on' ), //Add default value in $atts
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Display expired events?", 'viennatheme'),
            "param_name" => "display_expired_events",
            //"description" => __("Set the order in which service posts are displayed.", 'viennatheme'),
			"value"      => array( 'no' => 'no', 'yes' => 'yes' ), //Add default value in $atts
        ),
				

    )

));