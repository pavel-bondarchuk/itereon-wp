jQuery( document ).ready( function( $ ) {
	"use strict";
	console.log( 'test' );
	$( 'body' ).click( function(  ) {
		console.log( $( this ) );
		$(this).addClass('test');

	} );
} );
