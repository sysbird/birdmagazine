jQuery(function() {

	jQuery( window ).load(function() {

		// Masonry for Home
		jQuery( 'body.masonry ul.articles' ).masonry({
			itemSelector: '.entry'
		});

		// Masonry for Footer
		jQuery( '#footer .widget-wrapper .container' ).masonry({
			itemSelector: '.widget'
		});
	});

	// Toppage Menu
	jQuery("#small-menu").click(function () {
		jQuery("#menu-primary-items").slideToggle()
		jQuery("#menu-wrapper").toggleClass("open");
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

