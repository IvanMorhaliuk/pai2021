<?php if (!isset($user)) {
    echo "You have no rights!";
    die();
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-shelf/css/shelf.css">
    <title>Shelf</title>
</head>
<body>
<header>
    <div class="container">
        <?php include __DIR__ . "/../../shared/components/header/html/header.php" ?>
    </div>
    <!-- /.container -->
</header>
<nav>
    <?php include __DIR__ . "/../../shared/components/nav/html/nav.php" ?>
</nav>

<!--<div class="in-cards" contenteditable="true">

</div>-->
<section class="bookshelves">
    <div class="container">
        <h1>My diaries</h1>

        <h2>Private</h2>
        <div class="private-diaries diaries">
            <?php include __DIR__ . "/../../shared/components/bookshelf/html/bookshelf.php" ?>
            <a href="#" class="more">More...</a>
        </div>
        <!-- /.private-diaries -->

        <h2>Public</h2>
        <div class="public-diaries diaries">
            <?php include __DIR__ . "/../../shared/components/bookshelf/html/bookshelf.php" ?>
            <a href="#" class="more">More...</a>
        </div>
        <!-- /.public-diaries -->

        <h2>Other</h2>
        <div class="other-diaries diaries">
            <?php include __DIR__ . "/../../shared/components/bookshelf/html/bookshelf.php" ?>
            <a href="#" class="more">More...</a>
        </div>
        <!-- /.other-diaries -->

    </div>
    <!-- /.container -->
</section>


<script src="/public/views/page-shelf/scripts/shelf.js"></script>
</body>
</html>