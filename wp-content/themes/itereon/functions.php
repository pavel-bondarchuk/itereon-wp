<?php
/**
 * itereon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package itereon
 */

add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

define( 'IT_URL', get_template_directory_uri() );
define( 'IT_DIR', get_template_directory() );
define( 'IT_CSS', get_template_directory_uri() . '/assets/dist/css/' );
define( 'IT_JS', get_template_directory_uri() . '/assets/dist/js/' );

require IT_DIR . '/inc/after-theme-setup.php'; // all hooks that needs to be done on after_theme_setup
require IT_DIR . '/inc/widgets.php'; // All sidebars and widgets
require IT_DIR . '/inc/disables.php'; // Disable of extra unwanted features
require IT_DIR . '/inc/svg-support.php'; // Adds support for SVG upload
require IT_DIR . '/inc/scripts-styles.php'; // All scripts and styles enqueue | dequeue
require IT_DIR . '/inc/help-func.php'; // Helper functions
require IT_DIR . '/inc/lazy-load.php'; // Images and Iframes lazyload

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

