<?php
function cpt_gallery(){
	
	/*if(function_exists('ot_get_option')){
		$url_rewrite = ot_get_option('staff_post_type_url');
		if( $url_rewrite == '' ) { 
			$url_rewrite = 'staff-member'; 
		} 
	} else {
		$url_rewrite = 'staff-member';
	}*/

	register_post_type('post_galleries',
		array(
			'labels' => array(
				'name' => esc_html__( 'Gallery', 'viennatheme' ),
				'singular_name' => esc_html__( 'Gallery', 'viennatheme' ),
				'add_new' => esc_html__( 'Add New Gallery item', 'viennatheme' ),
				'add_new_item' => esc_html__( 'Add New Gallery item', 'viennatheme' ),
				'edit' => esc_html__( 'Edit', 'viennatheme' ),
				'edit_item' => esc_html__( 'Edit Gallery item', 'viennatheme' ),
				'new_item' => esc_html__( 'New Gallery item', 'viennatheme' ),
				'view' => esc_html__( 'View', 'viennatheme' ),
				'view_item' => esc_html__( 'View Gallery item', 'viennatheme' ),
				'search_items' => esc_html__( 'Search Gallery items', 'viennatheme' ),
				'not_found' => esc_html__( 'No Gallery items found', 'viennatheme' ),
				'not_found_in_trash' => esc_html__( 'No Gallery items found in Trash', 'viennatheme' ),
				'parent' => esc_html__( 'Parent Staff', 'viennatheme' )
			),
			'description' => esc_html__( 'Easily lets you add new gallery items', 'viennatheme' ),
			'public' => true,
			'show_ui' => true, 
			'_builtin' => false,
			'map_meta_cap' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'pages' => true,
			//'has_archive' => true, //SAVES IN AN ARCHIVE?
			'rewrite' => array('slug' => 'gallery'),
			'supports' => array('title', 'editor', 'author', 'excerpt', 'comments'),
			//'taxonomies' => array('category', 'post_tag')
		)
	); 
	flush_rewrite_rules();
}

function gallery_categories() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Gallery Categories', 'viennatheme' ),
		'singular_name' => esc_html__( 'Gallery Categories', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Gallery Categories', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Gallery Categories', 'viennatheme' ),
		'all_items' => esc_html__( 'All Gallery Categories', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Gallery Category', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Gallery Category', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Gallery Category', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Gallery Category Name', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Gallery Categories with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Gallery Categories', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Gallery Categories', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'gallerycats', 'post_galleries', array(
		'hierarchical' => true, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'gallery-category' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

function gallery_tags() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Gallery Tags', 'viennatheme' ),
		'singular_name' => esc_html__( 'Gallery Tags', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Gallery Tags', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Gallery Tags', 'viennatheme' ),
		'all_items' => esc_html__( 'All Gallery Tags', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Gallery Category', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Gallery Category', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Gallery Category', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Gallery Category Name', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Gallery Tags with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Gallery Tags', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Gallery Tags', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'gallerytags', 'post_galleries', array(
		'hierarchical' => false, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'gallery-tag' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

add_action('init', 'cpt_gallery');
add_action('init', 'gallery_categories');
add_action('init', 'gallery_tags');