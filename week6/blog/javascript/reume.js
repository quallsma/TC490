$(document).ready(function(){
    $('#resume').accordion({collapsible: true, active: false, heightStyle: "content"});
	$('h3').mouseenter(function(){
		$(this).css('background', '#CCFFFF');
		$(this).css('opacity', '1.0');
		$(this).animate({
			"padding-left": "+=320px"}, 'slow');
	});
	$('h3').mouseleave(function(){
		$(this).stop();
		$(this).css('background', 'none');
		$(this).css('opacity', '0.5');
		$(this).animate({
			"padding-left": "-=320px"}, 'slow');

	});
});
