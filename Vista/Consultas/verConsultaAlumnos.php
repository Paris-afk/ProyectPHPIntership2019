


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="consultasProfesores.js"></script>
</head>
<?php

 //   $division= $_POST['id'];
//    echo $division;

try{
    require_once '../../php/conexion.php';
    $mysqli = getConn();
    //$id=$_POST['id'];

  //  $id = $_POST['id'];
    $id=$_GET['id'];
   // echo var_dump($_GET);
    // $sql="SELECT * FROM `asesorias` WHERE asesorias.CVE_TUTOR = $id order by asesorias.FECHA_FIN DESC";
        //   $sql="SELECT CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE ,a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO, a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN ,a.CVE_TUTOR as SOLICITANTE ,  a.TURNO as TURNO, a.NIVEL_A as NIVEL_A ,a.TIPO_A as TIPO_A 
        //  FROM asesorias as a , grupos as g , profesores as p WHERE a.CVE_ASESOR = p.CVE_ASESOR and a.CVE_ASESOR=$id order by a.FECHA_FIN DESC";
        //  $sql="SELECT CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE ,a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO, a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN ,a.CVE_TUTOR as SOLICITANTE ,  a.TURNO as TURNO, a.NIVEL_A as NIVEL_A ,a.TIPO_A as TIPO_A 
        //  FROM asesorias as a , grupos as g , profesores as p , alumnos as alu
        //  WHERE a.CVE_ASESOR = p.CVE_ASESOR and alu.MATRICULA_A=$id and a.CVE_ESTATUS=1 order by a.FECHA_FIN DESC";
        $sql="SELECT CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE ,a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO, a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN ,a.CVE_TUTOR as SOLICITANTE ,  a.TURNO as TURNO, a.NIVEL_A as NIVEL_A ,a.TIPO_A as TIPO_A 
        FROM asesorias as a , grupos as g , profesores as p , alumnos as alu ,alumnoasesoria
        WHERE a.CVE_ASESOR = p.CVE_ASESOR and alu.MATRICULA_A=$id and alumnoasesoria.CVE_FORMATOFOLIO = a.CVE_FORMATOFOLIO and alumnoasesoria.MATRICULA_A = alu.MATRICULA_A  and a.CVE_ESTATUS=1 order by a.FECHA_FIN DESC";


    $resultado = $mysqli->query($sql);
    // $registros = $resultado->fetch_assoc();
    
//    echo("el solicitante es ".$Solicitante);

 
    //$nombreSolicitante=$registro1['NOMBRE'];
}catch (Exception $e){
    
        $error = $e->getMessage();
}


?>
<body class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>Solicitada por</th>
                        <th>realizada por</th>
                        <th>Fecha de solicitud</th>
                        <th>Fecha de asesoria</th>
                        <th>Ver completo</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while($registros = $resultado->fetch_assoc()){
                              $datos=$registros['CVE_FORMATOFOLIO']."||".
                             $registros['NOMBRE']."||".
                             $registros['TURNO']."||".
                             $registros['NIVEL_A']."||".
                             $registros['TIPO_A']."||".
                            $registros['SOLICITANTE'];
                            $Solicitante=$registros['SOLICITANTE'];
                            $sql1="SELECT  CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE
                            FROM profesores as p
                            WHERE CVE_ASESOR = $Solicitante";
                            $resultado1 = $mysqli->query($sql1);
                            $registro1 =$resultado1->fetch_assoc(); 
                        ?>
                            
                    <tr>
                    <td> <?php echo $registro1['NOMBRE'] ?> </td>
                        <td> <?php echo $registros['NOMBRE'] ?> </td>
                        <td> <?php echo $registros['FECHA_INICIO'] ?> </td>
                        <td> <?php echo $registros['FECHA_FIN'] ?> </td>
                        <td> <a  class="btn btn-primary" onclick="verPDF('<?php echo $datos?>')">Ver completo</a></td>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>