<?php
/*
Plugin Name: WP Database Fetch
Plugin URI: http://coderssociety.in
Description: Use this plugin if you want to display content on your site from your other websites. Easy to use, this plugin is great to create microsites. This plugin will allow you to get Posts, Pages, etc from other databases. Helpful to create Mircosites. A simple solution to display content on your subdomain site from main site by connecting to database.

Version: 1.3.1
Author: Coders Society
Author URI: http://coderssociety.in
License: GPL2
*/
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/* ---- plugin head ---- */
//add settings page to menu
function data_add_options_fetch() {
add_menu_page( 'WP Database Fetch', 'WP Database Fetch', 'manage_options', 'database-fetch.php', 'plugin_options_page_fetch', '');
}
add_action( 'admin_menu', 'data_add_options_fetch' );

//add actions
function plugin_options_add_fetch(){
    register_setting( 'plugin_database_get', 'plugin_database' );
}
add_action( 'admin_init', 'plugin_options_add_fetch' );
// Add settings link on plugin page
function database_fetch_link($links) { 
  $settings_link = '<a href="admin.php?page=database-fetch.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'database_fetch_link' );
/* ---- plugin head end ---- */

include_once( plugin_dir_path( __FILE__ ) . "assets/widget.php");
include_once( plugin_dir_path( __FILE__ ) . "assets/main.php");
