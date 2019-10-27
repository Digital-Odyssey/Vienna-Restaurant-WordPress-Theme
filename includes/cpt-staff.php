<?php
function cpt_staff(){
	
	/*if(function_exists('ot_get_option')){
		$url_rewrite = ot_get_option('staff_post_type_url');
		if( $url_rewrite == '' ) { 
			$url_rewrite = 'staff-member'; 
		} 
	} else {
		$url_rewrite = 'staff-member';
	}*/

	register_post_type('post_staff',
		array(
			'labels' => array(
				'name' => esc_html__( 'Staff', 'viennatheme' ),
				'singular_name' => esc_html__( 'Staff', 'viennatheme' ),
				'add_new' => esc_html__( 'Add New Staff profile', 'viennatheme' ),
				'add_new_item' => esc_html__( 'Add New Staff profile', 'viennatheme' ),
				'edit' => esc_html__( 'Edit', 'viennatheme' ),
				'edit_item' => esc_html__( 'Edit Staff profile', 'viennatheme' ),
				'new_item' => esc_html__( 'New Staff profile', 'viennatheme' ),
				'view' => esc_html__( 'View', 'viennatheme' ),
				'view_item' => esc_html__( 'View Staff profile', 'viennatheme' ),
				'search_items' => esc_html__( 'Search Staff profiles', 'viennatheme' ),
				'not_found' => esc_html__( 'No Staff profiles found', 'viennatheme' ),
				'not_found_in_trash' => esc_html__( 'No Staff profiles found in Trash', 'viennatheme' ),
				'parent' => esc_html__( 'Parent Staff', 'viennatheme' )
			),
			'description' => esc_html__( 'Easily lets you add new staff profiles', 'viennatheme' ),
			'public' => true,
			'show_ui' => true, 
			'_builtin' => false,
			'map_meta_cap' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'pages' => true,
			//'has_archive' => true, //SAVES IN AN ARCHIVE?
			'rewrite' => array('slug' => 'staff-member'),
			'supports' => array('title', 'editor', 'author', 'excerpt'),
			//'taxonomies' => array('category', 'post_tag')
		)
	); 
	flush_rewrite_rules();
}

function staff_titles() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Staff Titles', 'viennatheme' ),
		'singular_name' => esc_html__( 'Staff Titles', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Staff Titles', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Staff Titles', 'viennatheme' ),
		'all_items' => esc_html__( 'All Staff Titles', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Staff Title', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Staff Title', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Staff Title', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Staff Title', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Staff Titles with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Staff Title', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Staff Titles', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'staff_titles', 'post_staff', array(
		'hierarchical' => true, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'staff-title' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

add_action('init', 'cpt_staff');
add_action('init', 'staff_titles');