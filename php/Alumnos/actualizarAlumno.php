<?php


require_once('../conexion.php');

function actualizarAlumno(){

    $mysqli= getConn();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno= $_POST['paterno'];
    $apellidoMaterno=$_POST['materno'];


    $sql = "UPDATE `alumnos` SET ";
$sql.= "`NOMBRE`='{$nombre}',";
$sql.= "`APELLIDO_P`='{$apellidoPaterno}',";
$sql.= "`APELLIDO_M`='{$apellidoMaterno}'";
$sql .= "WHERE `MATRICULA_A` = '{$id}'";
$result= $mysqli ->query($sql);
}
echo true;
echo actualizarAlumno();


