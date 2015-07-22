$(document).ready( function (){
	//console.log("ready!");

	//Agregando manejadores
	$('.btnNavBar').click(function(e) {
		 $('.btnNavBar').removeClass('active'); $(this).addClass('active');
	});

	$('.btnNavBar').hover(function() {
		/* Stuff to do when the mouse enters the element */
		$(this).toggleClass('hover');
	});
})