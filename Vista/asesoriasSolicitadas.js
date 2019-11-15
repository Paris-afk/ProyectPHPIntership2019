$(document).ready(function(){

    $.ajax({
    
    type:'POST',
    url: '../php/Estatus/cargarEstatus.php',
    })
    .done(function(listas_rep){
        $('#estatus').html(listas_rep)
        //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
    })
    .fail(function(){
        alert('hubo un error')
    })



    $('#estatus').on('change',function(){
        var estatus =$('#estatus').val()
        var id=$('#id').val()
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id
            
            
           // type:'POST',
            //url: 'cargarConfiguracion.php',
            //data: cadena,
            })
            .done(function(){
                $('#tabla').load("Plataforma/verEstatus.php?id="+id+"&estatus="+estatus)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las listas del Estatus')
            })
    })

})