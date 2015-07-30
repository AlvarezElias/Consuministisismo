$(document).ready(function(){
	//$(".usuarios").click(eliminar);

	// fade out effect first
    $('#load-product').click( function(){

      	$('#page-content').fadeOut('slow', function(){
    	    $('#page-content').load('modules/generarRss.php', function(){ 
                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
    });

    $('#agregar').click(function(){
    	var nuevo = $('#ingresoNuevo').val();

    	if(nuevo != '' || nuevo != null)
    	{
    		$.ajax();
    	} 
    });


});



/*
chartCPU = new Highcharts.StockChart({
    chart: {
        renderTo: 'contenedor'
        //defaultSeriesType: 'spline'
 
    },
    rangeSelector : {
        enabled: false
    },
    title: {
        text: 'Gráfica'
    },
    xAxis: {
        type: 'datetime'
        //tickPixelInterval: 150,
        //maxZoom: 20 * 1000
    },
    yAxis: {
        minPadding: 0.2,
        maxPadding: 0.2,
        title: {
            text: 'Valores',
            margin: 10
        }
    },
    series: [{
        name: 'Valor',
        data: (function() {
                // generate an array of random data
                var data = [];
                <?php
                    for($i = 0 ;$i<count($usuarios);$i++){
                ?>
                data.push([<?php echo $usuarios['id'];?>,<?php echo $usuarios['name'];?>]);
                <?php } ?>
                return data;
            })()
    }],
    credits: {
            enabled: false
    }
});
*/



