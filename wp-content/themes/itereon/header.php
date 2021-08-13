<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itereon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 's_itereon' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row align-items-center">
			<div class="col-lg-2 col-3">
			<div class="site-branding">
					<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						echo '<h1>' . get_bloginfo('name') . '</h1>';
					}
					?>
			</div><!-- .site-branding -->
			</div>
			<div class="col-lg-10 col-9 d-flex justify-content-end">
				<button class="menu-toggle hamburger hamburger--slider" type="button" aria-controls="primary-menu" aria-expanded="false">
					<span class="hamburger-box">
					    <span class="hamburger-inner"></span>
					</span>
				</button>
				<?php
				wp_nav_menu( [
					'theme_location' => 'main-nav',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => false,
					'container'      => 'nav',
					'container_class' => 'main-navigation',
					'container_id'    => 'site-navigation',
				] );
				?>
				<span class="search-icon d-xl-flex align-items-center"><i class="fa fa-search"></i></span>
				<?php echo get_search_form(); ?>
			<!-- #site-navigation -->
			</div>
		</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
