<?php
    include('config/db_connect.php');

    $upload_error = array('type' => '', 'size' => '');

    if(isset($_POST['upload'])){
        // Init the file
        $target_dir = "upload/";
        $target_file = $target_dir . $_FILES["image"]["name"];
        $img_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check format of file
        if($img_type != 'jpg' && $img_type != 'jpeg' && $img_type != 'png') {
            $upload_error['type'] = 'Format not accepted';
        }

        // Check the size
        if ($_FILES["image"]["size"] > 2000000) {
            $upload_error['size'] = 'Your file is too large.';
        }

        if(array_filter($upload_error)){
			//echo 'errors in form';
		}  else {
            //$image = $_FILES['image']['name']
           // $sql = "INSERT INTO posts (image) VALUES ('$image')";
            //mysqli_query($conn, $sql);

            // Move into folder : upload
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
                echo 'Image uploaded !';
            } else {
                echo 'Upload problem';
            }
        }
    }
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="submit" name="upload" value="Upload"></input>
        <div class="red-text"><?php echo $upload_error['type']; ?></div>
        <div class="red-text"><?php echo $upload_error['size']; ?></div>
    </form>
</body>
</html>
-->