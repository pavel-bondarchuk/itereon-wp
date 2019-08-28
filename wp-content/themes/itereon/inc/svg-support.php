<?php
/**
 * Allow SVG through WordPress Media Uploader
 *
 * @package itereon
 */

function itereon_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'itereon_mime_types' );

function itereon_fix_svg_thumb() {
	echo '<style>td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {width: 100% !important;height: auto !important}</style>';
}

add_action( 'admin_head', 'itereon_fix_svg_thumb' );

function itereon_svgs_display_thumbs() {
	ob_start();
	add_action( 'shutdown', 'itereon_svgs_thumbs_filter', 0 );
	function itereon_svgs_thumbs_filter() {
		$final = '';
		if ( is_array( ob_get_level() ) || is_object( ob_get_level() ) ) {
			$ob_levels = count( ob_get_level() );
			for ( $i = 0; $i < $ob_levels; $i ++ ) {
				$final .= ob_get_clean();
			}
		}
		echo apply_filters( 'final_output', $final );
	}

	add_filter( 'final_output', 'itereon_svgs_final_output' );
	function itereon_svgs_final_output( $content ) {
		$content = str_replace( '<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>', '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <img class="details-image" src="{{ data.url }}" draggable="false" />
                <# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>', $content );
		$content = str_replace( '<# } else if ( \'image\' === data.type && data.sizes ) { #>', '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <div class="centered">
                    <img src="{{ data.url }}" class="thumbnail" draggable="false" />
                </div>
            <# } else if ( \'image\' === data.type && data.sizes ) { #>', $content );

		return $content;
	}
}

add_action( 'admin_init', 'itereon_svgs_display_thumbs' );
