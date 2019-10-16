<?php
/**
 * Admin Bar modifications
 *
 * @package iterion
 */

/**
 * Disable Admin Bar (not recommended)
 */
//add_filter( 'show_admin_bar', '__return_false' );

/**
 * Remove WP logo
 */
function itereon_clear_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}

add_action( 'wp_before_admin_bar_render', 'itereon_clear_admin_bar' );
