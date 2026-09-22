<?php
include "./conn.php";

if (isset($_GET['st_id'])) {
    $update = true;
    $id = $_GET['st_id'];
    $sql_update_select = "select * from students where id = $id";
    $run_update = mysqli_query($con, $sql_update_select);
    $res = mysqli_fetch_assoc($run_update);
    $nm = $res['name'];
    $em = $res['email'];
    $co_id = $res['course_id'];
}
?>
<html lang="en">

<head>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="user" placeholder="username" required value="<?php if (isset($update)) {
                                                                                    echo $nm;
                                                                                };   ?>">
        <input type="email" name="mail" placeholder="Email" required value="<?php if (isset($update)) {
                                                                                echo $em;
                                                                            };   ?>">

        <select name="course">
            <?php
            $select_course = "select * from course";
            $run_course = mysqli_query($con, $select_course);
            foreach ($run_course as $c):
            ?>
                <option value="<?php echo $c['id'];  ?>" <?php if(isset($_GET['st_id'])){if($c['id']==$co_id){echo "selected";}}   ?>><?php echo $c['name'];  ?></option>
            <?php endforeach; ?>

        </select>

        <button type="submit" name="add"> ADD </button>
    </form>
    <a href="./index.php">All Students</a><br>
</body>

</html>

<?php

if (isset($_POST['add'])) {
    $name = $_POST['user'];
    $email = $_POST['mail'];
    $c_id = $_POST['course'];
    if($update) {
$sql = "update students set name='$name' , email='$email' , course_id='$c_id' where id='$id' ";
    }else{
    $sql = "insert into students(name,email,course_id) values('$name','$email','$c_id')";

    }
    $run = mysqli_query($con, $sql);
    if ($run) {
        header("location:./index.php");
    }
}
