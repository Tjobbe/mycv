$(function() {
	$('#skillSet li').each(function(){ //for each li
		percentage = $(this).attr('data-experience'); //get the relevant data-attr val
		$(this).css({
			'width': percentage+'%' //and set the width of the li accordingly
		});
	});
});