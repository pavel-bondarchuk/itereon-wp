$ = jQuery;

$( document ).ready( function( $ ) {
	"use strict";
	$( '.hamburger' ).on( 'click', function() {
		$( this ).toggleClass( 'is-active' );
		$('#masthead').toggleClass( 'menu-open' );
		$('body').toggleClass( 'no-scroll' );
	} );
	$( '.search-icon' ).on( 'click', function() {
		$( '.search-form' ).toggleClass( 'is-active' );
	});
	$(window).on("scroll", function() {
		var sticky = $('#masthead'),
			scroll = $(window).scrollTop();
		if (scroll >= 150) sticky.addClass('sticky-header');
		else sticky.removeClass('sticky-header');
	});
	$( '.menu-item-has-children' ).on( 'click', function() {
		$( this ).find('ul.sub-menu').toggleClass( 'sub-menu-open' );
	});
} );



$( '.load-more' ).click( function() {
	var $this = $( this );
	$.get( $this.attr( 'href' ), function( data ) {
		$( data ).find( '.grid > div' ).each( function() {
			$( '.grid' ).append( $( this ) );

		} );

		if ( $( data ).find( '.load-more' ).length ) {
			$this.attr( 'href', $( data ).find( '.load-more' ).attr( 'href' ) );
		} else {
			$this.hide()
		}
	} );
	return false;

} );
