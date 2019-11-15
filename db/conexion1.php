<?php
function getConn(){
    $conn = mysqli_connect('localhost','root','','vacaciones');
    if(mysqli_connect_errno($conn))
        echo "Fallo al conectar a mysqli" . mysqli_conect_errno($conn());
        $conn-> set_charset('utf8');
        return $conn;
}