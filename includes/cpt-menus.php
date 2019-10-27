<?php
function cpt_menus(){
	
	/*if(function_exists('ot_get_option')){
		$url_rewrite = ot_get_option('staff_post_type_url');
		if( $url_rewrite == '' ) { 
			$url_rewrite = 'staff-member'; 
		} 
	} else {
		$url_rewrite = 'staff-member';
	}*/

	register_post_type('post_menus',
		array(
			'labels' => array(
				'name' => esc_html__( 'Menu', 'viennatheme' ),
				'singular_name' => esc_html__( 'Menu', 'viennatheme' ),
				'add_new' => esc_html__( 'Add New Menu item', 'viennatheme' ),
				'add_new_item' => esc_html__( 'Add New Menu item', 'viennatheme' ),
				'edit' => esc_html__( 'Edit', 'viennatheme' ),
				'edit_item' => esc_html__( 'Edit Menu item', 'viennatheme' ),
				'new_item' => esc_html__( 'New Menu item', 'viennatheme' ),
				'view' => esc_html__( 'View', 'viennatheme' ),
				'view_item' => esc_html__( 'View Menu item', 'viennatheme' ),
				'search_items' => esc_html__( 'Search Menu items', 'viennatheme' ),
				'not_found' => esc_html__( 'No Menu items found', 'viennatheme' ),
				'not_found_in_trash' => esc_html__( 'No Menu items found in Trash', 'viennatheme' ),
				'parent' => esc_html__( 'Parent Menu item', 'viennatheme' )
			),
			'description' => esc_html__( 'Easily lets you add new menu items', 'viennatheme' ),
			'public' => true,
			'show_ui' => true, 
			'_builtin' => false,
			'map_meta_cap' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'pages' => true,
			//'has_archive' => true, //SAVES IN AN ARCHIVE?
			'rewrite' => array('slug' => 'menus'),
			'supports' => array('title', 'editor', 'author', 'excerpt'),
			//'taxonomies' => array('category', 'post_tag')
		)
	); 
	flush_rewrite_rules();
}

function tax_menus() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Menu Categories', 'viennatheme' ),
		'singular_name' => esc_html__( 'Menu Categories', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Menu Categories', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Menu Categories', 'viennatheme' ),
		'all_items' => esc_html__( 'All Menu Categories', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Menu Category', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Menu Category', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Menu Category', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Menu Category Name', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Menu Categories with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Menu Categories', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Menu Categories', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'menucats', 'post_menus', array(
		'hierarchical' => true, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'menu-archive' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

function menu_tags() {
	
	// create the array for 'labels'
    $labels = array(
		'name' => esc_html__( 'Menu Tags', 'viennatheme' ),
		'singular_name' => esc_html__( 'Menu Tags', 'viennatheme' ),
		'search_items' =>  esc_html__( 'Search Menu Tags', 'viennatheme' ),
		'popular_items' => esc_html__( 'Popular Menu Tags', 'viennatheme' ),
		'all_items' => esc_html__( 'All Menu Tags', 'viennatheme' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => esc_html__( 'Edit Menu Tag', 'viennatheme' ),
		'update_item' => esc_html__( 'Update Menu Tag', 'viennatheme' ),
		'add_new_item' => esc_html__( 'Add Menu Tag', 'viennatheme' ),
		'new_item_name' => esc_html__( 'New Menu Tag', 'viennatheme' ),
		'separate_items_with_commas' => esc_html__( 'Separate Menu Tags with commas', 'viennatheme' ),
		'add_or_remove_items' => esc_html__( 'Add or remove Menu Tags', 'viennatheme' ),
		'choose_from_most_used' => esc_html__( 'Choose from the most used Menu Tags', 'viennatheme' )
    );
	
    // register your Flags taxonomy
    register_taxonomy( 'menutags', 'post_menus', array(
		'hierarchical' => false, //Set to true for categories or false for tags
		'labels' => $labels, // adds the above $labels array
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'menu-tag' ), // changes name in permalink structure
    ));
	
	flush_rewrite_rules();	
}

add_action('init', 'cpt_menus');
add_action('init', 'tax_menus');
add_action('init', 'menu_tags');