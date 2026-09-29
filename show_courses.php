<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show courses</title>
    <link rel="stylesheet" href="./styles.css" >
</head>

<body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Course catalog</p>
                <h1>All courses</h1>
                <p class="page-subtitle">Browse course details and images.</p>
            </div>
            <nav class="form-actions" aria-label="Course actions">
                <a class="button" href="./addcourse.php">+ Add Course</a>
                <a class="button secondary" href="./index.php">All Students</a>
            </nav>
        </header>

        <section class="course-grid" aria-label="Courses">
            <?php
            $show = "select * from course";
            $run = mysqli_query($con, $show);

            if (mysqli_num_rows($run) === 0):
            ?>
                <p class="panel empty-state">No courses have been added yet.</p>
            <?php
            else:
                foreach ($run as $x):
            ?>
                    <article class="course-card panel">
                        <div class="course-card-heading">
                            <span class="course-id">Course <?php echo $x['id']; ?></span>
                            <h2><?php echo $x['name']; ?></h2>
                        </div>
                        <p class="course-description"><?php echo $x['description']; ?></p>
                        <div class="course-images" aria-label="Course images">
                            <?php
                            $show_imgs = "select * from course_imgs where course_id='$x[id]'";
                            $run_img = mysqli_query($con, $show_imgs);

                            foreach ($run_img as $y):
                            ?>
                                <img src="<?php echo $y['image']; ?>" alt="<?php echo $x['name']; ?>">
                            <?php endforeach; ?>
                        </div>
                    </article>
            <?php
                endforeach;
            endif;
            ?>
        </section>
        <?php include "footer.php"; ?>
    </main>
</body>

</html>