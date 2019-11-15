<?php

//llamando a la db 
require_once('../conexion.php');

function InsertarProfesor(){
    $mysqli = getConn();
    $nombre = $_POST['nombre'];
    $apellidoPaterno= $_POST['apellidoPaterno'];
    $apellidoMaterno=$_POST['apellidoMaterno'];
    // $tutor=$_POST['tutor'];
    $carrera=$_POST['carrera'];
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['contrasenia'];

    $query = " INSERT INTO `profesores` (`CVE_ASESOR`,`CVE_PROGRAMA`,`NOMBRE`,`APELLIDO_P`,`APELLIDO_M`,`USUARIO`,`PASSWORD`) VALUES (NULL,'{$carrera}','{$nombre}','{$apellidoPaterno}','{$apellidoMaterno}','{$usuario}','{$contrasenia}');";
    $result = $mysqli -> query($query);
    
}
echo true;
echo InsertarProfesor();