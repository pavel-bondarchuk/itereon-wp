<?php
/**
 * Disabling some WordPress core features to improve performance and security
 *
 * @package itereon
 */
foreach ( glob( IT_DIR . "/inc/disables/*" ) as $filename ) {
	require $filename;
}
