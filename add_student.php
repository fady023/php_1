<?php
include "./conn.php";
$update = false;

if (isset($_SESSION['name'])) {

    if (isset($_GET['st_id'])) {
        $update = true;
        $id = $_GET['st_id'];
        $sql_update_select = "select * from students where id = $id";
        $run_update = mysqli_query($con, $sql_update_select);
        $res = mysqli_fetch_assoc($run_update);
        $nm = $res['name'];
        $em = $res['email'];
        $img = $res['image'];
        $co_id = $res['course_id'];
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header("location:./login.php");
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
                    <h1><?php echo ($update == true) ? 'Update student' : 'Add a student'; ?></h1>
                    <p class="page-subtitle">Add a new record or keep an existing student profile current.</p>
                </div>
                <a class="button secondary" href="./index.php">All students</a>
            </header>

            <section class="panel form-panel">
                <form class="student-form" action="" method="post" enctype="multipart/form-data">

                    <div class="field">
                        <img width="90px" src="<?php echo ($update == true) ? $img : null ?>" alt="">
                    </div>
                    <div class="field">
                        <label for="user">Full name</label>
                        <input id="user" type="text" name="user" placeholder="Student name" required value="<?php if ($update) {
                                                                                                                echo $nm;
                                                                                                            } ?>">
                    </div>
                    <div class="field">
                        <label for="mail">Email address</label>
                        <input id="mail" type="email" name="mail" placeholder="student@example.com" required value="<?php if ($update) {
                                                                                                                        echo $em;
                                                                                                                    };   ?>">
                    </div>

                    <div class="field">
                        <label for="img">Photo</label>
                        <input id="img" type="file" name="img" accept="image/*">
                    </div>

                    <div class="field">
                        <label for="course">Course</label>
                        <select id="course" name="course">
                            <?php
                            $select_course = "select * from course";
                            $run_course = mysqli_query($con, $select_course);
                            foreach ($run_course as $c):
                            ?>
                                <option value="<?php echo $c['id'];  ?>" <?php if ($update) {
                                                                                if ($c['id'] == $co_id) {
                                                                                    echo "selected";
                                                                                }
                                                                            }   ?>><?php echo $c['name'];  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="add"><?php echo $update == true ? 'Save changes' : 'Add student'; ?></button>
                        <a class="button secondary" href="./index.php">Cancel</a>
                    </div>
                </form>
            </section>
            <?php include "footer.php"  ?>
        </main>
    </body>

    </html>

<?php

    if (isset($_POST['add'])) {
        $name = $_POST['user'];
        if (empty($name)) {
            array_push($error, "name is empty");
        };
        $email = $_POST['mail'];
        if (empty($email)) {
            array_push($error, "email is empty");
        };

        $c_id = $_POST['course'];

        $target_Dir = "uploads/";
        $target_file = $target_Dir . basename($_FILES['img']['name']);

        if ($update==true) {
            if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
                if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    array_push($error, "image hasnt been uploaded");
                }
            } else {
                $target_file = $img;
            }
        } else {
            

            if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                 array_push($error, "image hasnt been uploaded 2");
            }else{
                $target_file = 0;
            }
        }



        $check_mail = "select * from students where email='$email'";
        if ($update) {
            $check_mail .= "and id != $id";
        }
        $run_check = mysqli_query($con, $check_mail);
        $check_rows = mysqli_num_rows($run_check);

        if ($check_rows > 0) {

            array_push($error, "this email already exists");
        } else {

            if (empty($error)) {

                if ($update == true) {
                    $sql = "update students set name='$name' , email='$email',image='$target_file' , course_id='$c_id' where id='$id' ";
                } else {
                    $sql = "insert into students(name,email,image,course_id) values('$name','$email',IF('$target_file' != 0 , '$target_file',image),'$c_id')";
                }

                $run = mysqli_query($con, $sql);
                if ($run) {
                    if($update){
                    $_SESSION['msg'] = "Student has been updated " ;

                    }else{
                    $_SESSION['msg'] = "Student has been added " ;

                    }
                    header("location:index.php");
                } else {
                    echo "error " . mysqli_error($con);
                }
            } else {
                foreach ($error as $err) {
                    echo $err . "<BR>";
                }
            }
        }
    }
} else {
    header("location:register.php");
}
