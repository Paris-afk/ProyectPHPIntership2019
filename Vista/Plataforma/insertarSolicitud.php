<?php

 $divisionAcademica=$_GET['DivisionAcademica'];
 $carrera=$_GET['carrera'];

$grupo=$_GET['grupo'];
 $periodo=$_GET['ciclos'];
 $tema=$_GET['tema'];
 $duracion=$_GET['duracion'];
 $id=$_GET['solicitante']; //esta es la sesion actual
 //echo ("$id");
 $fechaFin=$_GET['fechaFin'];
 $numeroAlumnos=$_GET['numeroAlumnos'];
 $Vturno=$_GET['Vturno'];
 $Vtsu=$_GET['Vtsu'];
 $Vasesoria=$_GET['Vasesoria'];
 $comentario=$_GET['comentario'];
 $tutor=$_GET['Tutor'];
 $horaFinalizacion=$_GET['horaFinalizacion'];

// echo $periodo;
// echo $tutor;
//no olvidar insertar la fecha actual que es donde se genera la asesoria <3

require_once '../../php/conexion.php';

$mysqli = getConn();

// $sql="INSERT INTO `asesorias` (`CVE_FORMATOFOLIO`, `CVE_PERIODO`,`CVE_GRUPO`,`CVE_ASESOR`,`CVE_PROGRAMA`,`CVE_DIVA`,`CVE_ESTATUS`,`FECHA_INICIO`,`DURACION`,`DUDAS`,`FECHA_FIN`,`TURNO`,`NIVEL_A`,`TIPO_A`,`RECIBIDA`,`NUMERO_A`,`CVE_TUTOR`) VALUES (NULL,$periodo,$grupo,$tutor,$carrera,$divisionAcademica,2,NOW(),'$duracion','$comentario','$fechaFin',$Vturno,$Vtsu,$Vasesoria,0,'$numeroAlumnos',$id);";
// $resultado = $mysqli->query($sql);
$sql="SELECT * FROM alumnos WHERE CVE_GRUPO = $grupo";
$resultado = $mysqli->query($sql);

//el '1' en RECIBIDA quiere decir que es la sesion actual quien la solicita 

?>


<!-- 
<script>
alert("solicitud con exito")
header("location:index2.php?id=".$id);
</script> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" >
    $(document).ready(function(){
        $("#checkAll").click(function(){
            if($(this).is(":checked")){
                $(".checkItem").prop('checked',true);
            }else{
                $(".checkItem").prop('checked',false);
            }
        })
    });
    </script>
    <title>Document</title>
</head>
<body class="container">
<form action="insertarSolicitud1.php" method="post">
  <div class="row">
    <div class="col">
                    <input type="checkbox" id="checkAll">Marcar/Desmarcar Todos
        <table class="table">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Grupo</th>
                </tr>
            </thead>
            <tbody>
           <?php while($row=$resultado->fetch_assoc()){ ?>
                    <tr>

                    <td><?php echo $row['MATRICULA_A'] ?></td>
                    <td><?php echo $row['NOMBRE'] ?></td>
                    <td> <input type="checkbox" class="checkItem"  name="alumn[]" value="<?php echo $row['MATRICULA_A']  ?>"></td>
                </tr>
          <?php } ?>
             </tbody>
        </table>
    </div>

    
  </div>
  <div class="row">
  <div class="col">
  <input type="submit" name="submit" value="Confirmar" onclick="return confirm('estas seguro que quieres Solcitiar esta asesoria?')" class="btn btn-danger  btn-lg">
  <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
  <input type="hidden" id="divisionAcademica" name="divisionAcademica" value="<?php echo $divisionAcademica ?>">
 <input type="hidden" id="carrera" name="carrera" value="<?php echo $carrera ?>">
 <input type="hidden" id="grupo" name="grupo" value="<?php echo $grupo ?>">
 <input type="hidden" id="periodo" name="periodo" value="<?php echo $periodo ?>">
 <input type="hidden" id="tema" name="tema" value="<?php echo $tema ?>">
 <input type="hidden" id="duracion" name="duracion" value="<?php echo $duracion ?>">
 <input type="hidden" id="fechaFin" name="fechaFin" value="<?php echo $fechaFin ?>">
 <input type="hidden" id="numeroAlumnos" name="numeroAlumnos" value="<?php echo $numeroAlumnos ?>">
 <input type="hidden" id="Vturno" name="Vturno" value="<?php echo $Vturno ?>">
 <input type="hidden" id="Vtsu" name="Vtsu" value="<?php echo $Vtsu ?>">
 <input type="hidden" id="Vasesoria" name="Vasesoria" value="<?php echo $Vasesoria ?>">
 <input type="hidden" id="comentario" name="comentario" value="<?php echo $comentario ?>">
 <input type="hidden" id="tutor" name="tutor" value="<?php echo $tutor ?>">
 <input type="hidden" id="horaFinalizacion" name="horaFinalizacion" value="<?php echo $horaFinalizacion ?>">
  </div>
  </div>
  
  <?php
  
//   if(isset($_POST['submit'])){
//       if(isset($_POST['alumn'])){
//           foreach($_POST['alumn'] as $alum){
//               $sqlx="DELETE FROM alumnos WHERE MATRICULA_A = $alum";
//               $resultado1 = $mysqli->query($sqlx);
              
//           }
//           header("location:../index2.php?id="+$id);
//           //falta el id de la sesion que es sesionActual hay que modificarlo  
//       }
//   }
  
  ?>
  </form>
</body>
</html>
