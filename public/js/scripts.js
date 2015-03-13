jQuery(document).ready(function($){

	screenHeight = $( window ).height();
	$('.section').css('minHeight', screenHeight);

	
	/*
	* display floating flash message
	*
	*/
	$(".flash-msg").fadeIn('slow').delay(5000).fadeOut('slow');
});