<?php   
include "./conn.php";
?>
<html lang="en">
<head>
</head>
<body>

    <form action="" method="post"> 
        <input type="text" name="user" placeholder="username" required>
        <input type="email" name="mail" placeholder="Email" required>
        <button type="submit" name="add"> ADD </button>
    </form>
<a href="./index.php">All Students</a>
</body>
</html>

<?php 

if (isset($_POST['add'])){
    $name = $_POST['user'];
    $email = $_POST['mail'];
    $insert_sql = "insert into students(name,email) values('$name','$email')";
    $run = mysqli_query($con,$insert_sql);
    if($run){
        echo "data inserted";
    }
}






