<?php
    include('config/db_connect.php');
    session_start();

	// check GET request id param
	if(isset($_GET['id'])){
        
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// Post query
		$sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE post_id = $id";
		$result = mysqli_query($conn, $sql);
        $post = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('templates/header.php'); ?>

    <?php if($post): ?>
        <div class="container">
            <div class="header">
                <h2><?php echo $post['title'] ?></h2>
                <p>by <a href=""><?php echo $post['user_name'] ?></a></p>
                <hr>
                <p><?php echo date("F j, Y", strtotime($post['date_posted'])) ?></p>
            </div>
        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="header-article">
                        <img src="upload/<?php echo $post['image_dir'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="article-content">
                        <p>
                            <?php echo $post['content'] ?>
                        </p>
                    </div>
                    <div class="comment">
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Leave comment</h5>
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" rows="4"></textarea>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('templates/sidebar.php'); ?>
            </div>
        </main>
    <?php endif ?>
</body>
</html>