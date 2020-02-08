<?php
    include('../config/db_connect.php');
    session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $user_sql = "SELECT * FROM users WHERE user_id = '$id'";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php include('../templates/header.php'); ?>
</body>
</html>