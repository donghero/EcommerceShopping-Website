<?php
//include ("conn.php");

$conn = mysqli_connect("localhost:3305","root","1234","dj");

if (!$conn){
    die("Connection failed:".mysqli_connect_error());
}




//UTF-8
//$conn->query("SET NAMES utf8");

//UTF-8
mysqli_set_charset($conn,"UTF8");
