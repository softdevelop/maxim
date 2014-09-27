<?php

/*
Plugin Name: Maxim - Team Post Type Plugin
Plugin URI: http://www.silviuandrei.eu
Description: Maxim - Team Post Type Plugin
Author: Silviu Andrei
Author URI: http://www.silviuandrei.eu
Version: 1.0
*/

class SPSA_Maxim_Team_Post_Type {

	public function init() {
		$this->register_post_type();
		$this->taxonomies();
	}
	
	public function register_post_type() {
		$args = array(
			'labels' => array(
				'name' => 'Team',
				'singular_name' => 'Team',
				'add_new' => 'Add New Item',
				'add_new_item' => 'Add New Item',
				'edit_item' => 'Edit Item',
				'new_item' => 'Add New Item',
				'view_item' =>'View Item',
				'search_items' => 'Search Team',
				'not_found' => 'No Items Found',
				'not_found_in_trash' => 'No Items Found in Trash'
			),
			'query_var' => 'maxim_team',
			'rewrite' => array( 'slug' => 'team' ),
			'public' => true,
			// 'menu_position' => 25,
			// 'menu_icon' => admin_url() . 'images/media-button-video.gif',
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
		register_post_type('maxim_team', $args);
	}
	
	public function taxonomies() {
		$taxonomies = array();
		
		$taxonomies['team-filter'] = array(
			'hierarchical' => true,
			'query_var' => 'maxim_team_filter',
			'rewrite' => array(
				'slug' => 'team/filter',
			),
			'labels' => array(
				'name' => 'Team Filter',
				'singular_name' => 'Team Filter',
				'edit_item' => 'Edit Team Filter',
				'update_item' => 'Update Team Filter',
				'add_new_item' => 'Add Team Filter',
				'new_item_name' => 'Add New Team Filter',
				'all_items' => 'All Team Filters',
				'search_items' => 'Search Team Filters',
				'popular_items' => 'Popular Team Filters',
				'separate_items_with_comments' => 'Separate team filters with commas',
				'add_or_remove_items' => 'Add or remove team filters',
				'choose_from_most_used' => 'Choose from most used team filters'
			)
		);
		
		$this->register_all_taxonomies($taxonomies);
	}
	
	public function register_all_taxonomies($taxonomies) {
		foreach($taxonomies as $name => $arr) {
			register_taxonomy($name, array('maxim_team'), $arr);
		}
	}

}

$maxim_team_post_type = new SPSA_Maxim_Team_Post_Type();
add_action('init',array($maxim_team_post_type, 'init'));

?>