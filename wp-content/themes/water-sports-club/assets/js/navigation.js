/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});

 	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	// Click event to scroll to top.
	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 500 );
		return false;
	});
});

function water_sports_club_open() {
	jQuery(".sidenav").addClass('show');
}
function water_sports_club_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function water_sports_club_menuAccessibility() {
	var links, i, len,
	    water_sports_club_menu = document.querySelector( '.nav-menu' ),
	    water_sports_club_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let water_sports_club_focusableElements = 'button, a, input';
	let water_sports_club_firstFocusableElement = water_sports_club_iconToggle; // get first element to be focused inside menu
	let water_sports_club_focusableContent = water_sports_club_menu.querySelectorAll(water_sports_club_focusableElements);
	let water_sports_club_lastFocusableElement = water_sports_club_focusableContent[water_sports_club_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! water_sports_club_menu ) {
    	return false;
	}

	links = water_sports_club_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === water_sports_club_firstFocusableElement) {
		        water_sports_club_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === water_sports_club_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	water_sports_club_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    water_sports_club_menuAccessibility();
  	});
  	$('.search-toggle').click(function () {
	    water_sports_club_search_focus();
  	});
});

function water_sports_club_search_open() {
	jQuery(".search-outer").addClass('show');
}
function water_sports_club_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function water_sports_club_search_focus() {
	var links, i, len,
	    water_sports_club_search = document.querySelector( '.search-outer' ),
	    water_sports_club_iconToggle = document.querySelector( '.search-outer input[type="search"]' );
	    
	let water_sports_club_focusableElements = 'button, a, input';
	let water_sports_club_firstFocusableElement = water_sports_club_iconToggle; // get first element to be focused inside menu
	let water_sports_club_focusableContent = water_sports_club_search.querySelectorAll(water_sports_club_focusableElements);
	let water_sports_club_lastFocusableElement = water_sports_club_focusableContent[water_sports_club_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! water_sports_club_search ) {
    	return false;
	}

	links = water_sports_club_search.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'search-outer' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === water_sports_club_firstFocusableElement) {
		        water_sports_club_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === water_sports_club_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	water_sports_club_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}