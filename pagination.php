<?php
    include('config/db_connect.php');

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Pagination</title>
</head>
<body>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</body>
</html>