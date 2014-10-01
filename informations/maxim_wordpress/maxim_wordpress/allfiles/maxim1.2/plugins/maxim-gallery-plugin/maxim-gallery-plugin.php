<?php

/*
Plugin Name: Maxim Gallery Plugin
Plugin URI: http://www.silviuandrei.eu
Description: Maxim Gallery Plugin.
Author: Silviu Andrei
Author URI: http://www.silviuandrei.eu
Version: 1.0
*/

class SPSA_Maxim_Gallery_Post_Type {

	public function init() {
		$this->register_post_type();
	}
	
	public function register_post_type() {
		$args = array(
			'labels' => array(
				'name' => 'Gallery',
				'singular_name' => 'Gallery',
				'add_new' => 'Add New Item',
				'add_new_item' => 'Add New Item',
				'edit_item' => 'Edit Item',
				'new_item' => 'Add New Item',
				'view_item' =>'View Item',
				'search_items' => 'Search Gallery',
				'not_found' => 'No Items Found',
				'not_found_in_trash' => 'No Items Found in Trash'
			),
			'query_var' => 'maxim_gallery',
			'rewrite' => array(
				'slug' => 'gallery'
			),
			'public' => true,
			// 'menu_position' => 25,
			// 'menu_icon' => admin_url() . 'images/media-button-video.gif',
			'supports' => array(
				'title',
				'thumbnail',
				'editor'
			)
		);
		register_post_type('maxim_gallery', $args);
	}

}

$maxim_gal_post_type = new SPSA_Maxim_Gallery_Post_Type();
add_action('init',array($maxim_gal_post_type, 'init'));

?>