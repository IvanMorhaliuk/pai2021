<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/login.css">
    <link rel="stylesheet" href="/public/views/page-login-and-registration/css/adaptive.css">
    <title>login</title>
</head>
<body>
    <div class="wrapper">
        <canvas id="canvas"></canvas>

        <div class="login-page">

            <?php include_once __DIR__ . "/../../shared/components/logo/html/logo.html" ?>



            <div class="form login-page__form">
                <form action="login" method="post">
                    <fieldset class="form__inputs">
                        <legend>Login</legend>
                        <div class="form__input-wrapper">
                            <input type="email" name="email" id="login" placeholder="email" required>
                        </div>
                        <!-- /.form-input-wrapper -->
                        <div class="form__input-wrapper">
                            <input type="password" name="password" id="password" placeholder="password" required>
                        </div>
                        <!-- /.form-input-wrapper -->
                    </fieldset>
                    <a href="#" class="form__link">forgot your password?</a>
                    <fieldset class="form__controls">
                        <a class="form__button form__button-o" href="<?= "register" ?>">Register</a>
                        <button class="form__button" type="submit">Sign in</button>
                    </fieldset>
                    <div class="messages_tmp">
                        <?php if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <!-- /.messages_tmp -->
                </form>
            </div>
            <!-- /.login-page__form -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->

    <script src="/public/views/page-login-and-registration/scripts/bganim.js"></script>
</body>
</html>