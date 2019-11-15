<?php 
require_once '../conexion.php';


function getListasDivisiones(){
    $mysqli = getConn();
    $query = 'SELECT * FROM `divisionacademica`';
    $result = $mysqli->query($query);
    $listas = '<option value = "0">Elige una opción</option>';
    while ($row = $result-> fetch_array(MYSQLI_ASSOC)){
        $listas .= "<option value='$row[CVE_DIVA]'>$row[NOMBRE]</option>";
         
    }
    return $listas;
}

echo getListasDivisiones();
//esto se envia a el .done de la funcion de js que llamo a a cargarlistas.php