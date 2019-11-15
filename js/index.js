$(document).ready(function(){
    alert('prueba')
    $.ajax({

    type:'POST',
    url: 'php/cargar_listas.php',
    data:{'peticion' : 'cargar_listas'}
    })
    .done(function(listas_rep){

    })
    .fail(function(){
        alert('hubo un error')
    })
})