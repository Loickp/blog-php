<?php
    include('config/db_connect.php');
    session_start();

    // Number page 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $nb_per_page = 4;
    $offset = ($page-1) * $nb_per_page;


    // Calcul for number of page
    $total_pages_sql = "SELECT COUNT(*) FROM posts";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $nb_per_page);

    // Article query
    $post_sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id ORDER BY post_id DESC LIMIT $offset, $nb_per_page";
    $post_result = mysqli_query($conn, $post_sql);
    $posts = mysqli_fetch_all($post_result, MYSQLI_ASSOC);

    $cat_sql = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $cat_sql);
    $cats = mysqli_fetch_all($cat_result, MYSQLI_ASSOC);

    //mysqli_free_result($post_result);
    //mysqli_close($conn);

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

    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script>
        setTimeout(function() { 
            $(".alert").alert('close'); 
        }, 4000);
    </script>
</body>
</html>