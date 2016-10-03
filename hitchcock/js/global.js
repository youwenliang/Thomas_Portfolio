jQuery(document).ready(function($) {
	
	
	// Enable dropdown menus on touch devices
	$( '.main-menu li:has(ul)' ).doubleTapToGo();
	
	
	// Toggle navigation
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".mobile-navigation").slideToggle();
		return false;
	});
	
	var h0 = $(".post-info").height();

	if ($(window).width() > 782) {
		var h1 = h0;
		var h2 = $(".post-content *:first-child").height();

		if(h1 > h2) $(".post-content *:first-child").height(h1);
		else if(h1 < h2) $(".post-info").height(h2);
		console.log("???");
	} else {
		$(".post-info").height("auto");
		$(".post-content *:first-child").height("auto");
	}
	
	// Hide mobile-navigation > 900
	$(window).resize(function() {
		console.log("!!");
		if ($(window).width() > 900) {
			$(".nav-toggle").removeClass("active");
			$(".mobile-navigation").hide();
		}
		if ($(window).width() > 782) {
			var h1 = h0;
			var h2 = $(".post-content *:first-child").height();

			if(h1 > h2) $(".post-content *:first-child").height(h1);
			else if(h1 < h2) $(".post-info").height(h2);
		} else {
			$(".post-info").height("auto");
			$(".post-content *:first-child").height("auto");
		}
	});
	
	
	// Load Flexslider
    $(".flexslider").flexslider({
        animation: "slide",
        controlNav: true,
        smoothHeight: true,
        nextText: '<span class="fa fw fa-angle-right"></span>',
        prevText: '<span class="fa fw fa-angle-left"></span>',
    });

        			
	// resize videos after container
	var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).resize(function() {
		resizeVideo(vidSelector);
	});
	
});

( function( $ ) {
    $( document.body ).on( 'post-load', function () {
        $('.infinite-loader').remove();
        $('.posts .clear').remove();
		$('.posts').append('<div class="clear"></div>');
    } );
} )( jQuery );