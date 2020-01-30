<?php
    include('../config/db_connect.php');
    session_start();

    if(isset($_SESSION['username'])) {
        $user_name = $_SESSION['username'];
        $u_sql = "SELECT * FROM users WHERE user_name = '$user_name'";
        $u_result = mysqli_query($conn, $u_sql);
        $user = mysqli_fetch_assoc($u_result);
    }

    // Article query
    $post_sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id ORDER BY post_id DESC';
    $post_result = mysqli_query($conn, $post_sql);
    $posts = mysqli_fetch_all($post_result, MYSQLI_ASSOC);

    // Table count
    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <?php include('../templates/header.php'); ?>

    <?php if(isset($_SESSION['username'])): ?>
        <?php if($user['admin'] == 1): ?>
            <div class="container">
            <div class="header">
                <h1>All posts</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publisher</th>
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
                            <td><a href=""><?php echo $post['user_name']; ?></a></td>
                            <td>
                                <a type="button" class="btn btn-success" href="post_detail.php?id=<?php echo $post['post_id'] ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        <?php else: ?>
            <h1>You are not admin !</h1>
        <?php endif; ?>
     <?php endif; ?>
</body>
</html>