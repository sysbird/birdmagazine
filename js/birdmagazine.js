jQuery(function() {

	// Toppage Menu
	jQuery("#small-menu").click(function(){
		jQuery("#menu-primary-items").slideToggle();
		jQuery(this).toggleClass("current");
	});

});

