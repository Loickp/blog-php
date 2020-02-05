<?php
    $cat_sql = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $cat_sql);
    $cats = mysqli_fetch_all($cat_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <aside class="col-md-4 blog-sidebar">     
        <div class="card">
            <div class="card-body">
                <h4 class="font-italic">Search</h4>
                <div class="card-content">
                    <form class="form-inline" method="GET" action="search.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="font-italic">Categories</h4>
                <div class="card-content">
                    <ol class="list-unstyled">
                        <?php foreach($cats as $cat): ?>
                            <li><a href="category.php?id=<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card border-light">
            <div class="card-body">
                <h4 class="font-italic">Social Media</h4>
                <div class="card-content">
                    <ol class="list-unstyled">
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instragram</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </aside>
</body>
</html>