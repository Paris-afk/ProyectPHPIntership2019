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
                $('#table').load("Consultas/consultaGrupo1.php?id=" + id)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })
})

//---------------------------------------------------------------------------------



function verAsesorias(datos){
    d=datos.split('||');
    //  alert(d +"  verificar id");
 // alert(datos);
    idGrupo=(d[0]);
    nombreGrupo=(d[1]);
    idDivision=(d[2]);
    
    
//    $('#contenido').load("Consultas/verConsultasGrupos.php?idGrupo="+idGrupo+"&nombreGrupo="+nombreGrupo+"&idDivision="+idDivision+"&nombreDivision="+nombreDivision);
$('#contenido').load("Consultas/verConsultasGrupos.php?idGrupo="+idGrupo+"&nombreGrupo="+nombreGrupo+"&idDivision="+idDivision);  

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
  //  alert(popo);
//    $('#contenido').load("Consultas/verPDF.php?id="+id);
 window.open("../pdf/consultaProfesorPDF.php?idAsesoria="+idAsesoria+"&NombreAsesor="+NombreAsesor+"&idSolicitante="+idSolicitante+"&turno="+turno+"&nivel="+nivel+"&tipo="+tipo);
  
}