<?php
global $koneksi;
$servename="localhost";
$username="root";
$password="";
$dbname="crudnative";

$koneksi = mysqli_connect($servename, $username, $password, $dbname);{
    if(!$koneksi){
        die("error connection".mysqli_connect_error());
    }
}

?>