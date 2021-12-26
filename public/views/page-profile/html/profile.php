<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-profile/css/profile.css">
    <title>Profile</title>
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

    <section class="account">
        <div class="container account-container">
            <h1>Account</h1>
            <div class="account__profile">
                <div class="avatar"><img src="/public/img/avatar.png" alt="avatar"></div>
                <!-- /.avatar -->
                <div class="nickname">john_artdaily</div>
                <div class="personal-info">
                    <div class="key">Name</div>
                    <!-- /.key -->
                    <div class="value">John</div>
                    <!-- /.value -->
                    <div class="key">Surname</div>
                    <!-- /.key -->
                    <div class="value">Simple</div>
                    <!-- /.value -->
                    <div class="key">Date Of birth</div>
                    <!-- /.key -->
                    <div class="value">24/10/1994</div>
                    <!-- /.value -->
                    <div class="key">City</div>
                    <!-- /.key -->
                    <div class="value">London</div>
                    <!-- /.value -->
                    <div class="key">Country</div>
                    <!-- /.key -->
                    <div class="value">United Kingdom</div>
                    <!-- /.value -->
                    <div class="key">Hobbies</div>
                    <!-- /.key -->
                    <div class="value">reading, music, art</div>
                    <!-- /.value -->
                    <div class="key">Links</div>
                    <!-- /.key -->
                    <div class="value">
                        <a href="#">https:twitter.com/john_art</a>
                    </div>
                    <!-- /.value -->
                </div>
                <!-- /.personal-info -->
                <div class="links">
                    <a href="#">Followers</a>
                    <a href="#">Subscriptions</a>
                </div>
                <!-- /.links -->
            </div>
            <!-- /.profile -->


        </div>
        <!-- /.container -->
    </section>


    <section class="about">
        <div class="container">
            <h2>About me</h2>
            <p class="general-desc">Molestie tincidunt pellentesque quis bibendum ut mollis turpis magna mauris. Cras sed nisl eget cras tincidunt. Urna, luctus a turpis sit elementum.</p>
        </div>
        <!-- /.container -->
    </section>

    <section class="diaries">
        <div class="container">
            <div class="diaries__header">
                <h2>My diaries</h2>
                <div class="diaries__view">
                    <button id="list-view">
                        <img src="/public/img/icons/icon-list-view_inactive.svg" alt="list view button" id="list-view-img">
                    </button>
                    <button id="grid-view">
                        <img src="/public/img/icons/icon-grid-view.svg" alt="grid view button" id="grid-view-img">
                    </button>
                </div>
                <!-- /.diaries__view -->
            </div>
            <!-- /.diaries__header -->

            <div class="books" id="books">
                <div class="books__item">
                    <img src="/public/img/bookitem.png" alt="book cover">
                    <div class="item-info">
                        <p class="item-caption">Title 1</p>
                        <p class="item-desc">smth</p>
                        <p class="item-date">10/12/2005</p>
                    </div>
                    <!-- /.item-info -->
                </div>
                <!-- /.books__item -->
                <div class="books__item">
                    <img src="/public/img/bookitem.png" alt="book cover">
                    <div class="item-info">
                        <p class="item-caption">Title 1</p>
                        <p class="item-desc">smth</p>
                        <p class="item-date">10/12/2005</p>
                    </div>
                    <!-- /.item-info -->
                </div>
                <!-- /.books__item -->
                <div class="books__item">
                    <img src="/public/img/bookitem.png" alt="book cover">
                    <div class="item-info">
                        <p class="item-caption">Title 1</p>
                        <p class="item-desc">smth</p>
                        <p class="item-date">10/12/2005</p>
                    </div>
                    <!-- /.item-info -->
                </div>
                <!-- /.books__item -->
                <div class="books__item">
                    <img src="/public/img/bookitem.png" alt="book cover">
                    <div class="item-info">
                        <p class="item-caption">Title 1</p>
                        <p class="item-desc">smth</p>
                        <p class="item-date">10/12/2005</p>
                    </div>
                    <!-- /.item-info -->
                </div>
                <!-- /.books__item -->
            </div>
            <!-- /.books-grid -->
        </div>
        <!-- /.container -->
    </section>

    <section class="activity">
        <div class="container">
            <h2>Activity</h2>
            <img src="/public/img/graphic.jpg" alt="schedule">
        </div>
        <!-- /.container -->
    </section>

    <script src="/public/views/shared/components/header/scripts/menu.js"></script>
    <script src="/public/views/page-profile/scripts/toggle-view.js"></script>
</body>
</html>