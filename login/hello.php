<?php
    include('config/db_connect.php');
    session_start();

    // Users query
    $user_name = $_SESSION['username'];
    $u_sql = "SELECT * FROM users WHERE user_name = '$user_name'";
    $u_result = mysqli_query($conn, $u_sql);
    $user = mysqli_fetch_assoc($u_result);
    print_r($user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center" id="title">Hello !</h1>
        <?php  if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif ?>
        <div class="text-center">
            <a type="button" class="btn btn-primary" href="login.php">Login</a>
            <a type="button" class="btn btn-primary" href="signup.php">Sign up</a>
        </div>
        <div class="text-center">
            <a type="button" class="btn btn-danger" href="logout.php">Logout</a>
        </div>
        
        <?php if(isset($_SESSION['username'])): ?>
            <?php echo $_SESSION['admin']; ?>
            <?php if($user['admin'] == 1): ?>
                <button class="btn btn-success">Add post</button>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>