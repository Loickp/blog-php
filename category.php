<?php
    include('config/db_connect.php');
    session_start();

    // Category detail query
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

		$post_sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE category_id = '$id' ORDER BY post_id DESC";
        $post_result = mysqli_query($conn, $post_sql);
        $posts = mysqli_fetch_all($post_result, MYSQLI_ASSOC);
    }

    $cat_sql = "SELECT * FROM categories WHERE category_id = '$id'";
    $cat_result = mysqli_query($conn, $cat_sql);
    $cat = mysqli_fetch_assoc($cat_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $cat['category_name'] ?> category</title>
</head>
<body>
    <?php include('templates/header.php'); ?>
    
    <div class="container">
        <div class="header">
            <h2><?php echo $cat['category_name'] ?> category</h2>
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <?php foreach($posts as $post): ?>
                    <div class="blog-post">
                        <div class="card">
                            <img src="upload/<?php echo $post['image_dir'] ?>" class="card-img-top" alt="...">
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
</body>
</html>