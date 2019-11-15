


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

// echo var_dump($_GET);

try{
    require_once '../../php/conexion.php';
    $mysqli = getConn();

    $idGrupo=$_GET['idGrupo'];
   // echo var_dump($_GET);
  
          $sql="SELECT CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as NOMBRE ,a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO, a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN ,a.CVE_TUTOR as SOLICITANTE , a.TURNO as TURNO, a.NIVEL_A as NIVEL_A ,a.TIPO_A as TIPO_A FROM asesorias as a , grupos as g , profesores as p WHERE a.CVE_ASESOR = p.CVE_ASESOR and g.CVE_GRUPO=$idGrupo and a.CVE_ESTATUS=1 order by a.FECHA_FIN DESC";
 


    $resultado = $mysqli->query($sql);
  
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