
//insertarProfesores
$(document).ready(function(){

    $.ajax({
    
    type:'POST',
    url: '../php/Profesores/cargarlistas.php',
    })
    .done(function(listas_rep){
        $('#division_academica').html(listas_rep)
        //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
    })
    .fail(function(){
        alert('hubo un error')
    })

    $('#division_academica').on('change',function(){
        var id =$('#division_academica').val()
      
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id

            type:'POST',
            url: '../php/Profesores/cargarPrograma.php',
            data: {'id': id}
            })
            .done(function(listas_programas){
                $('#carrera').html(listas_programas)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })
})




function insertarProfesor(){
 //alert('entra funcion')   

//  var sexo = document.getElementsByName("sexo");
//  var tutor = 0;
//  if(sexo[0].checked){
//    tutor = 0;
//  }if(sexo[1].checked){
//     tutor = 1;
//  }

 nombre =$('#nombre').val()
 apellidoPaterno=$('#apellidoPaterno').val()
 apellidoMaterno=$('#apellidoMaterno').val()
 division =$('#division_academica').val()
 carrera = $('#carrera').val()
 usuario = $('#usuario').val()
 contrasenia = $('#contrasenia').val()
// sexo =$('#sexo').val()
 

 cadena="nombre="+nombre+
        "&apellidoPaterno="+apellidoPaterno+
        "&apellidoMaterno="+apellidoMaterno+
        "&division="+division+
        "&usuario="+usuario+
        "&contrasenia="+contrasenia+
        "&carrera="+carrera;
        // "&tutor="+tutor;
       // alert('la cadena es ' + cadena)
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id

            type:'POST',
            url: '../php/Profesores/insertarProfesor.php',
            data: cadena,
          
            success:function(r){
                if(r==true){
                  //$('#contenido') //verificar id
                  alert("Actualizado con exito");
                  document.location.reload();
                }else{
                   // $('#contenido').load('moditrabajadoresSA.php');
                    alert ("ha ocurrido un error");
                }
            }

        });

}
