jQuery(document).ready(function($){

	screenHeight = $( window ).height();
	menuHeight = $('.navbar').height();
	$('.home').css('margin-top', menuHeight);
	$('.section').css('minHeight', screenHeight);

	/**
	* DataTable for list of participants
	*/
	$('#participants-table').DataTable();

	
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

	/*Change Date Markup*/
	$('.special-date').datepicker({
		format: 'yyyy-mm-dd' ,
		viewMode: 2
	});


	/*For Scrolling in About page*/
	 //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        var scrollTarget = ($target.offset().top) - (menuHeight);
        $('html, body').stop().animate({
            'scrollTop': scrollTarget
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });

	jQuery(document).on("scroll", onScroll);

	//Go to sign-up section
	$("#register-now").click(function() {
	    var offset = menuHeight; 

	    $('html, body').animate({
	        scrollTop: $("#sign-up").offset().top - offset
	    }, 2000);
	});
	

});

var i = 1;
var maxFieldSet = 10;
function addFields() {
	if(i<maxFieldSet) {
		i++;
		if(i == maxFieldSet) {
			$('#addmore').css('display','none');
			$('#addmore-label').html('<small class="bg-danger">Reached Maximum Allowed Members per Group</small>');
		}
		var divAdd = '#others-' + i;
		$(divAdd).css('display', 'block');
	}
}

function removeField() {
	var fieldSetID = '#others-' + i;
	$(fieldSetID).css('display', 'none');
	i--;
}

function onScroll(event){
    var scrollPos = jQuery(document).scrollTop();
	var menuHeight = $('.navbar').height();

    jQuery('.navbar-collapse a').each(function () {
        var currLink = jQuery(this);
        var refElement = jQuery(currLink.attr("href"));
        if (((refElement.position().top) - menuHeight) <= scrollPos && ((refElement.position().top + refElement.height()) - menuHeight) > scrollPos) {
            jQuery('.navbar-collapse li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}