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
                $('#tabla').load("Consultas/consultaProfesor1.php?id="+id)
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



  alert(cadena + "esta es " + id);
    $.ajax({
        type:"POST",
        url:"../php/Profesores/actualizarProfesor.php",
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


function verConsultasProfesor(datos){
    d=datos.split('||');
    //  alert(d +"  verificar id");
  //alert(datos);
    id=(d[0]);
    //alert(id);
   $('#contenido').load("Consultas/verConsultasProfesores.php?id="+id);
  
}

function verPDF(datos){
    d=datos.split('||');
    //  alert(d +"  verificar id");
 // alert(datos);
    idAsesoria=(d[0]);
    NombreAsesor=(d[1]);
    bturno=(d[2]);
    bnivel=(d[3]);
    btipo=(d[4]);
    idSolicitante=(d[5]);
    popo=idAsesoria+NombreAsesor+idSolicitante;
    turno=""
    nivel=""
    tipo=""
    if(bturno=0){
       turno="Matutino"
    }else{
       turno="Vespertino"
    }
    if(bnivel=0){
      nivel="TSU"
   }else{
      nivel="Licenciatura"
   }
   if(btipo=0){
      tipo="Dudas en Temas"
   }else{
      tipo="Proyecto o Prototipo"
   }
   popo=idAsesoria+NombreAsesor+idSolicitante+turno+nivel+tipo;
   // alert(popo);
//    $('#contenido').load("Consultas/verPDF.php?id="+id);
 window.open("../pdf/consultaProfesorPDF.php?idAsesoria="+idAsesoria+"&NombreAsesor="+NombreAsesor+"&idSolicitante="+idSolicitante+"&turno="+turno+"&nivel="+nivel+"&tipo="+tipo);
  
}