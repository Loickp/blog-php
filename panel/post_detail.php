<?php
    include('config/db_connect.php');
    session_start();

    $userid = $_SESSION['user_id'];
    $upload_error = array('type' => '', 'size' => '');

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

        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            // Image upload 
            $target_dir = "../upload/";
            $target_file = $target_dir . $_FILES["image"]["name"];
            $img_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check format of file
            if($img_type != 'jpg' && $img_type != 'jpeg' && $img_type != 'png') {
                $upload_error['type'] = 'Format not accepted';
                print_r($upload_error['type']);
            }

            // Check the size
            if ($_FILES["image"]["size"] > 2000000) {
                $upload_error['size'] = 'Your file is too large.';
                print_r($upload_error['size']);
            }
        }

        if(array_filter($upload_error)){
            //echo 'errors in form';
		}  else {
            //$image = $_FILES['image']['name'];
            $fileInfo = pathinfo($_FILES["image"]["name"]);
            $image = uniqid() . '.' . $fileInfo['extension'];
            $image_path = $target_dir . $image;

            if(empty($image)) {
                // edit sql
                $edit_sql = "UPDATE posts SET title = '$title', content = '$content' WHERE post_id = $id";
            } else {
                // edit sql
                $edit_sql = "UPDATE posts SET title = '$title', image_dir = '$image', content = '$content' WHERE post_id = $id";
            }

            if (mysqli_query($conn, $edit_sql)) {
                // Move into folder : upload
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                header('Location: panel.php');
            } else {
                echo "Error: " . $edit_sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    
    // Delete post query
    if(isset($_POST['delete'])){
        $delete_sql = "DELETE FROM posts WHERE post_id = $id";

        if(mysqli_query($conn, $delete_sql)){
			header('Location: panel.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
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
        <?php if($user['admin'] == 1 || $user['redactor'] == 1): ?>
            <?php if($post['user_id'] == $userid): ?>
                <div class="container">
                    <div class="header">
                        <h1>Edit post</h1>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-6">
                                <input type="text" id="#editor" class="form-control" name="title" value="<?php echo $post['title']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="20"><?php echo $post['content']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <a href="panel.php" class="btn btn-secondary">Close</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete</button>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <h1>Is not your post !</h1>
            <?php endif; ?>
        <?php else: ?>
            <h1>Error</h1>
        <?php endif; ?>
     <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete this post</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this post ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form method="post">
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>