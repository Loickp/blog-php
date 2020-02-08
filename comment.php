<?php
    include('config/db_connect.php');
    session_start();

    if(isset($_POST['com'])){
        $user = $_POST['user_name'];
        $post_id = $_POST['post_id'];
        $date = date('Y-m-d-H-i-s');
        $comment = $_POST['comment'];
    }

    // create sql
    $comm_sql = "INSERT INTO comments(user_id, post_id, date, content) VALUES('$user', '$post_id', '$date' ,'$comment')";

    if (mysqli_query($conn, $comm_sql)) {
        header('Location: article.php?id='.$post_id);
    } else {
        echo "Error: " . $comm_sql . "<br>" . mysqli_error($conn);
    }

?>