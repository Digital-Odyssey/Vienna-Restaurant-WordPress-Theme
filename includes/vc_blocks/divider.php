<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_content_divider extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $margin_top = $margin_bottom = $divider_style = $fancy_title = $color_selection = '' ;

        extract(shortcode_atts(array(  			
			"height" => '1',
			"bg_color" => 'orange',
			"margin" => 20
		), $atts)); 


        /* ================  Render Shortcodes ================ */

        ob_start();

        ?>

        <!-- Element Code start -->
        
       <div class="pm-divider" style="height:<?php esc_attr_e($height); ?>px; background-color:<?php esc_attr_e($bg_color) ?>; margin:<?php esc_attr_e($margin); ?>px 0px;"></div>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_content_divider",
    "name"      => __("Content Divider", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(
		
		array(
            "type" => "textfield",
            "heading" => __("Height", 'viennatheme'),
            "param_name" => "height",
            "description" => __("Accepts a positive integer value.", 'viennatheme'),
			"value" => '1'
        ),
		
		array(
            "type" => "colorpicker",
            "heading" => __("Background Color", 'viennatheme'),
            "param_name" => "bg_color",
            //"description" => __("Enter a positive integer for the bottom margin spacing.", 'viennatheme'),
			"value" => 'orange'
        ),		
	
		array(
            "type" => "textfield",
            "heading" => __("Margin", 'viennatheme'),
            "param_name" => "margin",
            "description" => __("Accepts a positive integer value.", 'viennatheme'),
			"value" => 20
        ),
		
		

    )

));