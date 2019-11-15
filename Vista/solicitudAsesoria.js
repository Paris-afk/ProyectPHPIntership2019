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

    $.ajax({
    
        type:'POST',
        url: '../php/Ciclos/cargarCiclos.php',
        })
        .done(function(listasCiclos){
            $('#Ciclos').html(listasCiclos)
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

    $('#division_academica').on('change',function(){
        var id =$('#division_academica').val()
      
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id

            type:'POST',
            url: '../php/Profesores/listaProfesor.php',
            data: {'id': id}
            })
            .done(function(lista_Profe){
                $('#listaProfesor').html(lista_Profe)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar la lista de los profesores')
            })
    })
    $('#division_academica').on('change',function(){
        var id =$('#division_academica').val()
      
        $.ajax({
            //aqui le tomando el id de cada division y guardandolo en la variable id

            type:'POST',
            url: '../php/Profesores/listaTutor.php',
            data: {'id': id}
            })
            .done(function(lista_Tutor){
                $('#listaTutor').html(lista_Tutor)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar la lista de los tutores')
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

        type:'POST',
        url: 'Grupos/cargarAlumnos.php',
        data: {'id': id}
        })
        .done(function(lista_alumnos){
            $('#lista_alumnos').html(lista_alumnos)
            //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
        })
        .fail(function(){
            alert('hubo un error al cargar las carreras')
        })
})
$("checkAll").click(function(){
    if($this().is(":checked")){
        $(".checkItem").prop('checked',true);
    }
    else{
        $(".checkItem").prop('checked',false);
    }
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


function generarReporte(){

    var turno = document.getElementsByName("turno");
    var Vturno = 0;
    if(turno[0].checked){
      Vturno = "M";
    }if(turno[1].checked){
       Vturno = "V";
    }
    //valor para enviar Vturno
    //0 = Matutino
    //1 = Vespertino
console.log("el turno es " + Vturno);

//--------------------------
var tsu = document.getElementsByName("tsu");
var Vtsu = 0;
if(tsu[0].checked){
  Vtsu = "TSU";
}if(tsu[1].checked){
   Vtsu = "Lic";
}
//valor para enviar Vtsu
//0 = TSU
//1 = Ingenieria
console.log("el tsu es " + Vtsu);

//--------------------------
var asesoria = document.getElementsByName("asesoria");
var Vasesoria = 0;
if(asesoria[0].checked){
  Vasesoria = "Dudas en temas";
}if(asesoria[1].checked){
   Vasesoria = "Proyecto o prototipo";
}
//valor para enviar asesoria
//0 =Dudas en tema
//1 = Proyecto o prototipo
console.log("el asesoria es " + Vasesoria);

divisionAcademica=$("#division_academica").val();
carrera=$('#carrera').val();
grupo=$('#Grupo').val();
ciclos=$('#Ciclos').val();
tema=$('#Tema').val();
duracion=$('#Duracion').val();
Profesor=$('#listaProfesor').val();
Tutor=$('#listaTutor').val();

cadena="DivisionAcademica="+divisionAcademica+
"&carrera="+carrera+
"&grupo="+grupo+
"&ciclos="+ciclos+
"&tema="+tema+
"&duracion="+duracion+
"&Profesor="+Profesor+
"&Tutor="+Tutor;

console.log(cadena);

console.log(Grupo);
$.ajax({
    type:"POST",
    url:"../pdf/pruebapdf.php",
    data:cadena,
}
)

.done(function(){
    window.location.href = "../pdf/pruebapdf.php?tema="+tema+"&Profesor="+Profesor+"&carrera="+carrera+"&grupo="+grupo+"&ciclos="+ciclos+"&duracion="+duracion+"&Tutor="+Tutor+"&divisionAcademica="+divisionAcademica+"&Vturno="+Vturno+"&Vtsu="+Vtsu+"&Vasesoria="+Vasesoria;

})
;


}

