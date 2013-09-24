/**
 * @author Mat Sadler
 */
$(document).ready(function() {
	var $scrollingDiv = $("#stickynav");
	var $logo = $(".logo");

	$(window).scroll(function() {

		newSize = 0;
		if ($('body').scrollTop() < 200) {
			$scrollingDiv.stop().animate({
				padding : 15
			}, 30);
			$logo.stop().animate({
				width : 300
			}, 30);
		}

		if ($('body').scrollTop() > 200) {

			$scrollingDiv.stop().animate({
				padding : newSize
			}, 200);
			$logo.stop().animate({
				width : 190
			}, 200);
		}

		
	});

});
