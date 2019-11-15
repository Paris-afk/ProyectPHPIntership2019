//---------------------------------------------------
//confiprofesores
$(document).ready(function(){

    $.ajax({
    
    type:'POST',
    url: '../php/Grupos/cargarlistas.php',
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
    //  alert("el id es +"+id);
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id
            //url: `Grupos/cargarConfiguracion.php`,
           // data: id,
          //  dataType: "html"
            })
            .done(function(){
                $('#table').load("Grupos/cargarConfiguracion.php?id=" + id)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })
})

//---------------------------------------------------------------------------------

function editarGrupo(datos){
   // alert ("entro");
     $("#contenido").load("Grupos/actualizarGrupos.php");
     //alert("carga form");
     $(document).ready(function(){
       //alert("documento cargado");
       d=datos.split('||');
      // alert(d +"  verificar id");
       $('#id').val(d[0]);
       $('#nombre').val(d[1]);
       $('#idprograma').val(d[2]);
       $('#programa').val(d[3]);
     });
    
}

function actualizarGrupos(){
    //alert("funcionó");
    //alert("entra funcion");
    id=$('#id').val();
    nombre=$('#nombre').val();
    programa=$('#programa').val();
    idprograma=$('#idprograma').val();

    //falta enviar el id del programa , solo estas enviando el texto
    cadena="id="+id+
            "&nombre="+nombre+
            "&idprograma="+idprograma+
            "&programa="+programa;



  //alert(cadena + "esta es " + programa);
  console.log(cadena);
  
    $.ajax({
        type:"POST",
        url:"../php/Grupos/actualizarGrupos.php",
        data:cadena,
        success:function(r){    
            if(r==true){
                alert("Actualizado con exito");
                document.location.reload();
         // $('#contenido').load('colonos2.php');


            }else{
                alert("Actualizado con exito");
               location.reload();

            }
        }
    });

}


function eliminarGrupos(){
    id=$('#id').val();
    nombre=$('#nombre').val();
    programa=$('#programa').val();
    idprograma=$('#idprograma').val();

    //falta enviar el id del programa , solo estas enviando el texto
    cadena="id="+id+
            "&nombre="+nombre+
            "&idprograma="+idprograma+
            "&programa="+programa;



  //alert(cadena + "esta es " + programa);
  //console.log(cadena);
  
    $.ajax({
        type:"POST",
        url:"../php/Grupos/eliminarGrupos.php",
        data:cadena,
        success:function(r){    
            if(r==true){
                alert("Eliminado con exito");
                location.reload();
         // $('#contenido').load('colonos2.php');


            }else{
                alert("Ha ocurrido un error, lo sentimos");
               location.reload();

            }
        }
    });
}
