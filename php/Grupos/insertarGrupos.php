<?php

//llamando a la db 
require_once('../conexion.php');

function InsertarGrupo(){
    $mysqli = getConn();
    $nombre = $_POST['nombre'];
    $carrera=$_POST['carrera'];

    $query = " INSERT INTO `grupos` (`CVE_GRUPO`,`CVE_PROGRAMA`,`NOMBRE`) VALUES (NULL,'{$carrera}','{$nombre}');";
    $result = $mysqli -> query($query);
    
}
echo true;
echo InsertarGrupo();