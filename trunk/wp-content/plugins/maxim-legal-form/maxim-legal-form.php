<?php

/*
Plugin Name: Maxim - Legal Plugin
Plugin URI: http://www.silviuandrei.eu
Description: Maxim - Work Post Type Plugin
Author: Silviu Andrei
Author URI: http://www.silviuandrei.eu
Version: 1.0
*/

class Legal_Form {

	public function init() {
		$this->register_post_type();
		$this->taxonomies();
	}
	
	public function register_post_type() {
		
	}
	
	public function taxonomies() {
		
	}
	
	public function register_all_taxonomies($taxonomies) {
		
	}

}

$maxim_work_post_type = new Legal_Form();
add_action('init',array($maxim_work_post_type, 'init'));

?>