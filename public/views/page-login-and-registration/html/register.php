<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/register.css">
    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/adaptive.css">

    <title>Register</title>
</head>
<body>
    <div class="wrapper">
        <canvas id="canvas"></canvas>
        <div class="register-page">

            <?php include_once __DIR__ . "/../../shared/components/logo/html/logo.html" ?>


            <div class="form register-page__form">
                <form action="/registeruser" method="post">
                    <fieldset class="form__inputs">
                        <legend>Create Profile</legend>
                        <div class="form__input-wrapper">
                            <input type="text" name="name" id="name" placeholder="name">
                        </div>
                        <!-- /.form-input-wrapper -->
                        <div class="form__input-wrapper">
                            <input type="text" name="surname" id="surname" placeholder="surname">
                        </div>
                        <!-- /.form-input-wrapper -->
                        <div class="form__input-wrapper">
                            <input type="date" name="birthday" id="dateOfBirth" placeholder="date of birth">
                        </div>
                        <!-- /.form-input-wrapper -->
                        <div class="form__input-wrapper">
                            <input type="email" name="email" id="login" placeholder="email">
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
    </div>
    <!-- /.wrapper -->




    <script src="/public/views/page-login-and-registration/scripts/bganim.js"></script>
    <script src="/public/views/page-login-and-registration/scripts/validation.js"></script>
</body>
</html>