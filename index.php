<?php
require_once "./conn.php";


if(isset($_GET['std_id'])){
    $id = $_GET['std_id'];
    $del_sql = "delete from students where id ='$id'";
    $run_del = mysqli_query($con,$del_sql);

    if($run_del) {
      echo "<b style='color:red'>row deleted </br>" ;
    }
}

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

$select_sql = "select students.id,students.name,students.email,course.name as c_name from students join course on students.course_id = course.id ";
$run = mysqli_query($con,$select_sql);

foreach($run as $data){
?>


 <ul>
        <li><?php echo $data['id'];  ?></li>
        <li><?php echo $data['name'];  ?></li>
        <li><?php echo $data['email'];  ?></li>
        <li><?php echo $data['c_name'];  ?></li>

        <li><a href="./add_student.php?st_id=<?php  echo $data['id'];  ?>">update</a></li>
        <li><a href="./index.php?std_id=<?php echo $data['id']; ?>">delete</a></li>
    </ul>
<?php 
}
?>
   
</body>
</html>
