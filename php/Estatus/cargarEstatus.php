<?php 
require_once '../conexion.php';


function getListaEstatus(){
    $mysqli = getConn();
    $query = 'SELECT * FROM `estatus`';
    $result = $mysqli->query($query);
    $listas = '<option value = "0">Elige una opción</option>';
    while ($row = $result-> fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[CVE_ESTATUS]'>$row[NOMBRE]</option>";
         
    }
    return $listas;
}

echo getListaEstatus();