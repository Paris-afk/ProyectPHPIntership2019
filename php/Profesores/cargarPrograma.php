<?php

require_once '../conexion.php';

function getPrograma(){
    
    $mysqli = getConn();
    $id = $_POST['id'];
    $query = "SELECT * FROM  `programafolio` WHERE CVE_DIVA = $id";
    $result = $mysqli -> query($query);
    $videos = '<option value ="0" >Eliga un programa</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $videos .= "<option value ='$row[CVE_PROGRAMA]'>$row[NOMBRE]</option>";
    }

    return $videos;
    
}

echo getPrograma();