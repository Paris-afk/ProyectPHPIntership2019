<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="confiGrupos.js"></script>
</head>
<?php

  $division = $_GET['id'];
try{
    require_once '../../php/conexion.php';
    $mysqli = getConn();
    
    //$id=$_POST['id'];

  //  $id = $_POST['id'];
    $sql="SELECT g.CVE_GRUPO as CVE_GRUPO ,g.CVE_PROGRAMA as IDPROGRAMA, g.NOMBRE as NOMBRE , f.NOMBRE as PROGRAMA
    FROM GRUPOS as g , programafolio as f WHERE G.CVE_PROGRAMA = f.CVE_PROGRAMA and g.CVE_PROGRAMA = f.CVE_PROGRAMA and f.CVE_DIVA = $division";
    $resultado = $mysqli->query($sql);
   // echo true;
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
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while($registros = $resultado->fetch_assoc()){
                            $datos=$registros['CVE_GRUPO']."||".
                            $registros['NOMBRE']."||".
                            $registros['IDPROGRAMA']."||".
                            $registros['PROGRAMA'];
                            
                            
                        ?>
                            
                    <tr>
                        <td> <?php echo $registros['NOMBRE'] ?> </td>
                        <td> <?php echo $registros['PROGRAMA'] ?> </td>
                        <td> <a class="btn btn-primary" onclick="editarGrupo('<?php echo $datos?>')">Editar</a></td>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>