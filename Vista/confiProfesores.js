//---------------------------------------------------
//confiprofesores
$(document).ready(function(){

    $.ajax({
    
    type:'POST',
    url: '../php/Profesores/cargarlistas.php',
    })
    .done(function(listas_rep){
        $('#divisionAcademi').html(listas_rep)
        //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
    })
    .fail(function(){
        alert('hubo un error')
    })

    
    $('#divisionAcademi').on('change',function(){
        var id =$('#divisionAcademi').val()
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
                $('#tabla').load("cargarConfiguracion.php?id="+id)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })
})

//---------------------------------------------------------------------------------

function editar2(datos){
   // alert ("entro");
     $("#contenido").load("actualizarProfesor.php");
    // alert("carga form");
     $(document).ready(function(){
     //  alert("documento cargado");
       d=datos.split('||');
     //  alert(d +"  verificar id");
       $('#id').val(d[0]);
       $('#nombre').val(d[1]);
       $('#ApellidoP').val(d[2]);
       $('#ApellidoM').val(d[3]);
       $('#NombreD').val(d[4]);

     });
    
}

function actualizarProfesor(){
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



 // alert(cadena + "esta es " + id);
    $.ajax({
        type:"POST",
        url:"../php/Profesores/actualizarProfesor.php",
        data:cadena,
        success:function(r){    
            if(r==1){
                alert("Actualizado con exito");
                document.location.reload();
         // $('#contenido').load('colonos2.php');


            }else{
               alert("ha ocurrido un error")

            }
        }
    });

}

function eliminarProfesor(){
    
    id=$('#id').val();
    nombre=$('#nombre').val();
    paterno=$('#ApellidoP').val();
    materno=$('#ApellidoM').val();


    cadena="id="+id+
            "&nombre="+nombre+
            "&paterno="+paterno+
            "&materno="+materno;

            console.log(cadena)

 // alert(cadena + "esta es " + id);
    $.ajax({
        type:"POST",
        url:"../php/Profesores/eliminarProfesor.php",
        data:cadena,
        success:function(r){    
            if(r==1){
                alert("eliminado con exito");
                location.reload();
         // $('#contenido').load('colonos2.php');


            }else{
               alert("ha ocurrido un error")

            }
        }
    });

}
