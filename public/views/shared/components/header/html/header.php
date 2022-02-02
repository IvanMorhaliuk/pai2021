<div class="header">
    <?php include_once __DIR__ . "/../../logo/html/logo.html" ?>
    <?php include __DIR__ . "/../../search-bar/html/search-bar.php" ?>
    <a class="notifications" href="#"><img src="/public/img/icons/notification-false.svg" alt="there are notifications"></a>
    <div class="person">
        <img class="person__avatar" src="/public/img/header/avatars/avatar-placeholder.png" alt="avatar">
        <!-- /.avatar -->
        <div class="person__name"></div>
        <!-- /.name -->
        <div class="menu">
            <div class="arrow down" id="menu_show"></div>
            <div class="dropdown menu__dropdown" id="dropdown">
                <a class="dropdown__elem" href="#">Profile</a>
                <a class="dropdown__elem" href="#">Edit profile</a>
                <a class="dropdown__elem" href="/logout">Log out</a>
                <button class="close dropdown__close" id="dropdown_close"></button>
            </div>
            <!-- /.dropdown -->
        </div>
        <!-- /.menu -->
    </div>
    <!-- /.header-person -->
</div>
<!-- /.header -->