<?php
    include('../config/db_connect.php');
    session_start();

    if(isset($_SESSION['username'])) {
        $user_name = $_SESSION['username'];
        $u_sql = "SELECT * FROM users WHERE user_name = '$user_name'";
        $u_result = mysqli_query($conn, $u_sql);
        $user = mysqli_fetch_assoc($u_result);

        $user_id = $user['user_id'];
    }

    // Post detail query
    if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM posts WHERE post_id = $id";
		$result = mysqli_query($conn, $sql);
		$post = mysqli_fetch_assoc($result);
    }
    
    // Edit post query
    if(isset($_POST['edit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $edit_sql = "UPDATE posts SET title = '$title', content = '$content' WHERE user_id = $user_id";

        if (mysqli_query($conn, $edit_sql)) {
            header('Location: dashboard.php');
        } else {
            echo "Error: " . $edit_sql . "<br>" . mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post detail</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('../templates/header.php'); ?>
    <?php if(isset($_SESSION['username'])): ?>
        <?php if($user['admin'] == 1): ?>
            <div class="container">
                <div class="header">
                    <h1>Edit post</h1>
                </div>
                <form action="post_detail.php" method="post">
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" id="#editor" class="form-control" name="title" value="<?php echo $post['title']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="20"><?php echo $post['content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <a href="dashboard.php" class="btn btn-secondary">Close</a>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <h1>You are not admin !</h1>
        <?php endif; ?>
     <?php endif; ?>
</body>
</html>