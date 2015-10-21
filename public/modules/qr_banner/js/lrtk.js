$(document).ready(function(){
	$('#hb').click(function(){
		var _left = ($(window).width() - 960) / 2;
		$('#self-intro').animate({left: _left + 'px'});
		$('#self-intro').find('.clos').fadeIn('fast');
		$(this).hide();
	})
	
	$('#self-intro .clos').click(function(){
		$('#self-intro').animate({left:'-920px'});
		$(this).fadeOut('fast');
		$('#hb').show();
	})
})