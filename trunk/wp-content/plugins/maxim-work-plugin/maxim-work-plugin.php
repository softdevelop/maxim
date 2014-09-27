<?php

/*
Plugin Name: Maxim - Work Post Type Plugin
Plugin URI: http://www.silviuandrei.eu
Description: Maxim - Work Post Type Plugin
Author: Silviu Andrei
Author URI: http://www.silviuandrei.eu
Version: 1.0
*/

class SPSA_Maxim_Work_Post_Type {

	public function init() {
		$this->register_post_type();
		$this->taxonomies();
	}
	
	public function register_post_type() {
		$args = array(
			'labels' => array(
				'name' => 'Work',
				'singular_name' => 'Work',
				'add_new' => 'Add New Item',
				'add_new_item' => 'Add New Item',
				'edit_item' => 'Edit Item',
				'new_item' => 'Add New Item',
				'view_item' =>'View Item',
				'search_items' => 'Search Work',
				'not_found' => 'No Items Found',
				'not_found_in_trash' => 'No Items Found in Trash'
			),
			'query_var' => 'maxim_work',
			'rewrite' => array( 'slug' => 'work' ),
			'public' => true,
			// 'menu_position' => 25,
			// 'menu_icon' => admin_url() . 'images/media-button-video.gif',
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
		register_post_type('maxim_work', $args);
	}
	
	public function taxonomies() {
		$taxonomies = array();
		
		$taxonomies['work-filter'] = array(
			'hierarchical' => true,
			'query_var' => 'maxim_work_filter',
			'rewrite' => array(
				'slug' => 'work/filter',
			),
			'labels' => array(
				'name' => 'Work Filter',
				'singular_name' => 'Work Filter',
				'edit_item' => 'Edit Work Filter',
				'update_item' => 'Update Work Filter',
				'add_new_item' => 'Add Work Filter',
				'new_item_name' => 'Add New Work Filter',
				'all_items' => 'All Work Filters',
				'search_items' => 'Search Work Filters',
				'popular_items' => 'Popular Work Filters',
				'separate_items_with_comments' => 'Separate work filters with commas',
				'add_or_remove_items' => 'Add or remove work filters',
				'choose_from_most_used' => 'Choose from most used work filters'
			)
		);
		
		$this->register_all_taxonomies($taxonomies);
	}
	
	public function register_all_taxonomies($taxonomies) {
		foreach($taxonomies as $name => $arr) {
			register_taxonomy($name, array('maxim_work'), $arr);
		}
	}

}

$maxim_work_post_type = new SPSA_Maxim_Work_Post_Type();
add_action('init',array($maxim_work_post_type, 'init'));

?>