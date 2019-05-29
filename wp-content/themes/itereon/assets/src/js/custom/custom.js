$ = jQuery;

$( document ).ready( function( $ ) {
	"use strict";
	$( '.hamburger' ).click( function() {
		$( this ).toggleClass( 'is-active' );
	} );
} );

