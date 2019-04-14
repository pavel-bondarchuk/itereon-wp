<?php
/**
 * Customise login screen
 *
 * @package itereon
 */

/**
 * Changing the logo link from wordpress.org to root domain
 */
function itereon_login_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'itereon_login_url' );

/**
 * Changing the alt text on the logo to show your site name
 */
function itereon_login_title() {
	return get_option( 'blogname' );
}

add_filter( 'login_headertitle', 'itereon_login_title' );

/**
 * Custom footer link
 */
function custom_loginfooter() { ?>
	<p class="custom-footer-link"><a href="https://osmilab.com" target="new" title="Site by OSMILAB"><img alt="" src=""/></a></p>
<?php }

//add_action( 'login_footer', 'custom_loginfooter' );

/**
 * Styles for login page
 */
function itereon_login_stylesheet() {
	wp_enqueue_style( 'itereon-login', IT_CSS . 'login.min.css' );
	wp_enqueue_script( 'itereon-login', IT_JS . 'login.min.js' );
}

add_action( 'login_enqueue_scripts', 'itereon_login_stylesheet' );
