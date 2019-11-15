<?php 
require_once '../conexion.php';


function getListasDivi(){
    $mysqli = getConn();
    $query = 'SELECT * FROM `divisionacademica`';
    $result = $mysqli->query($query);
    $listas = '<option value = "0">Elige una opción</option>';
    while ($row = $result-> fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[CVE_DIVA]'>$row[NOMBRE]</option>";
         
    }
    return $listas;
}

echo getListasDivi();