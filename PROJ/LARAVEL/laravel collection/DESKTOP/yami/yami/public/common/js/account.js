$(document).ready(function(){
	$('.avatar .btn').click(function(e){
		e.preventDefault();
		$("#pictureModal").modal()
	});
	
	$('.cname .btn').click(function(e){
		e.preventDefault();
		$("#chatnameModal").modal()
	});
});