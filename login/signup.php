<?php
    include('../config/db_connect.php');
    session_start();

    $signup_success = 0;

    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $passw = md5($password);

        // Users query
        $user_sql = "INSERT INTO users(user_name, email, password) VALUES ('$username', '$email', '$passw')";

        if(mysqli_query($conn, $user_sql)){
            // success
            $signup_success = 1;
        } else {
            echo 'query error: '. mysqli_error($conn);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
    <?php include('../templates/header.php'); ?>
    <div class="container">
        <?php if($signup_success == 1): ?>
            <div class="alert alert-success alert-box" role="alert">
                <?php 
                    echo "You are now sign up, you can login !";
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h1 class="text-center" id="title">Sign Up</h1>

        <form action="signup.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</body>
</html>