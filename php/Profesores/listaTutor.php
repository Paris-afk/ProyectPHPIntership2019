<?php

require_once '../conexion.php';

function getlistaTutor(){
    
    $mysqli = getConn();
    $id = $_POST['id'];
    $query = "SELECT p.CVE_ASESOR as CVE_ASESOR , p.NOMBRE as NOMBRE , p.APELLIDO_P as APELLIDO_P , p.APELLIDO_M as APELLIDO_M,f.NOMBRE  as NOMBRED 
    FROM profesores as p , programafolio as f WHERE p.CVE_PROGRAMA = f.CVE_PROGRAMA and f.CVE_DIVA = $id "; //and p.TUTOR=0
    $result = $mysqli -> query($query);
    $videos = '<option value ="0" >Eliga un programa</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $videos .= "<option value ='$row[CVE_ASESOR]'>$row[NOMBRE]</option>";
    }

    return $videos;
    
}

echo getlistaTutor();