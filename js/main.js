$(document).ready( function (){
	//Boton de navbar seleccionado
	var selectBtn = $(".active");
	document.cookie = selectBtn;
	
	//<<<<<<<<<ver si esta seteado o no... pero como se sabe que la cockie es actual, esta cockie tiene que durar 1 minuto.
	if(selectBtn)
	{
		$('.btnNavBar').removeClass('active'); 
		$(selectBtn).addClass('active');
	}
	else
	{
		
	}
	//Agregando manejadores
	$('.btnNavBar').click(function(e) {
		 $('.btnNavBar').removeClass('active'); 
		 $(this).addClass('active');
		 document.cookie="btnSeleccionado = " + $(this).attr("id");
	});

	$('.btnNavBar').hover(function() {
		/* Stuff to do when the mouse enters the element */
		$(this).toggleClass('hover');
	});
})