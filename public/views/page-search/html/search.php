<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-search/css/search.css">
    <title>Search</title>
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
<section class="search">
    <div class="container search-container">
        <h1>Search</h1>
        <div class="search-bar-wrapper">
            <?php include __DIR__ . "/../../shared/components/search-bar/html/search-bar.php" ?>
        </div>
        <!-- /.search-bar-wrapper -->


        <?php include __DIR__ . "/../../shared/components/diariesList/html/diariesList.php" ?>
    </div>
    <!-- /.container search-container -->

</section>

<?php include __DIR__ . "/../../shared/components/overlay/html/overlay.php" ?>

<script type="module" src="/public/views/page-search/scripts/search.js"></script>
</body>
</html>