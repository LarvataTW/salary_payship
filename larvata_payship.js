$(document).ready(function(){
	var window_height = 0;
	$(window).on('resize',function() {
		console.log('resie');
	  window_height	= $(window).height();
	  $('.block').height((window_height-80));
	});
	window_height	= $(window).height();
	console.log($(window).height());
	console.log($( document ).height());
	$('.block').height((window_height-80));
});