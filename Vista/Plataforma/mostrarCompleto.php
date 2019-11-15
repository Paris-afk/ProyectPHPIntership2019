
<?php //echo var_dump($_GET);

//$solicitante=$_GET['id'];
$sesionActual=$_GET['solicitante'];
$tutor=$_GET['tutor'];
$idAsesoria=$_GET['idAsesoria'];
$turno=$_GET['turno'];
$nivel=$_GET['nivel'];
$tipo=$_GET['tipo'];

// SELECT a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO,a.CVE_ASESOR as CVE_ASESOR ,a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN, CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as TUTOR , a.RECIBIDA as RECIBIDA , a.TURNO as TURNO, a.NIVEL_A as NIVEL_A , a.TIPO_A as TIPO_A ,a.NUMERO_A as NUMERO_A ,divi.NOMBRE as DIVINOMBRE,g.NOMBRE
// ,programa.NOMBRE as NOMBREPROGRAMA, a.DUDAS as COMENTARIO
//    FROM asesorias as a , profesores as p , divisionacademica as divi , grupos as g , programafolio as programa
//    WHERE a.CVE_ASESOR = p.CVE_ASESOR and a.RECIBIDA = 0 and a.CVE_TUTOR =2 and a.CVE_ESTATUS=2 and divi.CVE_DIVA = a.CVE_DIVA and g.CVE_GRUPO = a.CVE_GRUPO and programa.CVE_PROGRAMA = a.CVE_PROGRAMA;

require_once '../../php/conexion.php';
$mysqli = getConn();

$sql="  SELECT a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO,a.CVE_ASESOR as CVE_ASESOR ,a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN, CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as TUTOR , a.RECIBIDA as RECIBIDA , a.TURNO as TURNO, a.NIVEL_A as NIVEL_A , a.TIPO_A as TIPO_A ,a.NUMERO_A as NUMERO_A ,divi.NOMBRE as DIVINOMBRE,g.NOMBRE
,programa.NOMBRE as NOMBREPROGRAMA, a.DUDAS as COMENTARIO,a.CVE_TUTOR as SOLICITANTE
   FROM asesorias as a , profesores as p , divisionacademica as divi , grupos as g , programafolio as programa
   WHERE a.CVE_ASESOR = p.CVE_ASESOR and a.RECIBIDA = 0   and divi.CVE_DIVA = a.CVE_DIVA and g.CVE_GRUPO = a.CVE_GRUPO and programa.CVE_PROGRAMA = a.CVE_PROGRAMA and a.CVE_FORMATOFOLIO =$idAsesoria;";
$resultado = $mysqli->query($sql);
$registros = $resultado->fetch_assoc();

//echo $registros['FECHA_INICIO'];

 $solicitante=$registros['SOLICITANTE'];


 $sql1="SELECT CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE
 FROM profesores as p
 WHERE p.CVE_ASESOR = $solicitante;";
 $resultado1 = $mysqli->query($sql1);
 $registros1 = $resultado1->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    </head>

<body class="container">
    <div class="row">
        <div class="col">
        <h4>Enviado por :  <?php echo $registros1['NOMBRE']; ?> </h4>
        <h4>Para: <?php echo $tutor ?> </h4>
        <hr>


        </div>
    </div>


    <div class="row justify-content-around">
        <div class="col">
        <h5>Fecha de solicitud : <?php echo $registros['FECHA_INICIO']; ?></h5>
        </div>
        <div class="col">
        <h5>Fecha de Asesoria : <?php echo $registros['FECHA_FIN']; ?></h5>
        <br><br>
        </div>
    </div>
 

    <div class="row justify-content-center">

        <div class="col-12">
        <h3 class="text-center">Asunto : Asesoria</h3>
        <hr>
        <br>
        <br>
        
        </div>
        <div class="col-6">
        
        
        <h4>Division Academica: <?php echo $registros['DIVINOMBRE']; ?></h4>
        <h1 id="fecha"></h1>
        <h4>Grupo:<?php echo $registros['NOMBRE']; ?></h4>
        </div>

        <div class="col-6">
        <h4>Carrera: <?php echo $registros['NOMBREPROGRAMA']; ?></h4>
        </div>
<hr>
<div class="col-6">
        <!-- <h4>Numero Alumnos: <?php echo $registros['NUMERO_A']; ?></h4> -->
        </div>
        <hr>

        <div class="col-12">
        <hr>
        <h4>Comentario:</h4>
        <h5><?php echo $registros['COMENTARIO']; ?></h5>
        <hr>
        </div>
   

    </div>

    <div class="w-100"></div>
    <br>
    <br><br>
    <div class="row justify-content-between">
    <hr>
    <div class="col">
        <h5>Turno:<?php echo $turno ?></h5>
    </div>

    <div class="col">
        <h5>Nivel Academico:<?php echo $nivel?></h5>
    </div>

    <div class="col">
        <h5>Tipo de aesoria:<?php echo $tipo ?></h5>
    </div>
    </div>

</body>
</html>