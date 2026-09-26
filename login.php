<?php
include "./conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <h1 >Admin Login</h1>
            </div>
            <a class="button secondary" href="./index.php" onclick="alert('You should login first to show student')">Back to home</a>
        </header>

        <section class="panel form-panel">
            <form class="student-form" action="" method="post">
                <div class="field">
                    <label for="name">Username</label>
                    <input id="name" type="text" name="name" placeholder="username" required>
                </div>

                <div class="field">
                    <label for="pass">Password</label>
                    <input id="pass" type="password" name="pass" placeholder="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="login">Login</button>
                    <button type="button" name="reg"><a href="./register.php">Register</a></button>

                </div>
            </form>
        </section>
    </main>
</body>

</html>
<?php

if (isset($_POST['login'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($error, "Username is required");
    }

    $pass = $_POST['pass'];
    if (empty($pass)) {
        array_push($error, "Password is required");
    }

    $check_name  = "select * from admin where name='$name'";

    $run = mysqli_query($con, $check_name);
    $rows = mysqli_num_rows($run);

    $data = mysqli_fetch_assoc($run);


    if (empty($error) && $rows == 1 && password_verify($pass,$data['password'])) {
        $_SESSION['name'] = $name;
        header("location:index.php");
    }
}

?>