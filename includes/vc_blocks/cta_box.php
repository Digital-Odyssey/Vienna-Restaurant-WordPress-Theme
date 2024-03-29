<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_cta_box extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(
			"title" => '',
			"icon" => 'fa fa-exclamation',
			"icon_color" => '#EF5438',
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();

        ?>
        
        <?php 
			//$img = wp_get_attachment_image_src($el_image, "large"); 
			//$imgSrc = $img[0];
		?>

        <!-- Element Code start -->
        
        <div class="pm-alert-message">
            <i class="<?php esc_attr_e($icon); ?>" style="background-color:<?php esc_attr_e($icon_color); ?>;"></i>
            <p class="pm-alert-title"><?php esc_attr_e($title); ?></p>
            <p class="pm-alert-details"><?php echo $content; ?></p>
        </div>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_cta_box",
    "name"      => __("Call to Action", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(
		
		array(
            "type" => "textfield",
            "heading" => __("Title", 'viennatheme'),
            "param_name" => "title",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => ''
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Icon", 'viennatheme'),
            "param_name" => "icon",
            "description" => __("Accepts a FontAwesome 4 value. (Ex. fa fa-exclamation)", 'viennatheme'),
			"value" => ''
        ),

		
		array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", 'viennatheme'),
            "param_name" => "icon_color",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => '#EF5438'
        ),
				
		
		array(
            "type" => "textarea_html",
            "heading" => __("Content", 'viennatheme'),
            "param_name" => "content",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			//"value" => 'Purchase Now'
        ),
		
		

    )

));