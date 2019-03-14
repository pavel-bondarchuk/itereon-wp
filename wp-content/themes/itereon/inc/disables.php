<?php
/**
 * Disabling some WordPress core features to improve performance
 *
 * @package itereon
 */

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 *
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}

/**
 * Disable auto append of sharing buttons after content and excerpt
 */
function disable_jpsharing_append() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
}

add_action( 'init', 'disable_jpsharing_append' );

/**
 * Disable XMLRPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Disable Gutenberg block styles
 */
function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

/**
 * Disable Admin Bar(no recommended)
 */
//add_filter( 'show_admin_bar', '__return_false' );

/**
 * Remove WordPress version from head tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove WP logo
 */
function itereon_clear_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}

add_action( 'wp_before_admin_bar_render', 'itereon_clear_admin_bar' );

/**
 * Remove dashboard widgets
 */
function itereon_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //Quick Press widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); //Recent Drafts
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); //WordPress.com Blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); //Other WordPress News
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' ); //Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); //Plugins
	remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' ); //Gravity Forms
	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' ); //Multi Language Plugin
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
//	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); //Activity
//	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); //Right Now
//	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); //Recent Comments
}

add_action( 'wp_dashboard_setup', 'itereon_remove_dashboard_widgets' );