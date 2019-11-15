<?php
session_start();

 $id=$_GET['id'];
 $usuario=$_SESSION['usuario'];
 $fecha=date('d-m-y');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Asesorias UT</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="plataforma.js"></script>
    
    
</head>

<body class="container-fluid">

<div class="row justify-content-center">
    <div class="col-4 lateral">
        <h1 class=" text-info text-center" >Bienvenido </h1>

        <h3 class="text-center"><?php echo $_SESSION['nombre'];?> <?php echo $_SESSION['apellidoP'];?>  </h3>
        
        <br>
        <hr>
        <a  onclick="solicitarAsesoria()" class="btn  btn-dark btn-lg btn-block" >Solicitar asesoria</a>
        <hr>
        
        <a onclick="asesoriasEnviadas()" class="btn  btn-dark btn-lg btn-block" >Asesorias Solicitadas</a>
        <hr>

        <a onclick="pendientes()" class="btn  btn-dark btn-lg btn-block" >Solicitudes Recibidas </a>
        <hr>
        <a onclick="buzon()" class="btn  btn-dark btn-lg btn-block" >Registros de Solicitudes Recibidas </a>
        <hr>
        <a href="Salir.php" class="btn  btn-dark btn-lg btn-block" > Salir </a>
        

    </div>

    <div class="col-8 lateralR" id="lateral" >
        <!-- <h1>Prueba Ajax</h1>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem impedit iure porro iste perspiciatis voluptates. Ducimus rem modi fugit dolor voluptatem? Ipsa nesciunt cumque accusantium modi alias perferendis voluptate dolores?</p>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae corporis itaque expedita at sequi id placeat quasi perferendis earum esse saepe totam molestias, accusamus autem tempora cum facere quis illo!</p>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam libero ad necessitatibus odit laudantium, ipsam beatae delectus nulla enim saepe sunt quod quidem accusamus voluptas obcaecati, ea quis! Architecto, debitis!</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, praesentium culpa, dolores corrupti at sed dolor id non nam ratione quia est ducimus harum illo quod deleniti commodi voluptate eveniet?</p> -->
    </div>
</div>

    <input type="hidden" class="form-control" name="inputName" id="id" value="<?php echo $id?>" placeholder="">
    <input type="hidden" class="form-control" name="inputName" id="usuario" value="<?php echo $usuario?>" placeholder="">

</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>