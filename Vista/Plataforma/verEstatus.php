


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
    <script type="text/javascript" src="plataforma.js"></script>
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
    $estatus=$_GET['estatus'];

   // echo var_dump($_GET);
    //echo var_dump($_GET);
//     SELECT a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO,a.CVE_ASESOR as CVE_ASESOR ,a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN, CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as TUTOR , a.RECIBIDA as RECIBIDA
// FROM asesorias as a , profesores as p
// WHERE a.CVE_ASESOR = p.CVE_ASESOR and a.RECIBIDA = 0 and a.CVE_TUTOR =$id and a.CVE_ESTATUS=$estatus;

    $sql="  SELECT a.CVE_FORMATOFOLIO as CVE_FORMATOFOLIO,a.CVE_ASESOR as CVE_ASESOR ,a.FECHA_INICIO as FECHA_INICIO , a.FECHA_FIN as FECHA_FIN, CONCAT(p.NOMBRE,' ',p.APELLIDO_P,' ',p.APELLIDO_M) as TUTOR , a.RECIBIDA as RECIBIDA , a.TURNO as TURNO , a.NIVEL_A as NIVEL_A, a.TIPO_A as TIPO_A , a.RECHAZO as RECHAZO , a.TEMA as TEMA
    FROM asesorias as a , profesores as p
    WHERE a.CVE_ASESOR = p.CVE_ASESOR and a.RECIBIDA = 0 and a.CVE_TUTOR =$id and a.CVE_ESTATUS=$estatus;";
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
                        <th>Solicitada a</th>
                        <th>Fecha Solicitud</th>
                        <th>Fecha Asesoria</th>
                        <th>Tema</th>
                        <!-- <th>Grupo</th>
                        <th>Carrera</th> --> <?php  if($estatus == 3){ ?>
                            
                            <th>MOVITO DE RECHAZO:</th>
                           
                            
                            
                        <?php } ?>
                        <th>Mostrar mas</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while($registros = $resultado->fetch_assoc()){
                            $datos=$registros['CVE_FORMATOFOLIO']."||".
                            $registros['TUTOR']."||".
                             $id."||".
                             
                             $registros['TURNO']."||".
                             $registros['NIVEL_A']."||".
                             
                            // $registros['APELLIDO_P']."||".
                            // $registros['APELLIDO_M']."||".
                            $registros['TIPO_A'];
                            
                            
                        ?>
                            
                    <tr>
                    
                        <td> <?php echo $registros['TUTOR'] ?> </td>
                        <td> <?php echo $registros['FECHA_INICIO'] ?> </td>
                        <td> <?php echo $registros['FECHA_FIN'] ?> </td>
                        <td> <?php echo $registros['TEMA'] ?> </td>
                        
                        
                        <?php  if($estatus == 3){ ?>
                            
                           
                            <td> <?php echo $registros['RECHAZO'] ?> </td>
                            
                            
                        <?php } ?>
                        <td> <a  class="btn btn-primary" onclick="editar('<?php echo $datos?>')">Ver</a></td>
                        
                       
                       
                        <?php }?>
                </tbody>
            </table>
            
        </div>
    </div>
</body>
</html>