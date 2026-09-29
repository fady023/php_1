<?php
require_once "./conn.php";

if (isset($_SESSION['name'])) {


  if (isset($_GET['std_id'])) {
    $id = $_GET['std_id'];
    $del_sql = "delete from students where id ='$id'";
    $run_del = mysqli_query($con, $del_sql);

    if ($run_del) {
      echo "<b style='color:red'>row deleted </b> </br>";
    }
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    header("location:register.php");
  }



  /* $sql = "create table students(
id int primary key auto_increment,
name varchar(50),
email varchar(50) unique
)"; */

  // $insert_sql = "insert into students(name,email) values('fady','fady@gmail.com'),('sam','sam@gmail.com')";

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student directory</title>
    <link rel="stylesheet" href="./styles.css">
  </head>

  <body>
    <main class="page-shell">
      <header class="page-header">
        <div>
          <section class="panel form-panel" style="width: 90%;">

            <form class="student-form" action="" method="post">
              <div class="field">
                <label for="user">search : </label>
                <input type="text" id="user" placeholder="name" name="search_name">
                <button type="submit" name="search">Search</button>
              </div>
            </form>
          </section>

          <p class="eyebrow"> Welcome <?php if (isset($_SESSION['name'])):  echo $_SESSION['name'];
                                      endif; ?></p>
          <h2 class="panel "><?php if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                              }  ?></h2>

          <h1>All students</h1>

        </div>
        <div class="form-actions">
          <a class="button" href="./add_Student.php">+ Add Student</a>
          <a class="button" href="./addcourse.php">+ Add Course</a>
          <a class="button" href="./show_courses.php">+ Show All Courses</a>
          <a class="button secondary" href="./register.php">Register</a>
        </div>
      </header>
      <?php

      if (isset($_POST['search'])) {

        $student_names = $_POST['search_name'];

        $sql = "select *, students.id as stud_id,students.name as stud_nm,course.name as c_name 
             from students 
                join course
                   on students.course_id = course.id
                     where students.name like '%$student_names%' ";
      } else {

        $sql = "select *,students.id as stud_id,students.name as stud_nm,course.name as c_name from students 
                join course on students.course_id = course.id order by students.id";
      }


      $run = mysqli_query($con, $sql);

      foreach ($run as $data) {
      ?>


        <ul class="student-card panel">
          <li class="student-id"><span>ID</span><?php echo $data['stud_id'];  ?></li>
          <li class="student-name"><span>Student</span><?php echo $data['stud_nm'];  ?></li>
          <li><span>Email</span><?php echo $data['email'];  ?></li>
          <li><span>Course</span><?php echo $data['c_name'];  ?></li>
          <li class="student-image"><img src="<?php echo $data['image'];  ?>"></li>

          <li class="card-actions"><a class="edit-link" href="./add_student.php?st_id=<?php echo $data['stud_id'];  ?>">Edit</a>
            <a class="delete-link" href="./index.php?std_id=<?php echo $data['stud_id']; ?>">Delete</a>
          </li>
        </ul>
      <?php
      }
      ?>
      <div class="form-actions">
        <?php include "footer.php"  ?>
      </div>

    </main>


  </body>

  </html>



<?php

} else {


  header("location:login.php");
}
