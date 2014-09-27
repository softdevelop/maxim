<?php

/*
Plugin Name: Maxim - Clients Post Type Plugin
Plugin URI: http://www.silviuandrei.eu
Description: Maxim - Clients Post Type Plugin
Author: Silviu Andrei
Author URI: http://www.silviuandrei.eu
Version: 1.0
*/

class SPSA_Maxim_Clients_Post_Type {

	public function init() {
		$this->register_post_type();
		$this->taxonomies();
	}
	
	public function register_post_type() {
		$args = array(
			'labels' => array(
				'name' => 'Clients',
				'singular_name' => 'Clients',
				'add_new' => 'Add New Item',
				'add_new_item' => 'Add New Item',
				'edit_item' => 'Edit Item',
				'new_item' => 'Add New Item',
				'view_item' =>'View Item',
				'search_items' => 'Search Clients',
				'not_found' => 'No Items Found',
				'not_found_in_trash' => 'No Items Found in Trash'
			),
			'query_var' => 'maxim_clients',
			'rewrite' => array( 'slug' => 'clients' ),
			'public' => true,
			// 'menu_position' => 25,
			// 'menu_icon' => admin_url() . 'images/media-button-video.gif',
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
		register_post_type('maxim_clients', $args);
	}
	
	public function taxonomies() {
		$taxonomies = array();
		
		$taxonomies['clients-filter'] = array(
			'hierarchical' => true,
			'query_var' => 'maxim_clients_filter',
			'rewrite' => array(
				'slug' => 'clients/filter',
			),
			'labels' => array(
				'name' => 'Clients Filter',
				'singular_name' => 'Clients Filter',
				'edit_item' => 'Edit Clients Filter',
				'update_item' => 'Update Clients Filter',
				'add_new_item' => 'Add Clients Filter',
				'new_item_name' => 'Add New Clients Filter',
				'all_items' => 'All Clients Filters',
				'search_items' => 'Search Clients Filters',
				'popular_items' => 'Popular Clients Filters',
				'separate_items_with_comments' => 'Separate clients filters with commas',
				'add_or_remove_items' => 'Add or remove clients filters',
				'choose_from_most_used' => 'Choose from most used clients filters'
			)
		);
		
		$this->register_all_taxonomies($taxonomies);
	}
	
	public function register_all_taxonomies($taxonomies) {
		foreach($taxonomies as $name => $arr) {
			register_taxonomy($name, array('maxim_clients'), $arr);
		}
	}

}

$maxim_clients_post_type = new SPSA_Maxim_Clients_Post_Type();
add_action('init',array($maxim_clients_post_type, 'init'));

?>