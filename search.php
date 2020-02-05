<?php
    include('config/db_connect.php');
    session_start();
    
    if(isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);

        // Search post query
        //$search_sql = "SELECT * FROM posts WHERE (title LIKE '%$search%') OR (content LIKE '%$search%')";
        $search_sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE (title LIKE '%$search%') OR (content LIKE '%$search%') ORDER BY post_id DESC";
        $search_result = mysqli_query($conn, $search_sql);
        $posts = mysqli_fetch_all($search_result, MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <?php include('templates/header.php'); ?>

    <div class="container">
        <div class="header">
            <h2>Your search : '<?php echo $search ?>'</h2>
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