<?php
/*
Plugin Name: Site Plugin for example.com
Description: Site specific code changes for example.com
*/
/* Start Adding Functions Below this Line */
  
function your_prefix_register_taxonomy() {

	$args = array (
		'label' => esc_html__( 'Topics', 'text-domain' ),
		'labels' => array(
            'name' => _x( 'Topics', 'text-domain' ),
    'singular_name' => _x( 'Topic', 'text-domain' ),
			'menu_name' => esc_html__( 'Topics', 'text-domain' ),
			'all_items' => esc_html__( 'All Topics', 'text-domain' ),
			'edit_item' => esc_html__( 'Edit Topic', 'text-domain' ),
			'view_item' => esc_html__( 'View Topic', 'text-domain' ),
			'update_item' => esc_html__( 'Update Topic', 'text-domain' ),
			'add_new_item' => esc_html__( 'Add new Topic', 'text-domain' ),
			'new_item_name' => esc_html__( 'New Topic', 'text-domain' ),
			'parent_item' => esc_html__( 'Parent Topic', 'text-domain' ),
			'parent_item_colon' => esc_html__( 'Parent Topic:', 'text-domain' ),
			'search_items' => esc_html__( 'Search Topics', 'text-domain' ),
			'popular_items' => esc_html__( 'Popular Topics', 'text-domain' ),
			'separate_items_with_commas' => esc_html__( 'Separate Topics with commas', 'text-domain' ),
			'add_or_remove_items' => esc_html__( 'Add or remove Topics', 'text-domain' ),
			'choose_from_most_used' => esc_html__( 'Choose most used Topics', 'text-domain' ),
			'not_found' => esc_html__( 'No Topics found', 'text-domain' ),
			'name' => esc_html__( 'Topics', 'text-domain' ),
			'singular_name' => esc_html__( 'Topic', 'text-domain' ),
		),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
		'hierarchical' => false,
		'query_var' => true,
		'sort' => false,
		'rewrite_no_front' => false,
		'rewrite_hierarchical' => false,
		'rewrite' => true,
	);

	register_taxonomy( 'topic', array( 'post' ), $args );
}
add_action( 'init', 'your_prefix_register_taxonomy', 0 );



function james_get_meta_box( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'james',
		'title' => esc_html__( 'Special Post Metabox', 'metabox-online-generator' ),
		'post_types' => array('post', 'page' ),
		'context' => 'after_editor',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'taxonomy_1',
				'type' => 'taxonomy',
				'name' => esc_html__( 'Taxonomy', 'metabox-online-generator' ),
				'taxonomy' => 'category',
				'field_type' => 'select',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'james_get_meta_box' );
  
/* Stop Adding Functions Below this Line */
?>