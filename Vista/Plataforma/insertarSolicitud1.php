<?php
require_once '../../php/conexion.php';
$mysqli = getConn();
$id=$_POST['id'];//esta es la sesion actual
//echo ("el id es $id &");
$divisionAcademica=$_POST['divisionAcademica'];
//echo("la division academica es $divisionAcademica &");
$carrera=$_POST['carrera'];
//echo("carrera = $carrera &");
$grupo=$_POST['grupo'];
//echo ("gurpo = $grupo &");
$periodo=$_POST['periodo'];
//echo ("periodo = $periodo &");
$tema=$_POST['tema'];
//echo ("tema = $tema &");
$duracion=$_POST['duracion'];
//echo ("duracion = $duracion &");
$fechaFin=$_POST['fechaFin'];
//echo ("fechaFin = $fechaFin &");
$numeroAlumnos=$_POST['numeroAlumnos'];
//echo ("numeroAlumnos = $numeroAlumnos &");
$Vturno=$_POST['Vturno'];
//echo ("Vturno = $Vturno &");
$Vtsu=$_POST['Vtsu'];
//echo ("Vtsu = $Vtsu &");
$Vasesoria=$_POST['Vasesoria'];
//echo ("Vasesoria = $Vasesoria &");
$comentario=$_POST['comentario'];
//echo ("comentario = $comentario &");
$tutor=$_POST['tutor'];
//echo ("tutor = $tutor &");
$horaFinalizacion=$_POST['horaFinalizacion'];
// echo ("horaFinalizacion = $horaFinalizacion ");
date_default_timezone_set('America/Mexico_City');
$fecha=date('y-m-d');

// if($fecha<$fechaFin){
//    echo("la fecha está correcta");
// }else{
//    echo("la fecha no es valida");
// }


$sql="INSERT INTO `asesorias` (`CVE_FORMATOFOLIO`, `CVE_PERIODO`,`CVE_GRUPO`,`CVE_ASESOR`,`CVE_PROGRAMA`,`CVE_DIVA`,`CVE_ESTATUS`,`FECHA_INICIO`,`DURACION`,`DUDAS`,`FECHA_FIN`,`TURNO`,`NIVEL_A`,`TIPO_A`,`RECIBIDA`,`NUMERO_A`,`CVE_TUTOR`,`hora_finalizacion`,`TEMA`) VALUES (NULL,$periodo,$grupo,$tutor,$carrera,$divisionAcademica,2,'$fecha','$duracion','$comentario','$fechaFin',$Vturno,$Vtsu,$Vasesoria,0,'$numeroAlumnos',$id,'$horaFinalizacion','$tema');";
// $resultado = $mysqli->query($sql);
$resultado = $mysqli->query($sql);
   if(isset($_POST['submit'])){

    $sql5="SELECT * FROM `asesorias` WHERE CVE_PERIODO = $periodo and CVE_GRUPO =$grupo and CVE_ASESOR = $tutor and CVE_PROGRAMA = $carrera and CVE_DIVA = $divisionAcademica and CVE_ESTATUS =2 and FECHA_INICIO = '$fecha' and FECHA_FIN = '$fechaFin' and DURACION = '$duracion' and DUDAS = '$comentario' and CVE_TUTOR=$id and hora_finalizacion='$horaFinalizacion' ";
     
      $resultado5 = $mysqli->query($sql5);

      $row=$resultado5->fetch_assoc();

    
      $idAsesoria=$row['CVE_FORMATOFOLIO'];
      ?> <script>
         // alert(<?php echo $idAsesoria ?>)
      </script> <?php
   //   echo ("el id de la inserccion es  $idAsesoria");



   if(isset($_POST['alumn'])){
       foreach($_POST['alumn'] as $alum){
           $sqlx="INSERT INTO `alumnoasesoria` (`CVE_FORMATOFOLIO`, `MATRICULA_A`) VALUES ('$idAsesoria', '$alum')";
           $resultado1 = $mysqli->query($sqlx);
              
       }
       //falta el id de la sesion que es sesionActual hay que modificarlo  
       
      // header("location:../index2.php?id=".$id);
   }
   ?> <script>
         location.href="../index2.php?id="+<?php echo $id  ?> 
         alert("la asesoria fue solicitada con exito");
      </script>
     <?php

   }
  
  ?>