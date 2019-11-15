<?php
function getConn(){
    $mysqli = mysqli_connect('localhost','root','','vacaciones');
    if(mysqli_connect_errno($mysqli))
        echo "Fallo al conectar a mysqli" . mysqli_conect_errno($mysqli());
        $mysqli-> set_charset('utf8');
        return $mysqli;
}