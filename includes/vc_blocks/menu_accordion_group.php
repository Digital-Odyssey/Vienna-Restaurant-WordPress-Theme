<?php

if(!class_exists('WPBakeryShortCode')) return;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_pm_ln_menu_accordion_group extends WPBakeryShortCodesContainer {
		
		protected function content($atts, $content = null) {

			//$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;
	
			extract(shortcode_atts(array(
				'el_id' => '',
				//'expand_options' => 'off',
				//'link_color' => '#ffffff'
			), $atts));
	
	
			/* ================  Render Shortcodes ================ */
	
			ob_start();
			
			$GLOBALS['pm_ln_accordion_id'] = (int) $el_id;
			$GLOBALS['pm_ln_accordion_count'] = 0;
			
			?>
			
			<?php 
				//$img = wp_get_attachment_image_src($el_image, "large"); 
				//$imgSrc = $img[0];
			?>
	
			<!-- Element Code start -->
			
            <div class="panel-group" id="accordion<?php $GLOBALS['pm_ln_accordion_id']; ?>" role="tablist" aria-multiselectable="true"><?php echo do_shortcode($content); ?></div>
            
			<!-- Element Code / END -->
	
			<?php
	
			$output = ob_get_clean();
	
			/* ================  Render Shortcodes ================ */
	
			return $output;
	
		}
		
    }
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_pm_ln_menu_accordion_group_item extends WPBakeryShortCode {
		
		protected function content($atts, $content = null) {

			//$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;
	
			extract(shortcode_atts(array(
				"el_title" => '',
				"el_menu_item_start_date" => '',
				"el_menu_item_end_date" => '',
				"display_expired_menu_items" => 'yes'
				), 
			$atts));
	
	
			/* ================  Render Shortcodes ================ */
	
			ob_start();
	
			?>
			
			<?php 
				//$img = wp_get_attachment_image_src($el_image, "large"); 
				//$imgSrc = $img[0];
			?>
	
			<!-- Element Code start -->
			
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $GLOBALS['pm_ln_accordion_count']; ?>">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion<?php echo $GLOBALS['pm_ln_accordion_id']; ?>" href="#<?php echo $GLOBALS['pm_ln_accordion_id'].'collapse'.$GLOBALS['pm_ln_accordion_count']; ?>" class="pm-accordion-link" aria-expanded="true" aria-controls="collapse<?php echo $GLOBALS['pm_ln_accordion_count']; ?>"><i class="fa fa-plus"></i>
                      <?php esc_attr_e($el_title); ?>
                    </a>
                  </h4>
                </div>
                <div id="<?php echo $GLOBALS['pm_ln_accordion_id'].'collapse'.$GLOBALS['pm_ln_accordion_count']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $GLOBALS['pm_ln_accordion_count']; ?>">
                  <div class="panel-body menu-accordion-item">
                  
                  	<?php //echo 'el_menu_item_start_date = ' . $el_menu_item_start_date; ?>
                    <?php //echo 'el_menu_item_end_date = ' . $el_menu_item_end_date; ?>
                  
                  	<?php 
					
						$arguments = array(
							'post_type' => 'post_menus',
							'post_status' => 'publish',
							'order' => (string) trim($post_order),
							'posts_per_page' => $num_of_posts,
						);
						
						$menu_query = new WP_Query($arguments);
						
						$displayMenuPostImage = get_theme_mod('displayMenuPostImage', 'on');
						
						$el_menu_item_start_date_final = date("Y/m/d", strtotime($el_menu_item_start_date));
                        $el_menu_item_end_date_final = date("Y/m/d", strtotime($el_menu_item_end_date));
						$currentDate = date("Y/m/d");
						
						
					
					?>
                    
                    <?php if( new DateTime($currentDate) > new DateTime($el_menu_item_end_date_final) && $display_expired_menu_items === 'no' ) { ?>
									
                        <p><?php esc_attr_e('This menu is no longer available.', 'viennatheme'); ?></p>
                                                                
                    <?php } else { ?>
                    
                        <?php  if ($menu_query->have_posts()) : while ($menu_query->have_posts()) : $menu_query->the_post(); ?>
                    
							<?php 
                        
								$pm_menu_date_range_entries = get_post_meta( get_the_ID(), 'pm_menu_date_range_entries', true ); //ARRAY VALUE
														
                                $pm_menu_start_date_range_meta = '';
								$pm_menu_end_date_range_meta = '';
								
								//extract the dates
								if( is_array($pm_menu_date_range_entries) ){
									
									foreach( $pm_menu_date_range_entries as $val ) {
									
										$start_date = $val['startdate'];
										$end_date = $val['enddate'];
										
										if($start_date == $el_menu_item_start_date && $end_date == $el_menu_item_end_date) {
											$pm_menu_start_date_range_meta = $start_date;
											$pm_menu_end_date_range_meta = $end_date;
										}
										
										
									}
									
								}
								
								
								                            
                                $pm_menu_image_meta = get_post_meta(get_the_ID(), 'pm_menu_image_meta', true);
                                $pm_menu_item_price_meta = get_post_meta(get_the_ID(), 'pm_menu_item_price_meta', true);
                            ?>
                            
                            <?php 
                            
                                //check if menu accordion item dates match with menu item dates
								
								
                                if( $el_menu_item_start_date == $pm_menu_start_date_range_meta && $el_menu_item_end_date == $pm_menu_end_date_range_meta ) {
                                    
                                    //Display menu item
                                    ?>
                                    
                                        <div class="col-lg-4 col-md-4 col-sm-12 pm-column-spacing">	
                                            
                                            <div class="pm-menu-item-container">
                                                
                                                <?php if($displayMenuPostImage === 'on') : ?>
                                                
                                                    <?php if($pm_menu_image_meta !== '') : ?>
                                                    
                                                        <div class="pm-menu-item-img-container">
                                                            <img src="<?php echo esc_url($pm_menu_image_meta); ?>" alt="<?php the_title(); ?>" />
                                                            <?php if($pm_menu_item_price_meta !== ''){ ?>
                                                                <div class="pm-menu-item-price"><p><?php esc_attr_e($pm_menu_item_price_meta); ?></p></div>	
                                                           <?php } ?>
                                                        </div>
                                                    
                                                    <?php endif; ?>
                                                
                                                <?php endif; ?>
                                                                                
                                                <div class="pm-menu-item-desc">
                                                
                                                    <?php if($display_readmore === 'on') { ?>
                                                        <p class="pm-menu-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                                    <?php } else { ?>
                                                        <p class="pm-menu-item-title"><?php the_title(); ?></p>
                                                    <?php } ?>
                                                
                                                    
                                                    <?php if( $pm_menu_image_meta === '' ) : ?>
                                                    
                                                        <?php if($pm_menu_item_price_meta !== ''){ ?>
                                                            <p class="pm-menu-price-secondary pm-primary"><?php esc_attr_e($pm_menu_item_price_meta); ?></p>	
                                                        <?php } ?>
                                                    
                                                    <?php endif; ?>
                                                                                        
                                                    <?php $excerpt = get_the_excerpt(); ?>
                                                    
                                                    <p class="pm-menu-item-excerpt"><?php esc_attr_e($excerpt); ?></p>	
                                                                                        
                                                    <?php if($display_readmore === 'on') : ?>
                                                        <p class="pm-news-post-continue" style="margin-bottom:0px;"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','viennatheme'); ?> &rarr;</a></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    <?php							
                                
                                } //end if
                            
                            ?>                    
                        
                        <?php endwhile; else: ?>
                             <div class="col-lg-12 pm-column-spacing">
                                <p><?php esc_html_e('No menu items were found.', 'viennatheme'); ?></p>
                             </div>
                       <?php endif; ?>
                        
                    <?php } ?>
                                      
                    
                  </div>
                </div>
              </div>
            
            <?php $GLOBALS['pm_ln_accordion_count']++; ?>
            
			<!-- Element Code / END -->
	
			<?php
	
			$output = ob_get_clean();
	
			/* ================  Render Shortcodes ================ */
	
			return $output;
	
		}
		
    }
}


vc_map( array(
    "name" => __("Menu Accordion", 'viennatheme'),
    "base" => "pm_ln_menu_accordion_group",
	"category"  => __("Vienna Shortcodes", 'viennatheme'),
    "as_parent" => array('only' => 'pm_ln_menu_accordion_group_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
	
        // add params same as with any other content element	
		array(
            "type" => "textfield",
            "heading" => __("Element ID", 'viennatheme'),
            "param_name" => "el_id",
            "description" => __("Assign a unique number value for this Menu Accordion. If you are creating multiple menu accordions on a single page please make sure each accordion has a unique number assigned to it in order to avoid conflicts between menus.", 'viennatheme'),
			"value" => ''
        ),
		
		
    ),
    "js_view" => 'VcColumnView'
) );

vc_map( array(
    "name" => __("Menu Accordion Item", 'viennatheme'),
    "base" => "pm_ln_menu_accordion_group_item",
	"category"  => __("Vienna Shortcodes", 'viennatheme'),
    "content_element" => true,
    "as_child" => array('only' => 'pm_ln_menu_accordion_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
	
        // add params same as with any other content element		
		array(
            "type" => "textfield",
            "heading" => __("Title", 'viennatheme'),
            "param_name" => "el_title",
            //"description" => __("Enter a start date value if required. Ex. 03/07/2017", 'viennatheme'),
			"value" => ''
        ),
		
        array(
            "type" => "textfield",
            "heading" => __("Start Date", 'viennatheme'),
            "param_name" => "el_menu_item_start_date",
            "description" => __("Enter a start date value (Ex. 2017-04-26). This field is required.", 'viennatheme'),
			"value" => ''
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("End Date", 'viennatheme'),
            "param_name" => "el_menu_item_end_date",
            "description" => __("Enter an end date value if required (Ex. 2017-05-03). This field is required.", 'viennatheme'),
			"value" => ''
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Display expired menu items?", 'viennatheme'),
            "param_name" => "display_expired_menu_items",
            "description" => __("Hide menu items based on the end date.", 'viennatheme'),
			"value"      => array( 'yes' => 'yes', 'no' => 'no' ), //Add default value in $atts
        ),
		
		/*array(
            "type" => "textarea_html",
            "heading" => __("Content", 'viennatheme'),
            "param_name" => "content",
            //"description" => __("Enter a title", 'viennatheme'),
        ),*/
				
		
    )
) );