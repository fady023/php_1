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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student form</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Student directory</p>
                <h1><?php echo isset($update) ? 'Update student' : 'Add a student'; ?></h1>
                <p class="page-subtitle">Add a new record or keep an existing student profile current.</p>
            </div>
            <a class="button secondary" href="./index.php">All students</a>
        </header>

        <section class="panel form-panel">
            <form class="student-form" action="" method="post">
                <div class="field">
                    <label for="user">Full name</label>
                    <input id="user" type="text" name="user" placeholder="Student name" required value="<?php if (isset($update)) {
                                                                                                            echo $nm;
                                                                                                        };   ?>">
                </div>
                <div class="field">
                    <label for="mail">Email address</label>
                    <input id="mail" type="email" name="mail" placeholder="student@example.com" required value="<?php if (isset($update)) {
                                                                                                                    echo $em;
                                                                                                                };   ?>">
                </div>

                <div class="field">
                    <label for="course">Course</label>
                    <select id="course" name="course">
                        <?php
                        $select_course = "select * from course";
                        $run_course = mysqli_query($con, $select_course);
                        foreach ($run_course as $c):
                        ?>
                            <option value="<?php echo $c['id'];  ?>" <?php if (isset($_GET['st_id'])) {
                                                                            if ($c['id'] == $co_id) {
                                                                                echo "selected";
                                                                            }
                                                                        }   ?>><?php echo $c['name'];  ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" name="add"><?php echo isset($update) ? 'Save changes' : 'Add student'; ?></button>
                    <a class="button secondary" href="./index.php">Cancel</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>

<?php

if (isset($_POST['add'])) {
    $name = $_POST['user'];
    $email = $_POST['mail'];
    $c_id = $_POST['course'];

    $check_mail = "select * from students where email='$email'";
    if(isset($update)){
        $check_mail .= "and id != $id";
    }
    $run_check = mysqli_query($con, $check_mail);
    $check_rows = mysqli_num_rows($run_check);

    if ($check_rows > 0) {
        if (isset($update)) {
            $sql = "update students set name='$name' , email='$email' , course_id='$c_id' where id='$id' ";
        } else {
            $sql = "insert into students(name,email,course_id) values('$name','$email','$c_id')";
        }

        $run = mysqli_query($con, $sql);
        if ($run) {
            header("location:index.php");
        }
    } 
    else {
        echo "this email already exists";
    }
}
