<?php   
include "./conn.php";

if(isset($_GET['st_id'])){
    $update = true;
    $id = $_GET['st_id'] ;
    $sql_update_select = "select * from students where id = $id";
    $run_update = mysqli_query($con,$sql_update_select);
    $res = mysqli_fetch_assoc($run_update);
    $nm = $res['name'];
    $em = $res['email'];
   
}
?>
<html lang="en">
<head>
</head>
<body>

    <form action="" method="post"> 
        <input type="text" name="user" placeholder="username" required  value="<?php if(isset($res)){echo $nm;};   ?>">
        <input type="email" name="mail" placeholder="Email"   required  value="<?php if(isset($res)){echo $em;};   ?>">
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






