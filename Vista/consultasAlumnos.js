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
                $('#tabla').load("Consultas/consultaAlumno1.php?id="+id)
                //aqui le estoy diciendo que a mi archivo de Profesores2.php que fue el que esta ligado a este js le asigne el valor que obtengo de la listas_rep
            })
            .fail(function(){
                alert('hubo un error al cargar las carreras')
            })
    })


})

function verAsesorias(datos){
    d=datos.split('||');
    //  alert(d +"  verificar id");
 // alert(datos);
    id=(d[0]);
    
    
    
//    $('#contenido').load("Consultas/verConsultasGrupos.php?idGrupo="+idGrupo+"&nombreGrupo="+nombreGrupo+"&idDivision="+idDivision+"&nombreDivision="+nombreDivision);
$('#contenido').load("Consultas/verConsultaAlumnos.php?id="+id);  

}
