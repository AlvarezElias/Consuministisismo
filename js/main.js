function pintarNavBar()
{
	//Boton de navbar seleccionado
	var selectBtn = getCookie("botonBarra");
	
	//<<<<<<<<<ver si esta seteado o no... pero como se sabe que la cockie es actual, esta cockie tiene que durar 1 minuto.
	if(selectBtn)
	{
		$('.btnNavBar').removeClass('active'); 
		$(selectBtn).addClass('active');
	}
	else
	{
		selectBtn = "#" + $(".active").attr('id');
		setCookie("botonBarra",selectBtn, 0 );
	}
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') 
        	c = c.substring(1);
        if (c.indexOf(name) == 0) 
        	return c.substring(name.length,c.length);
    }
    return "";
}


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

$(document).ready( function (){
	
	pintarNavBar();


	//Agregando manejadores
	$('.btnNavBar , .lnkNavBar').click(function(e) {
		selectBtn = "#" + $(this).attr('id');
		setCookie("botonBarra",selectBtn, 0 );
		$('.btnNavBar').removeClass('active'); 
		$(this).addClass('active');
	});

	$('.btnNavBar, .lnkNavBar').hover(function() {
		/* Stuff to do when the mouse enters the element */
		$(this).toggleClass('hover');
	});
})



