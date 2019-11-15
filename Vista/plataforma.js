function validar(){
   
   // var Usuario = document.getElementsByName('usuario')
    Usuario =$('#usuario').val();
    Contrasenia=$('#contrasenia').val();
    console.log('el usuario es '+ Usuario + 'la contrasenia es ' + Contrasenia);
    
    if(Usuario =='' || Contrasenia == ''){
        alert('hay campos vacios por favor , rellene todos los campos' )
        return false ;
    }
    
    if(Usuario=='Director'  && Contrasenia=='UTTAB2019'){
      location.href="Reportes.php";
    }
    else{
       location.href="Plataforma/validacion.php?Usuario="+Usuario+"&Contrasenia="+Contrasenia;
        
    }

}

function solicitarAsesoria(){
  var id =$('#id').val()
  var usuario =$('#usuario').val()
    $('#lateral').load("Plataforma/solicitarAsesoria.php?id="+id+"&usuario="+usuario);
}

//esta es la que hay que usar en el otro boton
function buzon(){
   var id =$('#id').val()
   var usuario =$('#usuario').val()
     $('#lateral').load("Plataforma/solicitudes.php?id="+id+"&usuario="+usuario);
 }

 function pendientes(){
   var id =$('#id').val()
   var usuario =$('#usuario').val()
     $('#lateral').load("Plataforma/verPendientes.php?id="+id+"&usuario="+usuario);
 }

function generarSolicitud(){

    
    var turno = document.getElementsByName("turno");
    var Vturno = 5;
    if(turno[0].checked){
      Vturno = 0;
    }if(turno[1].checked){
       Vturno = 1;
    }
    //valor para enviar Vturno
    //0 = Matutino
    //1 = Vespertino
//console.log("el turno es " + Vturno);

//--------------------------
var tsu = document.getElementsByName("tsu");
var Vtsu = 5;
if(tsu[0].checked){
  Vtsu = 0;
}if(tsu[1].checked){
   Vtsu = 1;
}
//valor para enviar Vtsu
//0 = TSU
//1 = Ingenieria
//console.log("el tsu es " + Vtsu);

//--------------------------
var asesoria = document.getElementsByName("asesoria");
var Vasesoria = 5;
if(asesoria[0].checked){
  Vasesoria = 0;
}if(asesoria[1].checked){
   Vasesoria = 1;
}
//valor para enviar asesoria
//0 =Dudas en tema
//1 = Proyecto o prototipo
//console.log("el asesoria es " + Vasesoria);
fechaFin="",horaFinalizacion="";

divisionAcademica=$("#division_academica").val();
carrera=$('#carrera').val();
grupo=$('#Grupo').val();
ciclos=$('#Ciclos').val();
tema=$('#Tema').val();
duracion=$('#Duracion').val();
//Profesor=$('#listaProfesor').val();
tutor=$('#listaTutor').val();
solicitante=$('#id').val();
fechaFin=$('#fechaFinalizacion').val();
// numeroAlumnos=$('#numeroAlumnos').val();
numeroAlumnos=0;
comentario=$('#comentario').val();
horaFinalizacion=$('#horaFinalizacion').val();
hoy = new Date();
pasada= new Date(fechaFin);
//alert(fechaFinalizacion)
//alert(horaFinalizacion);
//alert(pasada)
//alert(hoy);
//alert("la sesion actual es :"+solicitante +"el id profesor es :" + tutor);
//alert(ciclos);
if(pasada<hoy){
   alert("Por favor verifique que la fecha de la asesoria sea mayor al dia de hoy");
   return false;
}

if(tutor==solicitante){
   alert("Por favor seleccione otro profesor que no sea usted mismo");
   return false;
}

if(comentario=='' || tema==="" || duracion==="" || Vtsu ==5 || Vturno==5 || Vasesoria==5 || ciclos==0 || divisionAcademica==0 || carrera==0 || grupo==0 || fechaFin=="" || horaFinalizacion=="" || tutor==0){
   alert("todos los campos deben estar rellenados");
   return false;
}



cadena="DivisionAcademica="+divisionAcademica+
"&carrera="+carrera+
"&grupo="+grupo+
"&ciclos="+ciclos+
"&tema="+tema+
"&duracion="+duracion+
"&solicitante="+solicitante+
"&fechaFin="+fechaFin+
"&numeroAlumnos="+numeroAlumnos+
"&Vturno="+Vturno+
"&Vtsu="+Vtsu+
"&Vasesoria="+Vasesoria+
"&comentario="+comentario+
"&Tutor="+tutor;
// "&Profesor="+Profesor+

console.log(cadena);

//console.log(Grupo);
 $.ajax({
     type:"POST",
     url:"Plataforma/insertarSolicitud.php",
    // data:cadena,
 }
 )

 .done(function(){
     window.location.href = "Plataforma/insertarSolicitud.php?DivisionAcademica="+divisionAcademica+
     "&carrera="+carrera+
     "&grupo="+grupo+
     "&ciclos="+ciclos+
     "&tema="+tema+
     "&duracion="+duracion+
     "&solicitante="+solicitante+
     "&fechaFin="+fechaFin+
     "&numeroAlumnos="+numeroAlumnos+
     "&Vturno="+Vturno+
     "&Vtsu="+Vtsu+
     "&Vasesoria="+Vasesoria+
     "&comentario="+comentario+
     "&horaFinalizacion="+horaFinalizacion+
     "&Tutor="+tutor;

 })
 ;


}

 function asesoriasEnviadas(){
    var id =$('#id').val()
    var usuario =$('#usuario').val()
      $('#lateral').load("Plataforma/asesoriasSolicitadas.php?id="+id+"&usuario="+usuario);
  }


  function editar(datos){
   // alert ("entro");
     
     
    // alert("carga form");
     $(document).ready(function(){
     //  alert("documento cargado");
       d=datos.split('||');
     //  alert(d +"  verificar id");
      
       idAsesoria=(d[0]);
       tutor=(d[1]);
       solicitante=(d[2]);
       bturno=(d[3]);
       bnivel=(d[4]);
       btipo=(d[5]);
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
       
       
       /*alert (turno)*/
       window.open("Plataforma/mostrarCompleto.php?idAsesoria="+idAsesoria+"&tutor="+tutor+"&solicitante="+solicitante+"&turno="+turno+"&nivel="+nivel+"&tipo="+tipo);
     });
    
}

function rechazarAsesoria(){
   
   asesoria=$('#asesoria').val();
   rechazo=$('#motivoRechazo').val();
  // alert(rechazo);
  // alert(asesoria);
   //falta enviar el id del programa , solo estas enviando el texto
   cadena="asesoria="+asesoria+"&rechazo="+rechazo;



 //alert(cadena + "esta es " + programa);
 console.log(cadena);
 
   $.ajax({
       type:"POST",
       url:"../php/Estatus/rechazarAsesoria.php",
       data:cadena,
       success:function(r){    
           if(r==true){
               alert("Asesoria rechazada con exito");
               location.reload();
        // $('#contenido').load('colonos2.php');


           }else{
               alert("Asesoria rechazada con exito");
               location.reload();

           }
       }
   });
}

function aceptarAsesoria(){
   
   asesoria=$('#asesoria').val();

   //alert(asesoria);
   //falta enviar el id del programa , solo estas enviando el texto
   cadena="asesoria="+asesoria;



 //alert(cadena + "esta es " + programa);
 console.log(cadena);
 
   $.ajax({
       type:"POST",
       url:"../php/Estatus/aceptarAsesoria.php",
       data:cadena,
       success:function(r){    
           if(r==true){
               alert("Asesoria aceptada con exito");
               location.reload();
        // $('#contenido').load('colonos2.php');


           }else{
               alert("Asesoria aceptada con exito");
               location.reload();

           }
       }
   });
}

