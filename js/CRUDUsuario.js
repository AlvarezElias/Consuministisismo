$(document).ready(function(){
	//$(".usuarios").click(eliminar);
    ActualizarGrilla();

});




function BorrarUsuario(id)
    {

       alert($(this).attr('id'));
       $.ajax
            ({
            type: "POST",
            url: "modules/borrarUsuario.php",
            data:({
                    queHacer: "borrar",
                    id:$(this).attr('id')
                 }),
            cache: false,
            dataType: "text",
            success:  function (dato)
                    { 
                        alert(dato);
                        ActualizarGrilla();

                    }
            });

}


function ActualizarGrilla()
    {
            // alert(id);
     $.ajax
          ({
          type: "POST",
          url: "modules/cargarUsuarios.php",          
          cache: false,
          dataType: "text",
          success:  function (dato)
                  { 
                        $('.usuarios').remove();
                        $('.usercontainer').append(dato);
                        $('.eliminar').click(BorrarUsuario);
                  }
          });

    }