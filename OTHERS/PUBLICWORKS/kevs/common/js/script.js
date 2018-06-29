$(document).ready(function(){
	var $parent = $('.container');
	
	
	$('.aright').click(function(e){
		e.preventDefault();

		var container_w = $('.wrap').width();
		var wrap_l = ($parent.css('left').replace('px','') / container_w) * 100;

		wrap_l = Number(wrap_l) * Number(-1);
		var mleft = wrap_l + 100;

		mleft = "-" + mleft + "%";

		$parent.animate({
			left: mleft
		},1500);
	});
	
	
	
	$('.adown').click(function(e){
		e.preventDefault();

		var container_w = $('.wrap').height();
		var wrap_l = ($parent.css('top').replace('px','') / container_w) * 100;

		wrap_l = Number(wrap_l) * Number(-1);
		var mleft = wrap_l + 100;

		mleft = "-" + mleft + "%";

		$parent.animate({
			top: mleft
		},1500);
	});
	
	
	
	
	
});