<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package itereon
 */
function itereon_widgets_init() {
	register_sidebar( [
		'name'          => esc_html__( 'Sidebar', 's_itereon' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 's_itereon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	] );
	register_sidebar( [
		'name'          => esc_html__( 'Footer', 's_itereon' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 's_itereon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	] );
}
add_action( 'widgets_init', 'itereon_widgets_init' );
