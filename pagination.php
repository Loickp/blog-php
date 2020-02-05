<?php
    include('config/db_connect.php');
    session_start();

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $nb_per_page = 1;
    $offset = ($page-1) * $nb_per_page;


    $total_pages_sql = "SELECT COUNT(*) FROM posts";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $nb_per_page);

    $sql = "SELECT * FROM posts LIMIT $offset, $nb_per_page";
    $res_data = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($res_data, MYSQLI_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination test</title>
</head>
<body>
    <?php include('templates/header.php'); ?>

    <?php foreach($posts as $post): ?>
        <p><?php echo $post['title'] ?></p>
    <?php endforeach; ?>

    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endfor; ?>
    </ul>
</body>
</html>