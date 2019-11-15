<?php

require_once '../conexion.php';

function getGrupos(){
    
    $mysqli = getConn();
    $id = $_POST['id'];
    $query = "SELECT * FROM  `grupos` WHERE CVE_PROGRAMA = $id";
    $result = $mysqli -> query($query);
    $grupos = '<option value ="0" >Eliga una carrera y division</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $grupos .= "<option value ='$row[CVE_GRUPO]'>$row[NOMBRE]</option>";
    }

    return $grupos;
    
}

echo getGrupos();