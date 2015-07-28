$(document).ready(function(){
    $("#agregar").click(function(){
        console.log("hiciste click en el boton maestro maestruli");
        
        var txtIngreso = $("#ingresoNuevo");
        if(txtIngreso.val() != ""){
            var rss = {"rssNuevo" : txtIngreso.val()};
            guardarRss(rss);
            
        }
        
    });
});


function guardarRss(rss)
{
    $.ajax({
        url:"modules/generarRss.php",
        data: rss,
        context: document.body
    }).done(function(rssNuevos){
        if(rssNuevos != null)
            $("#main").append(rssNuevos);
    });
};
