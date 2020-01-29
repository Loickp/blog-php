<?php
    include('config/db_connect.php'); 
    session_start();

    // Article query
    $post_sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id ORDER BY post_id DESC';
    $post_result = mysqli_query($conn, $post_sql);
    $posts = mysqli_fetch_all($post_result, MYSQLI_ASSOC);

    //mysqli_free_result($post_result);
    //mysqli_close($conn);
    
    if(isset($_SESSION['username'])) {
        $user_name = $_SESSION['username'];
        $u_sql = "SELECT * FROM users WHERE user_name = '$user_name'";
        $u_result = mysqli_query($conn, $u_sql);
        $user = mysqli_fetch_assoc($u_result);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('templates/header.php'); ?>

    <div class="container">
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-box" role="alert">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="header">
            <h2>Recent posts</h2>
        </div>
        <?php if(isset($_SESSION['username'])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif; ?>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <?php foreach($posts as $post): ?>
                    <div class="blog-post">
                        <div class="card">
                            <img src="img.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo date("F j, Y", strtotime($post['date_posted'])) ?> by <a href="#"><?php echo $post['user_name'] ?></a></h6>
                                <p class="card-text"><?php echo substr($post['content'], 0, 300) ?>..</p>
                                <a href="article.php?id=<?php echo $post['post_id'] ?>" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
            <?php include('templates/sidebar.php'); ?>
        </div>
      </main>

    <script>
        setTimeout(function() { 
            $(".alert").alert('close'); 
        }, 4000);
    </script>
</body>
</html>