


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
    <script type="text/javascript" src="confiProfesores.js"></script>
</head>
<?php

 //   $division= $_POST['id'];
//    echo $division;
try{
    require_once '../php/conexion.php';
    $mysqli = getConn();
    //$id=$_POST['id'];

  //  $id = $_POST['id'];
    $id=$_GET['id'];
    //echo var_dump($_GET);
    $sql="SELECT p.CVE_ASESOR as CVE_ASESOR , p.NOMBRE as NOMBRE , p.APELLIDO_P as APELLIDO_P , p.APELLIDO_M as APELLIDO_M,f.NOMBRE  as NOMBRED 
    FROM profesores as p , programafolio as f WHERE p.CVE_PROGRAMA = f.CVE_PROGRAMA and f.CVE_DIVA = $id";
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
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Carrera</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while($registros = $resultado->fetch_assoc()){
                            $datos=$registros['CVE_ASESOR']."||".
                            $registros['NOMBRE']."||".
                            $registros['APELLIDO_P']."||".
                            $registros['APELLIDO_M']."||".
                            $registros['NOMBRED'];
                            
                            
                        ?>
                            
                    <tr>
                        <td> <?php echo $registros['NOMBRE'] ?> </td>
                        <td> <?php echo $registros['APELLIDO_P'] ?> </td>
                        <td> <?php echo $registros['APELLIDO_M'] ?> </td>
                        <td> <?php echo $registros['NOMBRED'] ?> </td>
                        <td> <a  class="btn btn-primary" onclick="editar2('<?php echo $datos?>')">Editar</a></td>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>