<?php
/**
 * @package WP_Tips
 * @version 1.0
 */
/*
Plugin Name: WP Tips
Plugin URI: https://wordpress.org/plugins/wp-tips/
Description: The plugin displays tips about WordPress at the top of the admin panel. When switching from one page to another, a hint changes.
Author: ivan192
Version: 1.0
Author URI: http://chudofo.forum2x2.ru
Text Domain: wp-tips
*/

function tips_get_help() {
	$help = "The console allows you to manage the website.
With automatic updates through the dashboard you can maintain plugins and themes in the current state.
If you are hampered by the navigation menu in the dashboard, you can collapse it.
If you do not have enough basic WordPress functionality, you can expand it with plugins.
There are a lot of free plugins in the WordPress directory, some of them may be useful to you.
After installing the plugin, you need to activate it.
You can see all the existing comments on your website in the Comments menu in the dashboard.
You can change the look of your website using themes.";

	$help = explode( "\n", $help );

	return wptexturize( $help[ mt_rand( 0, count( $help ) - 1 ) ] );
}

function tips_help() {
	$chosen = tips_get_help();
	echo "<p id='tipshelp'>$chosen</p>";
}

add_action( 'admin_notices', 'tips_help' );

function tips_css() {
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#helptips {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'tips_css' );
