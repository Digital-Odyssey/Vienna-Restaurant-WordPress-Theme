<?php

if(!class_exists('WPBakeryShortCode')) return;

class WPBakeryShortCode_pm_ln_box_button extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        //$custom_css = $el_class = $title = $icon = $output = $s_content = $number = '' ;

        extract(shortcode_atts(array(			
			"link" => '#',
			"btn_text" => 'Learn More',
			"margin_top" => 0,
			"margin_bottom" => 0,
			"icon" => 'typcn typcn-vendor-microsoft',
			"target" => '_self',
        ), $atts));


        /* ================  Render Shortcodes ================ */

        ob_start();

        ?>
        
        <?php 
			//$img = wp_get_attachment_image_src($el_image, "large"); 
			//$imgSrc = $img[0];
		?>

        <!-- Element Code start -->
        
       	<div class="pm-icon-bundle" style="margin-top:<?php esc_attr_e($margin_top); ?>px; margin-bottom:<?php esc_attr_e($margin_bottom); ?>px;">
            <?php echo ($icon !== '' ? '<i class="'. esc_attr($icon).'"></i>' : ''); ?>
            <div class="pm-icon-bundle-content">
                <p><a href="<?php esc_attr_e($link); ?>" target="<?php esc_attr_e($target); ?>"><?php esc_attr_e($btn_text); ?> <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
        
        <!-- Element Code / END -->

        <?php

        $output = ob_get_clean();

        /* ================  Render Shortcodes ================ */

        return $output;

    }

}

vc_map( array(

    "base"      => "pm_ln_box_button",
    "name"      => __("Box Button", 'viennatheme'),
    "class"     => "",
    "icon"      => "icon-wpb-de_service",
    "category"  => __("Vienna Shortcodes", 'viennatheme'),
    "params"    => array(


		array(
            "type" => "textfield",
            "heading" => __("Link", 'viennatheme'),
            "param_name" => "link",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => '#'
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Button Text", 'viennatheme'),
            "param_name" => "btn_text",
            //"description" => __("Enter a CSS class if required.", 'viennatheme'),
			"value" => 'Learn More'
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Margin Top", 'viennatheme'),
            "param_name" => "margin_top",
            "description" => __("Enter a positive integer value.", 'viennatheme'),
			"value" => 0
        ),
		
		array(
            "type" => "textfield",
            "heading" => __("Margin Bottom", 'viennatheme'),
            "param_name" => "margin_bottom",
            "description" => __("Enter a positive integer value.", 'viennatheme'),
			"value" => 0
        ),
		
		array(
            "type" => "dropdown",
            "heading" => __("Target Window", 'viennatheme'),
            "param_name" => "target",
            "description" => __("Set the target window for the button.", 'viennatheme'),
			"value"      => array( '_self' => '_self', '_blank' => '_blank' ), //Add default value in $atts
        ),
				
		array(
            "type" => "textfield",
            "heading" => __("Icon", 'viennatheme'),
            "param_name" => "icon",
            "description" => __("Accepts a Typicon icon value. (Ex. typcn typcn-vendor-microsoft)", 'viennatheme'),
			"value" => 'typcn typcn-vendor-microsoft'
        ),
		


    )

));