<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/shared/css/reset.css">
    <link rel="stylesheet" href="/public/views/shared/css/normalize.css">
    <link rel="stylesheet" href="/public/views/shared/css/main.css">
    <link rel="stylesheet" href="/public/views/shared/components/logo/css/logo.css">
    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/common.css">
    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/register.css">
    <title>Register</title>
</head>
<body>
    <canvas id="canvas"></canvas>
    <div class="container register-page">

        <?php include_once __DIR__ . "/../../shared/components/logo/html/logo.html" ?>


        <div class="form register-page__form">
            <form action="#" method="post">
                <fieldset class="form__inputs">
                    <legend>Create Profile</legend>
                    <div class="form__input-wrapper">
                        <input type="text" name="login" id="name" placeholder="name">
                    </div>
                    <!-- /.form-input-wrapper -->
                    <div class="form__input-wrapper">
                        <input type="text" name="login" id="surname" placeholder="surname">
                    </div>
                    <!-- /.form-input-wrapper -->
                    <div class="form__input-wrapper">
                        <input type="date" name="login" id="dateOfBirth" placeholder="date of birth">
                    </div>
                    <!-- /.form-input-wrapper -->
                    <div class="form__input-wrapper">
                        <input type="email" name="login" id="login" placeholder="email">
                    </div>
                    <!-- /.form-input-wrapper -->
                    <div class="form__input-wrapper">
                        <input type="password" name="password" id="password" placeholder="create password">
                    </div>
                    <!-- /.form-input-wrapper -->
                </fieldset>
                <a href="#" class="form__link">forgot your password?</a>
                <fieldset class="form__controls">
                    <button type="submit" class="form__button form__button-o" href="#">Register</button>
                </fieldset>
            </form>
        </div>
        <!-- /.register-page__form -->

    </div>
    <!-- /.container register-page -->



    <script src="/public/views/page-login-and-registration/scripts/bganim.js"></script>
</body>
</html>