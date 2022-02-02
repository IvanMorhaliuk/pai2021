<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-statistics/css/statistics.css">
    <title>Statistics</title>
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

<section class="statistics">
    <div class="container">
        <h1>Statistics</h1>
        <img src="/public/img/activities.png" alt="stats">
        <div class="statistic-numbers">
            <div class="stat">
                <div class="label">
                    Given comments:
                </div>
                <!-- /.label -->
                <div class="value">33</div>
                <!-- /.value -->
            </div>
            <!-- /.given-comments -->
            <div class="stat">
                <div class="label">
                    Given likes:
                </div>
                <!-- /.label -->
                <div class="value">126</div>
                <!-- /.value -->
            </div>
            <!-- /.given-likes -->
            <div class="stat">
                <div class="label">
                    Received comments:
                </div>
                <!-- /.label -->
                <div class="value">14</div>
                <!-- /.value -->
            </div>
            <!-- /.received-comments -->
            <div class="stat">
                <div class="label">
                    Received comments:
                </div>
                <!-- /.label -->
                <div class="value">11</div>
                <!-- /.value -->
            </div>
            <!-- /.received-likes -->
            <div class="stat">
                <div class="label">
                    Time on daily repo:
                </div>
                <!-- /.label -->
                <div class="value">245h</div>
                <!-- /.value -->
            </div>
            <!-- /.time-on-site -->
        </div>
        <!-- /.statistic-numbers -->
    </div>
</section>

<script src="/public/views/page-statistics/scripts/statistics.js"></script>
</body>
</html>
