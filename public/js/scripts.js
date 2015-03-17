jQuery(document).ready(function($){

	screenHeight = $( window ).height();
	$('.section').css('minHeight', screenHeight);

	
	/*
	* display floating flash message
	*
	*/
	$(".flash-msg").fadeIn('slow').delay(5000).fadeOut('slow');


	/* Export List*/
	$('.export').click(function() {
	   var exportLink = this.id;

	   $.ajax(
		{
		  type: 'GET',
		  url: exportLink, data: {}, 
		  beforeSend: function(XMLHttpRequest)
		  {
	   		$('.progress-div').show();

		  },

		  success: function(data){
		    // successful completion handler
		    $('.progress-div').hide();
		    window.location = exportLink;
		  }
		});
	});
});