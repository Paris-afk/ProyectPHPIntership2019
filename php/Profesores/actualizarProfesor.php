<?php


require_once('../conexion.php');

function actualizarProfesorDB(){

    $mysqli= getConn();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno= $_POST['paterno'];
    $apellidoMaterno=$_POST['materno'];


    $sql = "UPDATE `profesores` SET ";
$sql.= "`NOMBRE`='{$nombre}',";
$sql.= "`APELLIDO_P`='{$apellidoPaterno}',";
$sql.= "`APELLIDO_M`='{$apellidoMaterno}'";
$sql .= "WHERE `CVE_ASESOR` = '{$id}'";
$result= $mysqli ->query($sql);
}
echo true;
echo actualizarProfesorDB();


