


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
    <script type="text/javascript" src="confiAlumnos.js"></script>
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
    //echo var_dump($_GET);
    $sql="SELECT a.MATRICULA_A as MATRICULA , a.NOMBRE as NOMBRE , a.APELLIDO_P as APELLIDO_P ,a.APELLIDO_M as APELLIDO_M
    FROM alumnos as a
    WHERE a.CVE_GRUPO = $id";
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
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while($registros = $resultado->fetch_assoc()){
                            $datos=$registros['MATRICULA']."||".
                            $registros['NOMBRE']."||".
                            $registros['APELLIDO_P']."||".
                            $registros['APELLIDO_M'];
                            
                            
                        ?>
                            
                    <tr>
                        <td> <?php echo $registros['NOMBRE'] ?> </td>
                        <td> <?php echo $registros['APELLIDO_P'] ?> </td>
                        <td> <?php echo $registros['APELLIDO_M'] ?> </td>
                        <td> <a  class="btn btn-primary" onclick="editarAlumnos('<?php echo $datos?>')">Editar</a></td>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>