<?php

require_once '../../php/conexion.php';

function getlistaAlumnos(){
    
    $mysqli = getConn();
    $id = $_POST['id'];
    $query = "SELECT * FROM  `alumnos` WHERE CVE_GRUPO = $id";
    $result = $mysqli -> query($query);
    //$videos = '<option value ="0" >Eliga un programa</option>';
    $videos = '<br>' ;
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $videos .= "<input type='checkbox' class='checkItem' name='alumno[]' value ='$row[MATRICULA_A]'>$row[NOMBRE] <br>";
    }

    return $videos;
    
}

echo getlistaAlumnos();