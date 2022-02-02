<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-settings/css/settings.css">
    <title>Settings</title>
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

<section class="settings">
    <div class="container">
        <h1>Settings</h1>
        <div class="settings-buttons">
            <button class="settings__button"><i class="icon">
                    <img src="/public/img/icons/edit.svg" alt=""></i>Edit profile
            </button>
            <button class="settings__button"><i class="icon">
                    <img src="/public/img/icons/change.svg" alt="">
                </i>Change layout</button>
            <button class="settings__button"><i class="icon">
                    <img src="/public/img/icons/help.svg" alt="">
                </i>Help</button>
            <button class="settings__button"><i class="icon">
                    <img src="/public/img/icons/about.svg" alt="">
                </i>About Daily repo</button>
            <button class="settings__button"><i class="icon">
                    <img src="/public/img/icons/delete-profile.svg" alt="">
                </i>Delete profile</button>
        </div>
        <!-- /.settings-buttons -->
    </div>
    <!-- /.container -->
</section>

<script src="/public/views/page-settings/scripts/settings.js"></script>
</body>
</html>