<?php
 require_once '../../php/conexion.php';
$Usuario=$_GET["Usuario"];
$Contrasenia=$_GET['Contrasenia'];

//echo $Usuario;
//echo $Contrasenia;   
//echo var_dump($_GET);
session_start();


    // if($Usuario == 'Director' && $Contrasenia='UTTAB2019'){
    //     header("location:../Reportes.php");
    // }

    $mysqli = getConn();
    //$id=$_POST['id'];

  //  $id = $_POST['id'];

    //echo var_dump($_GET);

    


    global $id;

    $sql="SELECT * FROM profesores WHERE USUARIO = '$Usuario' and `PASSWORD` = '$Contrasenia';";
    $resultado = $mysqli->query($sql);
    $filas=mysqli_num_rows($resultado);
    $datos=$resultado->fetch_assoc();
   $id=$datos['CVE_ASESOR'];
    
    
    //echo("putos" .$id);
    if($filas>0){
        echo mysqli_error($mysqli);
  
        $_SESSION['nombre']=$datos['NOMBRE'];
        $_SESSION['apellidoP']=$datos['APELLIDO_P'];
        $_SESSION['apellidoM']=$datos['APELLIDO_M'];
        $_SESSION['usuario']=$Usuario;
        $_SESSION['contrasenia']=$Contrasenia;
        $_SESSION['programa']=$datos['CVE_PROGRAMA'];
        header("location:../index2.php?id=".$id);
      }else{
         ?>
        <script > 
        alert('alguno de sus datos son incorrectos o no existe registro alguno en la base de datos')
        location.href="../Prueba1.php"
        </script>
         <?php
          //header("location:../Prueba1.php");
      }

     
