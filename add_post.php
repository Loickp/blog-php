<?php
    include('config/db_connect.php');
    session_start();
    
    $name = $content = $user_name = '';
    $upload_error = array('type' => '', 'size' => '');

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $date = date('Y-m-d-H-i-s');
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $category = intval($_POST['category']);

        // Image upload 
        $target_dir = "upload/";
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

        if(array_filter($upload_error)){
            //echo 'errors in form';
		}  else {
            $fileInfo = pathinfo($_FILES["image"]["name"]);
            $image = uniqid() . '.' . $fileInfo['extension'];
            $image_path = $target_dir . $image;

            // create sql
            $sql = "INSERT INTO posts(title, date_posted, user_id, image_dir, category_id, content) VALUES('$name', '$date', '$user_name', '$image', '$category', '$content')";

            if (mysqli_query($conn, $sql)) {
                // Move into folder : upload
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Categories query
    $cat_sql = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $cat_sql);
    $cats = mysqli_fetch_all($cat_result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new post</title>
</head>
<body>
    <?php include('templates/header.php'); ?>
    <?php include('upload.php'); ?>

    <div class="container">
        <div class="header">
            <h2>Add new post</h2>
        </div>

        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-6">
                    <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" placeholder="Enter title here" required>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="user_name" value="<?php echo $user['user_id']; ?>">
            </div>
            <div class="form-group">
                <input type="file" name="image" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="editor" rows="20" name="content" required><?php if(isset($_POST['content'])){ echo $_POST['content']; } ?></textarea>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        <?php foreach($cats as $cat): ?>
                            <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>    
</body>
</html>