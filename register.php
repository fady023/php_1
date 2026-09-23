<?php

include "./conn.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <main class="page-shell">
        <header class="page-header">
            <div>
                <p class="eyebrow">Admin access</p>
                <h1>Create account</h1>
                <p class="page-subtitle">Set up a new admin account to manage the student directory.</p>
            </div>
            <a class="button secondary" href="./index.php">Back to home</a>
        </header>

        <section class="panel form-panel">
            <?php if (!empty($error)) : ?>
                <div class="notice">
                    <?php foreach ($error as $err) : ?>
                        <div><?php echo $err; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="student-form" action="" method="post">
                <div class="field">
                    <label for="name">Username</label>
                    <input id="name" type="text" name="name" placeholder="username" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : ''; ?>" required>
                </div>

                <div class="field">
                    <label for="pass">Password</label>
                    <input id="pass" type="password" name="pass" placeholder="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="sub">Register</button>
                    <a class="button secondary" href="./index.php">Cancel</a><br>
                    <a class="x" href="./login.php">Already have account ?</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>

<?php

if (isset($_POST['sub'])) {

    $user = $_POST['name'];
    if (empty($user)) {
        array_push($error, "username is empty");
    }
    $pass = $_POST['pass'];

    if (empty($pass)) {
        array_push($error, "password is empty");
    } else {
        $pass = password_hash($pass, PASSWORD_BCRYPT);
    }

    if (empty($error)) {
        $sql = "insert into admin(name,password) values('$user','$pass')";
        $run_sql = mysqli_query($con, $sql);

        if ($run_sql) {

        $_SESSION['name'] = $user;
        $_SESSION['pass'] = $pass;

            header("location:index.php");

        }
    }
}

?>