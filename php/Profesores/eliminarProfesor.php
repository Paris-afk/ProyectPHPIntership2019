<?php

//llamando a la db 
require_once('../conexion.php');

function eliminarPrf(){
    $mysqli = getConn();
    $id = $_POST['id'];
    

    $query = " DELETE FROM `profesores` WHERE `CVE_ASESOR`=$id;";
    $result = $mysqli -> query($query);
    
}
echo true;
echo eliminarPrf();