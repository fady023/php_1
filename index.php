<?php
require_once "./conn.php";

/* $sql = "create table students(
id int primary key auto_increment,
name varchar(50),
email varchar(50) unique
)"; */

// $insert_sql = "insert into students(name,email) values('fady','fady@gmail.com'),('sam','sam@gmail.com')";


?>
<html lang="en">
<head>
</head>
<body>
<a href="./add_Student.php">Add student</a>
<?php   

$select_sql = "select * from students";
$run = mysqli_query($con,$select_sql);
foreach($run as $data){
?>


 <ul>
        <li><?php echo $data['id'];  ?></li>
        <li><?php echo $data['name'];  ?></li>
        <li><?php echo $data['email'];  ?></li>

        <li><a href="">update</a></li>
        <li><a href="./delete.php">delete</a></li>
    </ul>
<?php 
}
?>
   
</body>
</html>
