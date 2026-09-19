<?php
require_once "conn.php";


$sql = "create table students(
id int primary key auto_increment,
name varchar(50),
email varchar(50) unique
)";

$run = mysqli_query($con,$sql);

if($run) {
    echo "table created <br>";
}else{
    echo "error table hasnt been created <br>";
}