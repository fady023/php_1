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

          <p class="eyebrow"> Welcome <?php if (isset($_SESSION['name'])):  echo $_SESSION['name'];
                                      endif; ?></p>


          <h1>All students</h1>
          <p class="page-subtitle">Browse student records and manage course assignments.</p>
        </div>
        <div class="form-actions">
          <a class="button" href="./add_Student.php">+ Add student</a>
          <a class="button secondary" href="./register.php">Register</a>
        </div>
      </header>
      <?php

      $select_sql = "select *,students.id as stud_id,students.name as stud_nm,course.name as c_name from students join course on students.course_id = course.id order by students.id";
      $run = mysqli_query($con, $select_sql);

      foreach ($run as $data) {
      ?>


        <ul class="student-card panel">
          <li class="student-id"><span>ID</span><?php echo $data['stud_id'];  ?></li>
          <li class="student-name"><span>Student</span><?php echo $data['stud_nm'];  ?></li>
          <li><span>Email</span><?php echo $data['email'];  ?></li>
          <li><span>Course</span><?php echo $data['c_name'];  ?></li>

          <li class="card-actions"><a href="./add_student.php?st_id=<?php echo $data['stud_id'];  ?>">Edit</a>
            <a class="delete-link" href="./index.php?std_id=<?php echo $data['stud_id']; ?>">Delete</a>
          </li>
        </ul>
      <?php
      }
      ?>
        <div class="form-actions">
     <?php  include "footer.php"  ?>
    </div>

    </main>
  

  </body>

  </html>



<?php

} else {


  header("location:login.php");
}
