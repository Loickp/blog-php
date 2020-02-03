<?php
    include('config/db_connect.php');
    session_start();

    $userid = $_SESSION['user_id'];
    
    // Article query
    $post_sql = "SELECT * FROM posts WHERE user_id = '$userid'";
    $post_result = mysqli_query($conn, $post_sql);
    $posts = mysqli_fetch_all($post_result, MYSQLI_ASSOC);

    // Table count
    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<body>
    <?php include('../templates/header.php'); ?>
    
    <?php if(isset($_SESSION['username'])): ?>
        <?php if($user['admin'] == 1 || $user['redactor'] == 1): ?>
            <div class="container">
                <div class="header">
                    <h1>My posts</h1>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                            <tr>
                                <th scope="row">
                                    <?php
                                        $i++;
                                        echo $i;
                                    ?>
                                </th>
                                <td><a href=""><?php echo $post['title']; ?></a></td>
                                <td>
                                    <a type="button" class="btn btn-success" href="post_detail.php?id=<?php echo $post['post_id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h1>Error</h1>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>