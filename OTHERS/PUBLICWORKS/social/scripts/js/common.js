// JavaScript Document
$(document).ready(function () {

	$('.timeline .reply').on('change keyup keydown paste cut', 'textarea', function () {
		$(this).height(0).height(this.scrollHeight);
	}).find('textarea').change();
	
	
	//SEMANTIC
	$('.ui.dropdown').dropdown();
});

