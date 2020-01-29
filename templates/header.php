<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/blog/index.php">Blog</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/blog/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <?php if(!isset($_SESSION['username'])) : ?>
                                <a class="dropdown-item" href="/blog/login/signup.php">Sign up</a>
                                <a class="dropdown-item" href="/blog/login/login.php">Login</a>
                            <?php endif ?>
                            <?php if(isset($_SESSION['username'])) : ?>
                                <a class="dropdown-item" href="#">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/blog/login/logout.php">Logout</a>
                            <?php endif ?>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['username'])): ?>
                        <?php if($user['admin'] == 1): ?>
                            <a class="btn btn-success" href="add_post.php">Add post</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>