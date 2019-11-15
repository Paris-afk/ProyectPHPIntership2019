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


    $('#carrera').on('change',function(){
        var id =$('#carrera').val()
      
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id

            type:'POST',
            url: '../php/Grupos/cargarGrupos.php',
            data: {'id': id}
            })
            .done(function(listas_grupos){
                $('#Grupo').html(listas_grupos)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })


})

function insertarAlumno(){
    //alert('entra funcion')   

    
    nombre =$('#nombre').val()
    apellidoPaterno=$('#apellidoPaterno').val()
    apellidoMaterno=$('#apellidoMaterno').val()
    division =$('#division_academica').val()
    carrera = $('#carrera').val()
    grupo =$('#Grupo').val()
    matricula =$('#matricula').val()
   // sexo =$('#sexo').val()
    
   
    cadena="nombre="+nombre+
           "&apellidoPaterno="+apellidoPaterno+
           "&apellidoMaterno="+apellidoMaterno+
           "&division="+division+
           "&carrera="+carrera+
           "&matricula="+matricula+
           "&grupo="+grupo;
          // alert('la cadena es ' + cadena)
          console.log(cadena)
           $.ajax({
               //aqui le tomando el id de cada division y guardandolo en la variable id
   
               type:'POST',
               url: '../php/Alumnos/insertarAlumnos.php',
               data: cadena,
             
               success:function(r){
                   if(r==true){
                     //$('#contenido') //verificar id
                     alert("Alumno registrado");
                     document.location.reload();
                   }else{
                      // $('#contenido').load('moditrabajadoresSA.php');
                       alert ("ha ocurrido un error");
                   }
               }
   
           });
   
   }