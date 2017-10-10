<?php
require 'conf.php';
session_start();
$error = "";
if (isset($_POST['submit'])) {
    if ($_POST['login'] == USER and $_POST['password'] == PASSWORD) {
        $_SESSION['user'] = $_POST['login'];
        var_dump("ff");
        header('Location: board.php');
    } else {
        $error = "Введены неверные данные!!!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SmartHome</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link  href="style.css" rel="stylesheet">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <div class ="row">
                <div class ="well span4 offset4">
                    <legend>Авторизация</legend>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-error">
                            <?php echo $error; ?>
                            <a class="close" href="#" data-dismiss="alert">x</a>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" accept-charset="UTF-8">
                        <input type="text" class="span4" placeholder="Ваш логин" name="login">
                        <input type="password" class="span4" placeholder="Ваш пароль" name="password">
                        <button type="submit" name="submit" class="btn btn-block btn-success">Авторизоваться</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

