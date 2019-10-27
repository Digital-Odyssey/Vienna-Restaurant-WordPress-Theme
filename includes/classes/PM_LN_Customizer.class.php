<?php

require_once( ABSPATH . WPINC . '/class-wp-customize-control.php' );

class PM_LN_Customizer {
	
	public static function register ( $wp_customize ) {
		
		/*** Remove default wordpress sections ***/
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
		
		/**** Google Options ****/
		$wp_customize->add_section( 'google_options' , array(
			'title'    => esc_html__( 'Google Options', 'viennatheme' ),
			'priority' => 1,
		));
		
		$wp_customize->add_setting(
			'googleAPIKey', array(
				'default' => "",
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'googleAPIKey',
			 array(
				'label' => esc_html__( 'API KEY', 'viennatheme' ),
			 	'section' => 'google_options',
				'description' => __('Insert your Google API key (browser key) to activate Google services such as Google Maps.', 'viennatheme'),
				'priority' => 1,
			 )
		);
		 
		
		/**** Header Options ****/
		$wp_customize->add_section( 'header_options' , array(
			'title'    => esc_html__( 'Header Options', 'viennatheme' ),
			'priority' => 20,
		));
		
		//Upload Options
		$wp_customize->add_setting( 'companyLogo', array(
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'companyLogo', 
			array(
				'label'    => esc_html__( 'Company Logo', 'viennatheme' ),
				'section'  => 'header_options',
				'settings' => 'companyLogo',
				'priority' => 1,
				) 
			) 
		);
		
		$wp_customize->add_setting( 'globalHeaderImage', array(
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'globalHeaderImage', 
			array(
				'label'    => esc_html__( 'Global Header Image', 'viennatheme' ),
				'description'    => esc_html__( 'Applies to inaccessible pages such as categories, tags, 404 etc.', 'viennatheme' ),
				'section'  => 'header_options',
				'settings' => 'globalHeaderImage',
				'priority' => 2,
				) 
			) 
		);
		
		$wp_customize->add_setting( 'globalPageHeaderImage', array(
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'globalPageHeaderImage', 
			array(
				'label'    => esc_html__( 'Global Page Header Image', 'viennatheme' ),
				'section'  => 'header_options',
				'description'    => esc_html__( 'Applies to all pages and posts.', 'viennatheme' ),
				'settings' => 'globalPageHeaderImage',
				'priority' => 3,
				) 
			) 
		);
		
		
		$wp_customize->add_setting( 'mainMenuBackgroundImage', array(
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'mainMenuBackgroundImage', 
			array(
				'label'    => esc_html__( 'Main Menu Background Image', 'viennatheme' ),
				'section'  => 'header_options',
				'settings' => 'mainMenuBackgroundImage',
				'priority' => 4,
				) 
			) 
		);
		
		$wp_customize->add_setting( 'subMenuBackgroundImage', array(
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'subMenuBackgroundImage', 
			array(
				'label'    => esc_html__( 'Micro Menu Background Image', 'viennatheme' ),
				'section'  => 'header_options',
				'settings' => 'subMenuBackgroundImage',
				'priority' => 5,
				) 
			) 
		);
		
		//Radio Options
		$wp_customize->add_setting('enableParallax', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableParallax', array(
			'label'      => esc_html__('Enable sub-header parallax?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableParallax',
			'priority' => 6,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('displayLogo', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayLogo', array(
			'label'      => esc_html__('Display Company Logo?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'displayLogo',
			'priority' => 7,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('displayLogoMobile', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayLogoMobile', array(
			'label'      => esc_html__('Display Company Logo on mobile?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'displayLogoMobile',
			'priority' => 8,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));

		
		$wp_customize->add_setting('enableStickyNav', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableStickyNav', array(
			'label'      => esc_html__('Sticky Navigation', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableStickyNav',
			'priority' => 9,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
					
		$wp_customize->add_setting('enableBreadCrumbs', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableBreadCrumbs', array(
			'label'      => esc_html__('Breadcrumbs', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableBreadCrumbs',
			'priority' => 10,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));

		
		$wp_customize->add_setting('enableSearch', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableSearch', array(
			'label'      => esc_html__('Enable Search?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableSearch',
			'priority' => 11,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('enableActionButton', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableActionButton', array(
			'label'      => esc_html__('Enable Action button?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableActionButton',
			'priority' => 12,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('enableMicroNavigation', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableMicroNavigation', array(
			'label'      => esc_html__('Enable Micro Navigation?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableMicroNavigation',
			'priority' => 13,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('enableHeaderSocialIcons', array(
			'default' => 'off',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableHeaderSocialIcons', array(
			'label'      => esc_html__('Enable Social Icons?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableHeaderSocialIcons',
			'priority' => 14,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		$wp_customize->add_setting('enableSubHeader', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableSubHeader', array(
			'label'      => esc_html__('Enable Sub-Header?', 'viennatheme'),
			'section'    => 'header_options',
			'settings'   => 'enableSubHeader',
			'priority' => 15,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('displayPageTitle', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayPageTitle', array(
			'label'      => esc_html__('Display Page Title?', 'viennatheme'),
			'section'    => 'header_options',
			'priority' => 16,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		//Slider
		$wp_customize->add_setting( 'dropMenuOpacity', array(
			'default' => 80,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'dropMenuOpacity', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Drop Menu Opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the main navigation drop down menu. (Requires page refresh)', 'viennatheme'),
			'priority' => 16,
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		
		$wp_customize->add_setting( 'headerHeight', array(
			'default' => 170,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'headerHeight', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Header Height', 'viennatheme' ),
			'description' => esc_html__('Adjust the height of the header area.', 'viennatheme'),
			'priority' => 17,
			'input_attrs' => array(
				'min' => 50,
				'max' => 300,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'headerPadding', array(
			'default' => 40,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'headerPadding', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Header Padding', 'viennatheme' ),
			'description' => esc_html__('Adjust the vertical padding of the header area.', 'viennatheme'),
			'priority' => 18,
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		
		
		$wp_customize->add_setting( 'pageTitleOpacity', array(
			'default' => 80,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'pageTitleOpacity', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Page Title/Message Opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the page title and message. (Requires window refresh)', 'viennatheme'),
			'priority' => 19,
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		
		$wp_customize->add_setting( 'breadcrumbOpacity', array(
			'default' => 80,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'breadcrumbOpacity', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Breadcrumb Opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the breadcrumb links. (Requires window refresh)', 'viennatheme'),
			'priority' => 20,
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		
		$wp_customize->add_setting( 'headerOpacity', array(
			'default' => 80,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'headerOpacity', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Header Opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the header element. Only applies if the "Main Menu Background Image" option is empty. (Requires window refresh)', 'viennatheme'),
			'priority' => 21,
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'subHeaderHeight', array(
			'default' => 340,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'subHeaderHeight', array(
			'type' => 'range',
			'section' => 'header_options',
			'label'   => esc_html__( 'Sub-page Header Height', 'viennatheme' ),
			'description' => esc_html__('Adjust the height of the sub-page header.', 'viennatheme'),
			'priority' => 22,
			'input_attrs' => array(
				'min' => 250,
				'max' => 500,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );


		
		
		//Textfields
		$wp_customize->add_setting(
			'searchFieldText', array(
				'default' => esc_html__( 'Type Keywords...', 'viennatheme' ),
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'searchFieldText',
			 array(
				'label' => esc_html__( 'Search field text', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 23,
			 )
		);
		
		$wp_customize->add_setting(
			'actionBtnText', array(
				'default' => esc_html__( 'Book an Event', 'viennatheme' ),
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'actionBtnText',
			 array(
				'label' => esc_html__( 'Action button text', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 24,
			 )
		);
		
		$wp_customize->add_setting(
			'actionBtnURL', array(
				'default' => '#',
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'actionBtnURL',
			 array(
				'label' => esc_html__( 'Action button URL', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 25,
			 )
		);
		
		$wp_customize->add_setting(
			'actionBtnIcon', array(
				'default' => 'fa fa-calendar',
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'actionBtnIcon',
			 array(
				'label' => esc_html__( 'Action button icon', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 26,
			 )
		);
		
		
		$wp_customize->add_setting('actionBtnTargetWindow',
			array(
				'default' => '_self',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control('actionBtnTargetWindow',
			array(
				'type' => 'select',
				'label' => esc_html__( 'Action button target window', 'viennatheme' ),
				'section' => 'header_options',
				'priority' => 27,
				'choices' => array(
					'_self' => 'self',
					'_blank' => 'blank',
				),
			)
		);

		
		$wp_customize->add_setting(
			'companyLogoURL', array(
				'default' => "",
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'companyLogoURL',
			 array(
				'label' => esc_html__( 'Company Logo URL', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 28,
			 )
		);	
		
		$wp_customize->add_setting(
			'companyLogoAltTag', array(
				'default' => "Vienna Restaurant",
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'companyLogoAltTag',
			 array(
				'label' => esc_html__( 'Company Logo ALT tag', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 29,
			 )
		);
		
		$wp_customize->add_setting(
			'menuSeperator', array(
				'default' => 'f069',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'menuSeperator', array(
			'label'   => esc_html__('Menu Seperator', 'viennatheme'),
			'section' => 'header_options',
			'settings' => 'menuSeperator',
			'priority' => 30,
			'type'    => 'text',
		));
		
		$wp_customize->add_setting(
			'dropMenuIndicator', array(
				'default' => "fa fa-angle-down",
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'dropMenuIndicator',
			 array(
				'label' => esc_html__( 'Drop Menu Indicator', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 31,
			 )
		);
		
		$wp_customize->add_setting(
			'dropMenuIcon', array(
				'default' => "f000",
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'dropMenuIcon',
			 array(
				'label' => esc_html__( 'Drop Menu Icon', 'viennatheme' ),
			 	'section' => 'header_options',
				'priority' => 32,
			 )
		);
		
		
		
		//Header Option Colors
		$headerOptionColors = array();
		
		$headerOptionColors[] = array(
			'slug'=>'mainNavColor', 
			'default' => '#000000',
			'label' => esc_html__('Main Menu Background Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the main navigation. (Requires window refresh)', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'dropMenuBackgroundColor', 
			'default' => '#000000',
			'label' => esc_html__('Drop Menu Background Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the main navigation drop down menu. (Requires window refresh)', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'subMenuBackgroundColor', 
			'default' => '#000000',
			'label' => esc_html__('Micro Menu Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the background color of the micro menu area. This option only applies if the "Micro Menu Background Image" option is empty.', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'subpageHeaderBackgroundColor', 
			'default' => '#cecece',
			'label' => esc_html__('Subpage Header Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the background color of the sub-page header area.', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'pageTitleBackgroundColor', 
			'default' => '#000000',
			'label' => esc_html__('Page Title/Message Background Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the header page title. (Requires window refresh)', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'breadcrumbBackgroundColor', 
			'default' => '#000000',
			'label' => esc_html__('Breadcrumb Background Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the breadcrumb links. (Requires window refresh)', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'searchAreaTextColor', 
			'default' => '#ffffff',
			'label' => esc_html__('Searchfield Text Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the text color of the searchfield. (Requires window refresh)', 'viennatheme'),
		);
		$headerOptionColors[] = array(
			'slug'=>'socialIconsBorderColor', 
			'default' => '#454545',
			'label' => esc_html__('Social Icons Border Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the border color of the social icons container. (Requires window refresh)', 'viennatheme'),
		);
		
		
		$headerOptionColorsCounter = 50;
		
		foreach( $headerOptionColors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
						'label' => $color['label'], 
						'section' => 'header_options',
						'transport' => $color['transport'],
						'description' => $color['description'],
						'settings' => $color['slug'],
						'priority' => $headerOptionColorsCounter,
					)
				)
			);
			
			$headerOptionColorsCounter += 10;
			
		}//end of foreach
		
		
			
		/**** Layout Options ****/
		$wp_customize->add_section( 'layout_options' , array(
			'title'    => esc_html__( 'Layout Options', 'viennatheme' ),
			'priority' => 60,
		));
		
		//Radio Options
		$wp_customize->add_setting('enableBoxMode',  array(
			'default' => 'off',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableBoxMode', array(
			'label'      => esc_html__('1170 Boxed Mode', 'viennatheme'),
			'section'    => 'layout_options',
			'settings'   => 'enableBoxMode',
			'priority' => 10,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));

		
		
		$wp_customize->add_setting(
			'homepageLayout', array(
				'default' => 'no-sidebar',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control( new pm_ln_Customize_Radio_Control( 
			$wp_customize, 'homepageLayout', 
				array(
					'label'   => esc_html__( 'Homepage Layout', 'viennatheme' ),
					'section' => 'layout_options',
					'settings'   => 'homepageLayout',
					'type'     => 'radio',
					'mode'     => 'image',
					'choices'  => array(
						'no-sidebar' => get_template_directory_uri() . '/css/img/layouts/no-sidebar.png',
						'left-sidebar' => get_template_directory_uri() . '/css/img/layouts/left-sidebar.png',
						'right-sidebar' => get_template_directory_uri() . '/css/img/layouts/right-sidebar.png',
					),
				) 
			) 
		);
		
		
		$wp_customize->add_setting(
			'universalLayout', array(
				'default' => 'no-sidebar',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control( new pm_ln_Customize_Radio_Control( 
			$wp_customize, 'universalLayout', 
				array(
					'label'   => esc_html__( 'Universal Layout (Tag - Archive - Category)', 'viennatheme' ),
					'section' => 'layout_options',
					'settings'   => 'universalLayout',
					'type'     => 'radio',
					'mode'     => 'image',
					'choices'  => array(
						'no-sidebar' => get_template_directory_uri() . '/css/img/layouts/no-sidebar.png',
						'left-sidebar' => get_template_directory_uri() . '/css/img/layouts/left-sidebar.png',
						'right-sidebar' => get_template_directory_uri() . '/css/img/layouts/right-sidebar.png',
					),
				) 
			) 
		);
		
		
		$wp_customize->add_setting(
			'footerLayout', array(
				'default' => 'footer-four-columns',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control( new pm_ln_Customize_Radio_Control( 
			$wp_customize, 'footerLayout', 
				array(
					'label'   => esc_html__( 'Footer Layout', 'viennatheme' ),
					'section' => 'layout_options',
					'settings'   => 'footerLayout',
					'type'     => 'radio',
					'mode'     => 'image',
					'choices'  => array(
						'footer-one-column' => get_template_directory_uri() . '/css/img/layouts/footer-one-column.png',
						'footer-two-columns' => get_template_directory_uri() . '/css/img/layouts/footer-two-columns.png',
						'footer-three-columns' => get_template_directory_uri() . '/css/img/layouts/footer-three-columns.png',
						'footer-four-columns' => get_template_directory_uri() . '/css/img/layouts/footer-four-columns.png',
						'footer-three-wide-left' => get_template_directory_uri() . '/css/img/layouts/footer-three-wide-left.png',
						'footer-three-wide-right' => get_template_directory_uri() . '/css/img/layouts/footer-three-wide-right.png',
					),
				) 
			) 
		);
	
		
		/**** Footer Options ****/
		$wp_customize->add_section( 'footer_options' , array(
			'title'    => esc_html__( 'Footer Options', 'viennatheme' ),
			'priority' => 70,
			'capability' => 'edit_theme_options', //Capability needed to tweak
            //'description' => esc_html__('Allows you to customize the footer area of the theme.', 'viennatheme'), //Descriptive tooltip
		));
			
		//Radio Options
		$wp_customize->add_setting('toggle_fatfooter', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('toggle_fatfooter', array(
			'label'      => esc_html__('Fat Footer', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggle_fatfooter',
			'priority' => 3,
			//'description' => esc_html__('Allows you to customize the footer area of the theme.', 'viennatheme'), //Descriptive tooltip
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('toggle_socialFooter', 
			array(
				'default' => 'on',
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            	'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'sanitize_callback' => 'esc_attr'
            	//'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			)
		);
		
		$wp_customize->add_control('toggle_socialFooter', array(
			'label'      => esc_html__('Social Footer', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggle_socialFooter',
			'priority' => 4,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		
		$wp_customize->add_setting('toggle_socialColumn', 
			array(
				'default' => 'on',
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            	'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'sanitize_callback' => 'esc_attr'
            	//'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			)
		);
		
		$wp_customize->add_control('toggle_socialColumn', array(
			'label'      => esc_html__('Display Social Icons?', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggle_socialColumn',
			'priority' => 5,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		$wp_customize->add_setting('toggle_newsletterColumn', 
			array(
				'default' => 'on',
				'sanitize_callback' => 'esc_attr',
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            	'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            	//'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			)
		);
		
		$wp_customize->add_control('toggle_newsletterColumn', array(
			'label'      => esc_html__('Display Newsletter Field?', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggle_newsletterColumn',
			'priority' => 6,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));	
		
		$wp_customize->add_setting('toggle_footerNav', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('toggle_footerNav', array(
			'label'      => esc_html__('Main Footer', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggle_footerNav',
			'priority' => 7,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('toggleParallaxFooter', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr',
		));
		
		$wp_customize->add_control('toggleParallaxFooter', array(
			'label'      => esc_attr__('Run Parallax on Fat Footer?', 'viennatheme'),
			'section'    => 'footer_options',
			'settings'   => 'toggleParallaxFooter',
			'type'       => 'radio',
			'priority' => 8,
			'choices'    => array(
				'on'   => esc_attr__('ON', 'viennatheme' ),
				'off'  => esc_attr__('OFF', 'viennatheme' ),
			),
		));
				
		
		//Textfields
		$wp_customize->add_setting(
			'socialMediaCTA', array(
				'default' => esc_html__('Join the conversation', 'viennatheme'),
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'socialMediaCTA',
			 array(
				'label'   => esc_html__( 'Social Media Call To Action', 'viennatheme' ),
			 	'section' => 'footer_options',
				'settings'   => 'socialMediaCTA',
			 )
		);
		

		
		$wp_customize->add_setting(
			'newsletterCTA', array(
				'default' => esc_html__('Subscribe to our newsletter', 'viennatheme'),
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control(
			'newsletterCTA',
			 array(
				'label'   => esc_html__( 'Newsletter Call To Action', 'viennatheme' ),
			 	'section' => 'footer_options',
				'settings'   => 'newsletterCTA',
			 )
		);
		

		
		$wp_customize->add_setting(
			'returnToTopIcon', array(
				'default' => 'f077',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'returnToTopIcon', array(
			'label'   => esc_html__('Return To Top Icon', 'viennatheme'),
			'section' => 'footer_options',
			'settings' => 'returnToTopIcon',
			'priority' => 80,
			'type'    => 'text',
		) );
		
		
		
		$wp_customize->add_setting(
			'mailchimpAddress', array(
				'default' => 'http://pulsarmedia.us4.list-manage2.com/subscribe?u=2aa9334fc1bc18c8d05500b41&id=dbcb577c4d',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control( new pm_ln_Customize_Textarea_Control( $wp_customize, 'mailchimpAddress', array(
			'label'   => esc_html__( 'Mailchimp Subscribe URL', 'viennatheme' ),
			'section' => 'footer_options',
			'settings'   => 'mailchimpAddress',
		) ) );
		
		//Images	
		$wp_customize->add_setting( 'fatFooterBackgroundImage', array(
			'sanitize_callback' => 'esc_url_raw',
		));
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'fatFooterBackgroundImage', 
			array(
				'label'    => esc_html__( 'Fat Footer Background Image', 'viennatheme' ),
				'section'  => 'footer_options',
				'priority'  => 1,
				'settings' => 'fatFooterBackgroundImage',
				) 
			) 
		);
		
		$wp_customize->add_setting( 'footerBackgroundImage', array(
			'sanitize_callback' => 'esc_url_raw',
		));
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'footerBackgroundImage', 
			array(
				'label'    => esc_html__( 'Footer Background Image', 'viennatheme' ),
				'section'  => 'footer_options',
				'priority'  => 2,
				'settings' => 'footerBackgroundImage',
				) 
			) 
		);
		
		$FooterColors = array();
	
		$FooterColors[] = array(
			'slug'=>'newsletterFieldColor', 
			'default' => '#2d2d2d',
			'label' => esc_html__('Newsletter Field Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage  (Requires window refresh)
			'description' => esc_html__('Adjust the background color of the newsletter field.', 'viennatheme'),
		);
		$FooterColors[] = array(
			'slug'=>'fatFooterBackgroundColor', 
			'default' => '#2D2D2D',
			'label' => esc_html__('Fat Footer Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage  (Requires window refresh)
			'description' => esc_html__('Adjust the background color of the fat footer area.', 'viennatheme'),
		);
		$FooterColors[] = array(
			'slug'=>'footerBackgroundColor', 
			'default' => '#2D2D2D',
			'label' => esc_html__('Footer Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage  (Requires window refresh)
			'description' => esc_html__('Adjust the background color of the footer area.', 'viennatheme'),
		);
		$FooterColors[] = array(
			'slug'=>'subFooterBackgroundColor', 
			'default' => '#FFFFFF',
			'label' => esc_html__('Sub Footer Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage  (Requires window refresh)
			'description' => esc_html__('Adjust the background color of the sub footer area.', 'viennatheme'),
		);
		
		$footerColorsCounter = 50;
		
		foreach( $FooterColors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
					'label' => $color['label'], 
					'transport' => $color['transport'],
					'description' => $color['description'],
					'section' => 'footer_options',
					'priority'  => $footerColorsCounter,
					'settings' => $color['slug'])
				)
			);
			
			$footerColorsCounter += 10;
			
		}//end of foreach
		
		/**** Global Options ****/
		$wp_customize->add_section( 'global_options' , array(
			'title'    => esc_html__( 'Global Options', 'viennatheme' ),
			'priority' => 80,
		));
		
		$wp_customize->add_setting( 'pageBackgroundImage', array(
			'sanitize_callback' => 'esc_url_raw',
		));
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'pageBackgroundImage', 
			array(
				'label'    => esc_html__( 'Background image', 'viennatheme' ),
				'section'  => 'global_options',
				'settings' => 'pageBackgroundImage',
				'priority' => 1,
				) 
			) 
		);
				

		
		//sliders
		$wp_customize->add_setting( 'mobileMenuOpacity', array(
			'default' => 90,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'mobileMenuOpacity', array(
			'type' => 'range',
			'section' => 'global_options',
			'label'   => esc_html__( 'Mobile Menu Opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the mobile menu. (Requires window refresh)', 'viennatheme'),
			'priority' => 7,
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'globalContainerPadding', array(
			'default' => 0,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'globalContainerPadding', array(
			'type' => 'range',
			'section' => 'global_options',
			'label'   => esc_html__( 'Global Container Padding', 'viennatheme' ),
			'description' => esc_html__('Adjust the padding of the page bootstrap container globally. Leave this value all the way to the left to use the native page bootstrap container padding instead. (Requires window refresh)', 'viennatheme'),
			'priority' => 8,
			'input_attrs' => array(
				'min' => 1,
				'max' => 120,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );

		
		
		$GlobalColors = array();
		
		$GlobalColors[] = array(
			'slug'=>'primaryColor', 
			'default' => '#ef5438',
			'label' => esc_html__('Primary Color', 'viennatheme'),
			'transport' => 'postMessage',
			'description' => esc_html__('Adjust the primary color of the Vienna theme. This color applies to multiple elements for consistent design. Please note not all elements update in real time - please save and view your final changes on the front-end.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'secondaryColor', 
			'default' => '#44619d',
			'label' => esc_html__('Secondary Color', 'viennatheme'),
			'transport' => 'postMessage',
			'description' => esc_html__('Adjust the secondary color of the Vienna theme. This color applies to multiple elements for consistent design. Please note not all elements update in real time - please save and view your final changes on the front-end.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'pageBackgroundColor', 
			'default' => '#ffffff',
			'label' => esc_html__('Background Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the theme. (Requires window refresh)', 'viennatheme'),
		);
		
		$GlobalColors[] = array(
			'slug'=>'boxedModeContainerColor', 
			'default' => '#FFFFFF',
			'label' => esc_html__('Boxed Mode Container Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the background color of the boxed mode container. Only applies if the Boxed Mode option is enabled.', 'viennatheme'),
		);
		
		$GlobalColors[] = array(
			'slug'=>'dividerColor', 
			'default' => '#efefef',
			'label' => esc_html__('Divider/Border Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the global divider/border color. Applies to multiple elements throughout the theme for a consistent design.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'tooltipColor', 
			'default' => '#333333',
			'label' => esc_html__('ToolTip Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the tooltip popup. (Requires window refresh)', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'blockQuoteColor', 
			'default' => '#ef5438',
			'label' => esc_html__('Blockquote Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the color of the blockquote element. (Requires window refresh)', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'commentBoxColor', 
			'default' => '#FFFFFF',
			'label' => esc_html__('Comment Box Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the color of the comments box.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'isotopeMenuBackground', 
			'default' => '#efefef',
			'label' => esc_html__('Isotope Menu Background Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the background color of the isotope filter menu.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'postMetaIconColor', 
			'default' => '#ab8c6a',
			'label' => esc_html__('Post Meta Icon Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the color of the post meta icons.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'mobileMenuColor',
			'default' => '#000000',
			'label' => esc_html__('Mobile Menu Color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the color of the mobile menu. (Requires window refresh)', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'mobileMenuDropColor', 
			'default' => '#000000',
			'label' => esc_html__('Mobile Menu Drop Down Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the color of the mobile navigation drop down menu.', 'viennatheme'),
		);
		$GlobalColors[] = array(
			'slug'=>'mobileMenuToggleColor', 
			'default' => '#dbc164',
			'label' => esc_html__('Mobile Menu Toggle Button Color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the color of the mobile navigation toggle button.', 'viennatheme'),
		);
		
		$globalColorsCounter = 50;
		
		foreach( $GlobalColors as $color ) {
			
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
					'label' => $color['label'], 
					'transport' => $color['transport'],
					'description' => $color['description'],
					'section' => 'global_options',
					'settings' => $color['slug'],
					'priority' => $globalColorsCounter,
					)
				)
			);
			
			$globalColorsCounter += 10;
			
		}//end of foreach
		
		//Radio Options
		$wp_customize->add_setting('enableTooltip', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableTooltip', array(
			'label'      => esc_html__('ToolTip', 'viennatheme'),
			'section'    => 'global_options',
			'settings'   => 'enableTooltip',
			'priority' => 3,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('colorSampler',  array(
			'default' => 'off',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('colorSampler', array(
			'label'      => esc_html__('Theme Sampler', 'viennatheme'),
			'section'    => 'global_options',
			'settings'   => 'colorSampler',
			'priority' => 4,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('retinaSupport',  array(
			'default' => 'off',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('retinaSupport', array(
			'label'      => esc_html__('Retina Support', 'viennatheme'),
			'section'    => 'global_options',
			'settings'   => 'retinaSupport',
			'priority' => 6,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('repeatBackground',  array(
			'default' => 'no-repeat',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('repeatBackground', array(
			'label'      => esc_html__('Repeat Background', 'viennatheme'),
			'section'    => 'global_options',
			'settings'   => 'repeatBackground',
			'priority' => 2,
			'type'       => 'radio',
			'choices'    => array(
				'repeat'  => 'Repeat All',
				'repeat-x'  => 'Repeat X',
				'repeat-y'  => 'Repeat Y',
				'no-repeat'   => 'No Repeat',
			),
		));
		
				
		/**** Business Info ****/
		
		$wp_customize->add_section( 'business_info' , array(
			'title'    => esc_html__( 'Business Info', 'viennatheme' ),
			'priority' => 100,
		));
		
		//Textfields
		$wp_customize->add_setting(
			'businessPhone', array(
				'default' => '1 -(800)-555-5555',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'businessPhone', array(
			'label'   => esc_html__( 'Business Number', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'businessPhone',
			'type'    => 'text',
		) );
		
		
		$wp_customize->add_setting(
			'businessAddress', array(
				'default' => '4 Main Street, New York, NY 02489',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'businessAddress', array(
			'label'   => esc_html__( 'Business Address', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'businessAddress',
			'type'    => 'text',
		) );
		
		
		$wp_customize->add_setting(
			'businessGoogleMapLink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'businessGoogleMapLink', array(
			'label'   => esc_html__( 'Google Map Link (Short URL)', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'businessGoogleMapLink',
			'type'    => 'text',
		) );

		
		$wp_customize->add_setting(
			'businessEmail', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'businessEmail', array(
			'label'   => esc_html__( 'Email Address', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'businessEmail',
			'type'    => 'text',
		) );
		
		//Facebook Icon
		$wp_customize->add_setting(
			'facebooklink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'facebooklink', array(
			'label'   => esc_html__( 'Facebook URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'facebooklink',
			'type'    => 'text',
		) );
		
		//Twitter Icon
		$wp_customize->add_setting(
			'twitterlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'twitterlink', array(
			'label'   => esc_html__( 'Twitter URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'twitterlink',
			'type'    => 'text',
		) );
		
		//G Plus Icon
		$wp_customize->add_setting(
			'googlelink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'googlelink', array(
			'label'   => esc_html__( 'Google Plus URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'googlelink',
			'type'    => 'text',
		) );
		
		//Linkedin Icon
		$wp_customize->add_setting(
			'linkedinLink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'linkedinLink', array(
			'label'   => esc_html__( 'Linkedin URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'linkedinLink',
			'type'    => 'text',
		) );
		
		//Vimeo Icon
		$wp_customize->add_setting(
			'vimeolink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'vimeolink', array(
			'label'   => esc_html__( 'Vimeo URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'vimeolink',
			'type'    => 'text',
		) );
		
		//Youtube Icon
		$wp_customize->add_setting(
			'youtubelink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'youtubelink', array(
			'label'   => esc_html__( 'YouTube URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'youtubelink',
			'type'    => 'text',
		) );
		
		//Dribbble Icon
		$wp_customize->add_setting(
			'dribbblelink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'dribbblelink', array(
			'label'   => esc_html__( 'Dribbble URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'dribbblelink',
			'type'    => 'text',
		) );
		
		//Pinterest Icon
		$wp_customize->add_setting(
			'pinterestlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'pinterestlink', array(
			'label'   => esc_html__( 'Pinterest URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'pinterestlink',
			'type'    => 'text',
		) );
		
		//Instagram Icon
		$wp_customize->add_setting(
			'instagramlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'instagramlink', array(
			'label'   => esc_html__( 'Instagram URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'instagramlink',
			'type'    => 'text',
		) );
		
		//Behance Icon
		$wp_customize->add_setting(
			'behancelink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'behancelink', array(
			'label'   => esc_html__( 'Behance URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'behancelink',
			'type'    => 'text',
		) );
		
		//Skype Icon
		$wp_customize->add_setting(
			'skypelink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'skypelink', array(
			'label'   => esc_html__( 'Skype Name', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'skypelink',
			'type'    => 'text',
		) );
		
		//Flickr Icon
		$wp_customize->add_setting(
			'flickrlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'flickrlink', array(
			'label'   => esc_html__( 'Flickr URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'flickrlink',
			'type'    => 'text',
		) );
		
		//Tumblr Icon
		$wp_customize->add_setting(
			'tumblrlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'tumblrlink', array(
			'label'   => esc_html__( 'Tumblr URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'tumblrlink',
			'type'    => 'text',
		) );
		
		//Reddit Icon
		$wp_customize->add_setting(
			'redditlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'redditlink', array(
			'label'   => esc_html__( 'Reddit URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'redditlink',
			'type'    => 'text',
		) );
		
		//Digg Icon
		$wp_customize->add_setting(
			'digglink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'digglink', array(
			'label'   => esc_html__( 'Digg URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'digglink',
			'type'    => 'text',
		) );
		
		//Delicious Icon
		$wp_customize->add_setting(
			'deliciouslink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'deliciouslink', array(
			'label'   => esc_html__( 'Delicious URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'deliciouslink',
			'type'    => 'text',
		) );
		
		//Yelp Icon
		$wp_customize->add_setting(
			'yelplink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'yelplink', array(
			'label'   => esc_html__( 'Yelp URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'yelplink',
			'type'    => 'text',
		) );
		
		//Stumbleupon Icon
		$wp_customize->add_setting(
			'stumbleuponlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'stumbleuponlink', array(
			'label'   => esc_html__( 'Stumbleupon URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'stumbleuponlink',
			'type'    => 'text',
		) );
		
		//Tripadvisor Icon
		$wp_customize->add_setting(
			'tripadvisorlink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
		
		$wp_customize->add_control( 'tripadvisorlink', array(
			'label'   => esc_html__( 'TripAdvisor URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'tripadvisorlink',
			'type'    => 'text',
		) );
		
		//RSS Icon
		$wp_customize->add_setting(
			'rssLink', array(
				'default' => '',
				'sanitize_callback' => 'esc_attr'
			)
		);
				
		$wp_customize->add_control( 'rssLink', array(
			'label'   => esc_html__( 'RSS URL', 'viennatheme' ),
			'section' => 'business_info',
			'settings' => 'rssLink',
			'type'    => 'text',
		) );
		
		/**** Woocommerce Options ****/
		 
		$wp_customize->add_section( 'woo_options' , array(
			'title'    => esc_html__( 'Woocommerce Options', 'viennatheme' ),
			'priority' => 110,
		));
				
		
		$wp_customize->add_setting(
			'wooArchiveTitle', array(
				'default' => esc_html__( 'Menu items for:', 'viennatheme' ),
				'sanitize_callback' => 'esc_attr'
			)
		);

		$wp_customize->add_control(
			'wooArchiveTitle',
			 array(
				'label' => esc_html__( 'Archive title', 'viennatheme' ),
				'description' => esc_html__( 'Insert a custom title for the category and tag pages', 'viennatheme' ),
			 	'section' => 'woo_options',
				'priority' => 20,
			 )
		);
						
		//Upload Options
		$wp_customize->add_setting( 'wooCategoryHeaderImage', array(
			'sanitize_callback' => 'esc_url_raw',
		));
		
		$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'wooCategoryHeaderImage', 
			array(
				'label'    => esc_html__( 'Category/Tag Page Header Image', 'viennatheme' ),
				'section'  => 'woo_options',
				'settings' => 'wooCategoryHeaderImage',
				) 
			) 
		);
		
		//List options
		$wp_customize->add_setting('woocommShopLayout', array(
			'default' => 'no-sidebar',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('woocommShopLayout', array(
			'label'      => esc_html__('Woocommerce Layout', 'viennatheme'),
			'section'    => 'woo_options',
			'description' => esc_html__('Applies to the shop page, product category template and single product page.', 'viennatheme'),
			'settings'   => 'woocommShopLayout',
			'priority' => 21,
			'type'       => 'radio',
			'choices'    => array(
				'no-sidebar'   => 'No Sidebar',
				'left-sidebar'  => 'Left Sidebar',
				'right-sidebar'  => 'Right Sidebar',
			),
		));
		
		
		$woocommColors = array();
		
		$woocommColors[] = array(
			'slug'=>'sale_box_color', 
			'default' => '#8ab079',
			'label' => esc_html__('Sale / Cart box color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the color of the sale and cart icon container.', 'viennatheme'),
		);
		
		
		$woocommColors[] = array(
			'slug'=>'form_background', 
			'default' => '#f4f4f4',
			'label' => esc_html__('Checkout Form background color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the background color of the checkout form.', 'viennatheme'),
		);
		
		$woocommColorsCounter = 50;
		
		foreach( $woocommColors as $color ) {
			
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
					'label' => $color['label'], 
					'section' => 'woo_options',
					'transport' => $color['transport'],
					'description' => $color['description'],
					'priority' => $woocommColorsCounter,
					'settings' => $color['slug'],
					)
				)
			);
			
			$woocommColorsCounter += 10;
			
		}//end of foreach
		
		
		/**** Micro Slider Options ****/
		$wp_customize->add_section( 'presentation_options' , array(
			'title'    => esc_html__( 'Micro Slider Options', 'viennatheme' ),
		));
		
		
		
		$wp_customize->add_setting('enablePulseSlider', array(
			'default' => 'yes',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enablePulseSlider', array(
			'label'      => esc_html__('Enable Micro Slider?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'enablePulseSlider',
			'type'       => 'radio',
			'priority' => 1,
			'choices'    => array(
				'yes'   => 'ON',
				'no'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('enableFixedHeight', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableFixedHeight', array(
			'label'      => esc_html__('Fixed Height?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'enableFixedHeight',
			'type'       => 'radio',
			'priority' => 2,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('enableSlideShow', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableSlideShow', array(
			'label'      => esc_html__('Enable SlideShow?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'enableSlideShow',
			'type'       => 'radio',
			'priority' => 3,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('slideLoop', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('slideLoop', array(
			'label'      => esc_html__('Loop Slides?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'slideLoop',
			'type'       => 'radio',
			'priority' => 4,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));

		$wp_customize->add_setting('enableControlNav', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('enableControlNav', array(
			'label'      => esc_html__('Enable Bullets?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'enableControlNav',
			'type'       => 'radio',
			'priority' => 5,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('pauseOnHover', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('pauseOnHover', array(
			'label'      => esc_html__('Pause on hover?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'pauseOnHover',
			'type'       => 'radio',
			'priority' => 6,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('showArrows', array(
			'default' => 'true',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('showArrows', array(
			'label'      => esc_html__('Display arrows?', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'showArrows',
			'type'       => 'radio',
			'priority' => 7,
			'choices'    => array(
				'true'   => 'ON',
				'false'  => 'OFF',
			),
		));

		$wp_customize->add_setting('animtionType', array(
			'default' => 'fade',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('animtionType', array(
			'label'      => esc_html__('Animation Type', 'viennatheme'),
			'section'    => 'presentation_options',
			'settings'   => 'animtionType',
			'type'       => 'radio',
			'priority' => 8,
			'choices'    => array(
				'fade'   => 'Fade',
				'slide'  => 'Slide',
			),
		));

		
		
		$wp_customize->add_setting( 'slideShowSpeed', array(
			'default' => 8000,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'slideShowSpeed', array(
			'type' => 'range',
			'section' => 'presentation_options',
			'label'   => esc_html__( 'Slide Show Speed', 'viennatheme' ),
			'description' => esc_html__('Adjust the slideshow speed of the Micro Slider. This option only applies if the Slideshow option is enabled. (Requires window refresh)', 'viennatheme'),
			'priority' => 9,
			'input_attrs' => array(
				'min' => 1000,
				'max' => 10000,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		
		$wp_customize->add_setting( 'slideSpeed', array(
			'default' => 500,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'slideSpeed', array(
			'type' => 'range',
			'section' => 'presentation_options',
			'label'   => esc_html__( 'Slide Speed', 'viennatheme' ),
			'description' => esc_html__('Adjust the slide speed of the Micro Slider. (Requires window refresh)', 'viennatheme'),
			'priority' => 10,
			'input_attrs' => array(
				'min' => 500,
				'max' => 1000,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'sliderHeight', array(
			'default' => 800,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'sliderHeight', array(
			'type' => 'range',
			'section' => 'presentation_options',
			'label'   => esc_html__( 'Slider Height', 'viennatheme' ),
			'description' => esc_html__('Adjust the height of the Micro Slider. This height only applies if the "Fixed Height" option is enabled. (Requires window refresh)', 'viennatheme'),
			'priority' => 11,
			'input_attrs' => array(
				'min' => 300,
				'max' => 1000,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'sliderHeightMobile', array(
			'default' => 600,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'sliderHeightMobile', array(
			'type' => 'range',
			'section' => 'presentation_options',
			'label'   => esc_html__( 'Slider Height (Mobile)', 'viennatheme' ),
			'description' => esc_html__('Adjust the height of the Micro Slider for mobile resolution. This height only applies if the "Fixed Height" option is enabled. (Requires window refresh)', 'viennatheme'),
			'priority' => 12,
			'input_attrs' => array(
				'min' => 300,
				'max' => 1000,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
		$wp_customize->add_setting( 'textBackgroundOpacity', array(
			'default' => 80,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'textBackgroundOpacity', array(
			'type' => 'range',
			'section' => 'presentation_options',
			'label'   => esc_html__( 'Text background opacity', 'viennatheme' ),
			'description' => esc_html__('Adjust the opacity of the Micro Slider text. (Requires window refresh)', 'viennatheme'),
			'priority' => 13,
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		

		
				
		$PresentationColors = array();
		
		$PresentationColors[] = array(
			'slug'=>'textBackgroundColor', 
			'default' => '#000000',
			'label' => esc_html__('Text background color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the Micro Slider text. (Requires window refresh)', 'viennatheme'),
		);
		
		$PresentationColors[] = array(
			'slug'=>'buttonColor', 
			'default' => '#ef5438',
			'label' => esc_html__('Button color', 'viennatheme'),
			'transport' => 'postMessage', //postMessage
			'description' => esc_html__('Adjust the button color of the Micro Slider.', 'viennatheme'),
		);
		
		$presentationColorsCounter = 50;
		
		foreach( $PresentationColors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
					'label' => $color['label'], 
					'transport' => $color['transport'],
					'description' => $color['description'],
					'priority' => $presentationColorsCounter,
					'section' => 'presentation_options',
					'settings' => $color['slug'])
				)
			);
			
			$presentationColorsCounter += 10;
			
		}//end of foreach
		
		
		/**** Shortcode Options ****/
		$wp_customize->add_section( 'shortcode_options' , array(
			'title'    => esc_html__( 'Shortcode Options', 'viennatheme' ),
		));
				
				
		//Shortcode Option Colors
		$shortcodeOptionColors = array();

		$shortcodeOptionColors[] = array(
			'slug'=>'quote_box_color', 
			'default' => '#ffece8',
			'label' => esc_html__('Quote box color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the quote box shortcode. (Requires window refresh)', 'viennatheme'),
		);
		
		$shortcodeOptionColors[] = array(
			'slug'=>'fancy_title_border', 
			'default' => '#dddddd',
			'label' => esc_html__('Fancy Title border color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the border color of the fancy title shortcode. (Requires window refresh)', 'viennatheme'),
		);
		
		$shortcodeOptionColors[] = array(
			'slug'=>'testimonial_widget_color', 
			'default' => '#f2f2f2',
			'label' => esc_html__('Testimonial Widget Background color', 'viennatheme'),
			'transport' => 'refresh', //postMessage
			'description' => esc_html__('Adjust the background color of the testimonial widget. (Requires window refresh)', 'viennatheme'),
		);

				
		foreach( $shortcodeOptionColors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'transport' => $color['transport'],
					'description' => $color['description'],
					'type' => 'option', 
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr'
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$color['slug'], 
					array(
					'label' => $color['label'], 
					'transport' => $color['transport'],
					'description' => $color['description'],
					'section' => 'shortcode_options',
					'settings' => $color['slug'])
				)
			);
		}//end of foreach
		
		
		
		
		/**** Custom Post Type Options ****/
		$wp_customize->add_section( 'post_type_options' , array(
			'title'    => esc_html__( 'Custom Post Type Options', 'viennatheme' ),
		));
				
		//Radio Options
		$wp_customize->add_setting('eventsPostOrder', array(
			'default' => 'DESC',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('eventsPostOrder', array(
			'label'      => esc_html__('Events Post Order', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'eventsPostOrder',
			'priority' => 1,
			'type'       => 'radio',
			'choices'    => array(
				'DESC'   => 'Descending',
				'ASC'  => 'Ascending',
			),
		));
		
		$wp_customize->add_setting('eventsPostOrderByEventDate', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('eventsPostOrderByEventDate', array(
			'label'      => esc_html__('Sort events by event date?', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'eventsPostOrderByEventDate',
			'type'       => 'radio',
			'priority' => 2,
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('showExpiredEvents', array(
			'default' => 'off',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('showExpiredEvents', array(
			'label'      => esc_html__('Display expired events?', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'showExpiredEvents',
			'type'       => 'radio',
			'priority' => 3,
			'choices'    => array(
				'on'   => 'YES',
				'off'  => 'NO',
			),
		));
		
	
		
		//Radio Options
		$wp_customize->add_setting('galleryPostOrder', array(
			'default' => 'DESC',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('galleryPostOrder', array(
			'label'      => esc_html__('Gallery Post Order (by published date)', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'galleryPostOrder',
			'priority' => 4,
			'type'       => 'radio',
			'choices'    => array(
				'DESC'   => 'Descending',
				'ASC'  => 'Ascending',
			),
		));
		
		$wp_customize->add_setting('displayGalleryPostMoreInfo', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayGalleryPostMoreInfo', array(
			'label'      => esc_html__('Display More Info button on Gallery posts?', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'displayGalleryPostMoreInfo',
			'priority' => 5,
			'type'       => 'radio',
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		$wp_customize->add_setting('displayReadMoreMenus', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayReadMoreMenus', array(
			'label'      => esc_html__('Display Read More button on Menu items?', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'displayReadMoreMenus',
			'type'       => 'radio',
			'priority' => 6,
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		$wp_customize->add_setting('displayMenuPostImage', array(
			'default' => 'on',
			'sanitize_callback' => 'esc_attr'
		));
		
		$wp_customize->add_control('displayMenuPostImage', array(
			'label'      => esc_html__('Display Menu Post image?', 'viennatheme'),
			'section'    => 'post_type_options',
			'settings'   => 'displayMenuPostImage',
			'type'       => 'radio',
			'priority' => 7,
			'choices'    => array(
				'on'   => 'ON',
				'off'  => 'OFF',
			),
		));
		
		
		$wp_customize->add_setting( 'menuPostImageHeight', array(
			'default' => 130,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'menuPostImageHeight', array(
			'type' => 'range',
			'section' => 'post_type_options',
			'label'   => esc_html__( 'Menu Post Image Height', 'viennatheme' ),
			'description'    => esc_html__( 'Adjust the height of the menu post thumbnail image. Leave the slider all the way to the left to enable auto height. (Requires window refresh)', 'viennatheme' ),
			'priority' => 8,
			'input_attrs' => array(
				'min' => 1,
				'max' => 400,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
		
	
		
		/**** Widget options ****/
		$wp_customize->add_section( 'widget_options' , array(
			'title'    => esc_html__( 'Widget Options', 'viennatheme' ),
		));
		
		//Slider
		$wp_customize->add_setting( 'testimonialsSlideShowSpeed', array(
			'default' => 5000,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		) );
		
		$wp_customize->add_control( 'testimonialsSlideShowSpeed', array(
			'type' => 'range',
			'section' => 'widget_options',
			'label'   => esc_html__( 'Testimonials SlideShow Speed', 'viennatheme' ),
			'description'    => esc_html__( 'Adjust the slideshow speed of the testimonials carousel shortcode. (Requires window refresh)', 'viennatheme' ),
			'priority' => 8,
			'input_attrs' => array(
				'min' => 1,
				'max' => 15000,
				'step' => 1,
				'class' => 'example-class',
				'style' => 'color: #0a0',
			),
		) );
	
		
   }//end of function
   
}//end of class


//Extend Theme Customizer with custom classes
if (class_exists('WP_Customize_Control')) {
	
	//Custom radio with image support
	class pm_ln_Customize_Radio_Control extends WP_Customize_Control {

		public $type = 'radio';
		public $description = '';
		public $mode = 'radio';
		public $subtitle = '';
	
		public function enqueue() {
	
			if ( 'buttonset' == $this->mode || 'image' == $this->mode ) {
				wp_enqueue_script( 'jquery-ui-button' );
				wp_register_style('customizer-styles', get_template_directory_uri() . '/css/customizer/pulsar-customizer.css');  
				wp_enqueue_style('customizer-styles');
			}
	
		}
	
		public function render_content() {
	
			if ( empty( $this->choices ) ) {
				return;
			}
	
			$name = '_customize-radio-' . $this->id;
	
			?>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<?php if ( isset( $this->description ) && '' != $this->description ) { ?>
					<a href="#" class="button tooltip" title="<?php echo strip_tags( esc_html( $this->description ) ); ?>">?</a>
				<?php } ?>
			</span>
	
			<div id="input_<?php echo $this->id; ?>" class="<?php echo $this->mode; ?>">
				<?php if ( '' != $this->subtitle ) : ?>
					<div class="customizer-subtitle"><?php echo $this->subtitle; ?></div>
				<?php endif; ?>
				<?php
	
				// JqueryUI Button Sets
				if ( 'buttonset' == $this->mode ) {
	
					foreach ( $this->choices as $value => $label ) : ?>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<label for="<?php echo $this->id . $value; ?>">
								<?php echo esc_html( $label ); ?>
							</label>
						</input>
						<?php
					endforeach;
	
				// Image radios.
				} elseif ( 'image' == $this->mode ) {
	
					foreach ( $this->choices as $value => $label ) : ?>
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<label for="<?php echo $this->id . $value; ?>">
								<img src="<?php echo esc_html( $label ); ?>">
							</label>
						</input>
						<?php
					endforeach;
	
				// Normal radios
				} else {
	
					foreach ( $this->choices as $value => $label ) :
						?>
						<label class="customizer-radio">
							<input class="kirki-radio" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
							<?php echo esc_html( $label ); ?><br/>
						</label>
						<?php
					endforeach;
	
				}
				?>
			</div>
			<?php if ( 'buttonset' == $this->mode || 'image' == $this->mode ) { ?>
				<script>
				jQuery(document).ready(function($) {
					$( '[id="input_<?php echo $this->id; ?>"]' ).buttonset();
				});
				</script>
			<?php }
	
		}
	}


	
	//jQuery UI Slider class
	class pm_ln_Customize_Sliderui_Control extends WP_Customize_Control {

		public $type = 'slider';
		public $description = '';
		public $subtitle = '';
	
		public function enqueue() {
	
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-slider' );
	
		}
	
		public function render_content() { ?>
			<label>
	
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
                
                <?php if ( isset( $this->description ) && '' != $this->description ) { ?>
                    <p><?php echo strip_tags( esc_html( $this->description ) ); ?></p>
                <?php } ?>
	
				<?php if ( '' != $this->subtitle ) : ?>
					<div class="customizer-subtitle"><?php echo $this->subtitle; ?></div>
				<?php endif; ?>
	
				<input type="text" class="kirki-slider" id="input_<?php echo $this->id; ?>" disabled value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>
	
			</label>
	
			<div id="slider_<?php echo $this->id; ?>" class="ss-slider"></div>
			<script>
			jQuery(document).ready(function($) {
				$( '[id="slider_<?php echo $this->id; ?>"]' ).slider({
						value : <?php echo $this->value(); ?>,
						min   : <?php echo $this->choices['min']; ?>,
						max   : <?php echo $this->choices['max']; ?>,
						step  : <?php echo $this->choices['step']; ?>,
						slide : function( event, ui ) { $( '[id="input_<?php echo $this->id; ?>"]' ).val(ui.value).keyup(); }
				});
				$( '[id="input_<?php echo $this->id; ?>"]' ).val( $( '[id="slider_<?php echo $this->id; ?>"]' ).slider( "value" ) );
			});
			</script>
			<?php
	
		}
	}
	
	//Textarea Class
	class pm_ln_Customize_Textarea_Control extends WP_Customize_Control {
		
		public $type = 'textarea';
	 
		public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
			<?php
		}
	}

}


add_action( 'customize_register' , array( 'PM_LN_Customizer' , 'register' ) );

?>