<?php     
include "conn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Course catalog</p>
                <h1>Add a course</h1>
                <p class="page-subtitle">Create a course with a clear description and image.</p>
            </div>
            <a class="button secondary" href="./index.php">All students</a>
        </header>

        <section class="panel form-panel">
            <form class="course-form" action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="course">Course name</label>
                    <input id="course" type="text" placeholder="Course name" name="course" required>
                </div>
                <div class="field">
                    <label for="description">Course description</label>
                    <textarea id="description" name="description" placeholder="Describe this course" rows="5" required></textarea>
                </div>
                <div class="field">
                    <label for="img">Course images</label>
                    <input id="img" type="file" accept="image/*" name="imgs[]" multiple>
                </div>
                <div class="form-actions">
                    <button type="submit" name="add_btn">Add course</button>
                    <a class="button secondary" href="./index.php">Cancel</a>
                </div>
            </form>
        </section>
        <?php include "footer.php" ?>
    </main>
</body>
</html>

<?php  

if(isset($_POST['add_btn'])){
    
    $c_name = $_POST['course'];
    if(empty($c_name)){
        array_push($error,"name is required");
    }
    $c_desc = $_POST['description'];
       if(empty($c_desc)){
        array_push($error,"name is required");
    }
    $insert_course =mysqli_query($con,"insert into course(name,description) vaues($c_name,$c_desc) ") ;

    $select_course = mysqli_fetch_assoc(mysqli_query($con,"select LAST_INSERT_ID() AS id"));
    $course_id = $select_course['id'];
    
    $target_dir = "uploads/courses";
    foreach($_FILES['imgs']['name'] as $x=>$img){
        // echo $x . " //// " .$img ."<br>";
       
    }
    
}