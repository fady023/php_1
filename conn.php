<?php  


$server_name ="localhost";
$user ="root";
$pass ="";
$db ="test";

$con = mysqli_connect($server_name,$user,$pass,$db) ;

if(!$con){
    die("connection failed <br> " . mysqli_connect_error());
}else{
  //  echo "connected to database successfully <br> ";
}

$error = array();
session_start();
