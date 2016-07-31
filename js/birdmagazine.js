jQuery(function() {

	jQuery( window ).load(function() {

		// Masonry for Home
		jQuery( '.home.masonry ul.articles' ).masonry({
			itemSelector: '.entry',
			isAnimated: true
		});

		// Masonry for Footer
		jQuery( '#footer .widget-wrapper .container' ).masonry({
			itemSelector: '.widget',
			isAnimated: true
		});
	});

	// Toppage Menu
	jQuery("#small-menu").click(function(){
		jQuery("#menu-primary-items").slideToggle();
		jQuery(this).toggleClass("current");
	});

	// back to pagetop
	var totop = jQuery( '#back-top' );
	totop.hide();
	jQuery( window ).scroll(function(){
		if( jQuery( this ).scrollTop() > 800 ) totop.fadeIn(); else totop.fadeOut();
	});
	totop.click( function () {
		jQuery( 'body, html' ).animate( { scrollTop: 0 }, 500 ); return false;
	});
});

