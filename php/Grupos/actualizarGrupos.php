<?php


require_once('../conexion.php');

//echo var_dump($_POST);
function actualizarG(){

    $mysqli= getConn();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $programa= $_POST['programa'];
    $idprograma= $_POST['idprograma'];


  //  $sql = "UPDATE `grupos` SET ";
//$sql.= "`NOMBRE`='{$nombre}',";
//$sql.= "`CVE_PROGRAMA`='{$programa}'";
//$sql.= "WHERE `CVE_GRUPO` = '{$id}'";
//$result= $mysqli ->query($sql);

$sql =" UPDATE `grupos` SET `NOMBRE` = '{$nombre}' WHERE `CVE_GRUPO` ='{$id}'";
$result= $mysqli ->query($sql);
}
//echo true;
echo actualizarG();


