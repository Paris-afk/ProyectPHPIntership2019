<?php

//llamando a la db 
require_once('../conexion.php');

function eliminarAlumno(){
    $mysqli = getConn();
    $id = $_POST['id'];
    

    $query = " DELETE FROM `alumnos` WHERE `MATRICULA_A`=$id;";
    $result = $mysqli -> query($query);
    
}
echo true;
echo eliminarAlumno();