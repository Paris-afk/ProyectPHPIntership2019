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

    $('#Grupo').on('change',function(){
        var id =$('#Grupo').val()
        //alert("el valor de la division academica es "+id);
        //cadena = "id="+id;
       // alert(cadena)
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id
            
            
           // type:'POST',
            //url: 'cargarConfiguracion.php',
            //data: cadena,
            })
            .done(function(){
                $('#tabla').load("Alumnos/cargarConfiguracion.php?id="+id)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })


})



function editarAlumnos(datos){
   // alert ("entro");
   console.log(datos)
   $("#contenido").load("Alumnos/actualizarAlumno.php");
   // alert("carga form");
    $(document).ready(function(){
    //  alert("documento cargado");
      d=datos.split('||');
    //  alert(d +"  verificar id");
      $('#id').val(d[0]);
      $('#nombre').val(d[1]);
      $('#ApellidoP').val(d[2]);
      $('#ApellidoM').val(d[3]);
     

    });
}

function actualizarAlumno(){
    //  alert("funcionó");
    //  alert("entra funcion");
      id=$('#id').val();
      nombre=$('#nombre').val();
      paterno=$('#ApellidoP').val();
      materno=$('#ApellidoM').val();
  
  
      cadena="id="+id+
              "&nombre="+nombre+
              "&paterno="+paterno+
              "&materno="+materno;
  
  
    console.log("la cadena es +" +cadena)
    alert(cadena + "esta es " + id);
      $.ajax({
          type:"POST",
          url:"../php/Alumnos/actualizarAlumno.php",
          data:cadena,
          success:function(r){    
              if(r==1){
                  alert("Actualizado con exito");
                  
           // $('#contenido').load('colonos2.php');
  
  
              }else{
                 alert("ha ocurrido un error")
  
              }
          }
      });
  
  }


  function eliminarAlumno(){
    id=$('#id').val();
    nombre=$('#nombre').val();
    paterno=$('#ApellidoP').val();
    materno=$('#ApellidoM').val();

    
    cadena="id="+id+
            "&nombre="+nombre+
            "&paterno="+paterno+
            "&materno="+materno;


  console.log("la cadena es +" +cadena)
  alert(cadena + "esta es " + id);
    $.ajax({
        type:"POST",
        url:"../php/Alumnos/eliminarAlumno.php",
        data:cadena,
        success:function(r){    
            if(r==1){
                alert("Eliminado con exito");
         // $('#contenido').load('colonos2.php');
                

            }else{
               alert("ha ocurrido un error")

            }
        }
    });
  }

