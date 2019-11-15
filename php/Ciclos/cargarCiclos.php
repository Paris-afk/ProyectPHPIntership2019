<?php

require_once '../conexion.php';

function getCiclos(){
    
    $mysqli = getConn();

    $query = "SELECT * FROM  `periodos` ";
    $result = $mysqli -> query($query);
    $videos = '<option value ="0" >Eliga un programa</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $videos .= "<option value ='$row[CVE_PERIODO]'>$row[NOMBRE]</option>";
    }

    return $videos;
    
}

echo getCiclos();