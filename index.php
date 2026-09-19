<?php
require_once "./conn.php";


/* $sql = "create table students(
id int primary key auto_increment,
name varchar(50),
email varchar(50) unique
)"; */

$insert_sql = "insert into students(name,email) values('fady','fady@gmail.com'),('sam','sam@gmail.com')";

$run = mysqli_query($con,$insert_sql);

if($run) {
    echo "sql command done <br>";
}else{
    echo "sql command hasnt been done  <br>" . mysqli_error($con);
}