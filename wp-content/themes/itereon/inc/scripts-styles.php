<?php
/**
 * Include scripts and styles into theme
 *
 * @link https://developer.wordpress.org/reference/functions/wp_register_style/
 * @link https://developer.wordpress.org/reference/functions/wp_register_script/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_style/
 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_script/
 *
 * @package itereon
 */


/**
 * Enqueue scripts and styles.
 */
function itereon_scripts() {
	$ver = '';

	/**
	 * Global Styles
	 */
	wp_enqueue_style( 'main-styles', IT_CSS . 'main.min.css', [], $ver );
	wp_enqueue_style( 'addon-styles', get_stylesheet_uri(), [], $ver );

	/**
	 * Font Awesome Library - check latest version using link below
	 *
	 * @link https://fontawesome.com/start
	 */
	wp_enqueue_style( 'starter-fa', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css' ); //Font Awesome - remove if not needed

	/**
	 * Global JavaScript
	 */
	wp_enqueue_script( 'itereon-js', IT_JS . 'app.min.js', [], $ver, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itereon_scripts' );
