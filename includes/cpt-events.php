<?php
function cpt_events(){
	
	/*if(function_exists('ot_get_option')){
		$url_rewrite = ot_get_option('staff_post_type_url');
		if( $url_rewrite == '' ) { 
			$url_rewrite = 'staff-member'; 
		} 
	} else {
		$url_rewrite = 'staff-member';
	}*/

	register_post_type('post_event',
		array(
			'labels' => array(
				'name' => esc_html__( 'Events', 'viennatheme' ),
				'singular_name' => esc_html__( 'Events', 'viennatheme' ),
				'add_new' => esc_html__( 'Add New Event', 'viennatheme' ),
				'add_new_item' => esc_html__( 'Add New Event', 'viennatheme' ),
				'edit' => esc_html__( 'Edit', 'viennatheme' ),
				'edit_item' => esc_html__( 'Edit Event', 'viennatheme' ),
				'new_item' => esc_html__( 'New Event', 'viennatheme' ),
				'view' => esc_html__( 'View', 'viennatheme' ),
				'view_item' => esc_html__( 'View Event', 'viennatheme' ),
				'search_items' => esc_html__( 'Search Events', 'viennatheme' ),
				'not_found' => esc_html__( 'No Events found', 'viennatheme' ),
				'not_found_in_trash' => esc_html__( 'No Events found in Trash', 'viennatheme' ),
				'parent' => esc_html__( 'Parent Staff', 'viennatheme' )
			),
			'description' => esc_html__( 'Easily lets you add new events', 'viennatheme' ),
			'public' => true,
			'show_ui' => true, 
			'_builtin' => false,
			'map_meta_cap' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'pages' => true,
			//'has_archive' => true, //SAVES IN AN ARCHIVE?
			'rewrite' => array('slug' => 'events'),
			'supports' => array('title', 'editor', 'author', 'excerpt'),
			//'taxonomies' => array('category', 'post_tag')
		)
	); 
	flush_rewrite_rules();
}

function event_categories() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Event Categories', 'viennatheme' ),
		'singular_name' => esc_html__( 'Event Categories', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Event Categories', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Event Categories', 'viennatheme' ),
		'all_items' => esc_html__( 'All Event Categories', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Event Category', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Event Category', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Event Category', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Event Category', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Event Categories with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Event Categories', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Event Categories', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'event_categories', 'post_event', array(
		'hierarchical' => true, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'event-category' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

function event_tags() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Event Tags', 'viennatheme' ),
		'singular_name' => esc_html__( 'Event Tags', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Event Tags', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Event Tags', 'viennatheme' ),
		'all_items' => esc_html__( 'All Event Tags', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Event Tag', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Event Tag', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Event Tag', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Event Tag', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Event Tags with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Event Tags', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Event Tags', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'eventtags', 'post_event', array(
		'hierarchical' => false, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'event-tag' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

add_action('init', 'cpt_events');
add_action('init', 'event_categories');
add_action('init', 'event_tags');