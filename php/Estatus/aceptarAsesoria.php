<?php


require_once('../conexion.php');

//echo var_dump($_POST);
function actualizarG(){

    $mysqli= getConn();
    $id = $_POST['asesoria'];



  //  $sql = "UPDATE `grupos` SET ";
//$sql.= "`NOMBRE`='{$nombre}',";
//$sql.= "`CVE_PROGRAMA`='{$programa}'";
//$sql.= "WHERE `CVE_GRUPO` = '{$id}'";
//$result= $mysqli ->query($sql);

$sql =" UPDATE `asesorias` SET `CVE_ESTATUS` = 1 WHERE `CVE_FORMATOFOLIO` = $id;";
$result= $mysqli ->query($sql);
}
//echo true;
echo actualizarG();


