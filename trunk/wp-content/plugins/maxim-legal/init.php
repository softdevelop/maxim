<?php
/*
Plugin Name: Legal
Description:
Version: 1
Author: softdevelop
Author URI: http://softdevelopvn.com
*/

//menu items
add_action('admin_menu','maxim_legal_modifymenu');
function maxim_legal_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Legal Form', //page title
		'Legal Form', //menu title
		'manage_options', //capabilities
		'maxim_legal_list', //menu slug
		'maxim_legal_list' //function
		);
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
		'View Legal Form', //page title
		'View', //menu title
		'manage_options', //capability
		'maxim_legal_view', //menu slug
		'maxim_legal_view'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
		'Update Legal Form', //page title
		'Update', //menu title
		'manage_options', //capability
		'maxim_legal_update', //menu slug
		'maxim_legal_update'); //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'maxim-legal-list.php');
require_once(ROOTDIR . 'maxim-legal-update.php');
require_once(ROOTDIR . 'maxim-legal-view.php');
