$(function() {

	//make the bar graph
	$('#skillSet li').each(function(){ //for each li
		percentage = $(this).attr('data-percentage'); //get the relevant data-attr val
		$(this).css({
			'width': percentage+'%' //and set the width of the li accordingly
		});
	});

	//clear input fields
	$("form input#name,form input#phone,form input#email, form textarea").focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});

});