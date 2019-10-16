<?php
/**
 * Disable auto append of sharing buttons after content and excerpt
 *
 * @package itereon
 */
function disable_jpsharing_append() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
}

add_action( 'init', 'disable_jpsharing_append' );
