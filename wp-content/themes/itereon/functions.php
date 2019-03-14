<?php
/**
 * itereon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package itereon
 */

define( 'IT_URL', get_template_directory_uri() );
define( 'IT_DIR', get_template_directory() );
define( 'IT_CSS', get_template_directory_uri() . '/assets/dist/css/' );
define( 'IT_JS', get_template_directory_uri() . '/assets/dist/js/' );

require IT_DIR . '/inc/after-theme-setup.php';
require IT_DIR . '/inc/widgets.php';
require IT_DIR . '/inc/disables.php';
require IT_DIR . '/inc/login.php';
require IT_DIR . '/inc/svg-support.php';

/**
 * Enqueue scripts and styles.
 */
function itereon_scripts() {
	$ver = '';

	wp_enqueue_style( 'main-style', IT_CSS . 'main.css' );
	wp_enqueue_style( 'itereon-style', get_stylesheet_uri() );

	/**
	 * Font Awesome Library - check latest version using link below
	 *
	 * @link https://fontawesome.com/start
	 */
	wp_enqueue_style( 'starter-fa', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css' ); //Font Awesome - remove if not needed

	wp_enqueue_script( 'itereon-navigation', get_template_directory_uri() . '/js/navigation.js', [], $ver, true );
	wp_enqueue_script( 'itereon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], $ver, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itereon_scripts' );


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

