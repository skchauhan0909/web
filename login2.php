<?php
	$ser="localhost";
    $user="root";
    $pass="";
    $db="mytestdb";
$con = mysqli_connect($ser,$user,$pass,$db) or die("connection failed");
echo"connection successfull";
?>