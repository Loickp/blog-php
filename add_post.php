<?php
    include('config/db_connect.php');

    $name = $content = $user_name = '';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $date = date('Y-m-d-H-i-s');
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        // create sql
        $sql = "INSERT INTO posts(title, date_posted, user_id, content) VALUES('$name', '$date', '$user_name', '$content')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }

    // Temporary query for users
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new post</title>
    <script src="https://cdn.tiny.cloud/1/xv9vpz4nfgsdb1t0b9nk5j0g41zvtsfqdz272o0a7v4087df/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({ selector: '#mytextarea' });</script>
</head>
<body>
    <?php include('templates/header.php'); ?>

    <div class="container">
        <div class="header">
            <h2>Add new post</h2>
        </div>

        <form action="add_post.php" method="post">
            <div class="form-group row">
                <div class="col-6">
                    <input type="text" class="form-control" name="name" placeholder="Enter title here">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <select class="form-control" name="user_name">
                        <?php foreach($users as $user): ?>
                            <option value="<?php echo $user['user_id'] ?>"><?php echo $user['user_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="mytextarea" rows="30" name="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</body>
</html>