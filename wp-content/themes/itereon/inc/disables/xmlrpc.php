<?php
/**
 * Disable XMLRPC
 *
 * @package itereon
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
