$ = jQuery;

$( document ).ready( function( $ ) {
	"use strict";
	$( '.hamburger' ).click( function() {
		let $this = $(this);
		$( this ).toggleClass( 'is-active' );
	} );
} );

