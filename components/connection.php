<?php
$host='127.0.0.1:3306';
$user='ports';
$pass= '1234';
$bd='portsproject';
$conn=mysqli_connect($host,$user,$pass,$bd) or die(mysqli_error($con));

function conexion(){
    $host='127.0.0.1:3306';
    $user='ports';
    $pass= '1234';
    $bd='portsproject';
    $conn=mysqli_connect($host,$user,$pass,$bd);
    return $conn;
}
?>