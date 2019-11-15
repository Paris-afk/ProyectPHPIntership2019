<?php

$conn = new mysqli('localhost','root','','vacaciones');

if($conn->connect_error){
    echo $error = $conn->$connect_error;

}

?>

