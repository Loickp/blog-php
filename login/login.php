<?php
    include('config/db_connect.php');
    session_start();

    $login_error = 0;

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passw = md5($password);

        $log_sql = "SELECT user_id, user_name, password FROM users WHERE user_name='$username' AND password='$passw'";
        $result = mysqli_query($conn, $log_sql);
        $u = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $u['user_id'];
            $_SESSION['success'] = "You are now logged in";
            header('location: /blog/index.php');
        } else {
            $login_error = 1;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php include('../templates/header.php'); ?>
    <div class="container">
        <?php if($login_error == 1): ?>
            <div class="alert alert-danger alert-box" role="alert">
                <?php 
                    echo "Wrong username or password !";
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <h1 class="text-center" id="title">Login</h1>

        <form action="login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>