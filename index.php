<?php
session_start();
$error = "";
if (isset($_POST['submit'])) {
    if ($_POST['login'] == USER and  $_POST['password'] == PASSWORD) {
        $_SESSION['user'] = $_POST['login'];
        
    } else {
        $error = "Wrong password";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>SmartHome</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
<style>
.well{
    margin-top: 240px
}
</style>
<meta charset="UTF-8">
        
    </head>
    <body>
        <div class="container">
<div class ="row">
<div class ="well span4 offset4">
<legend>Авторизация</legend>
<div class="alert alert-error">
<a class="close" href="#" data-dismiss="alert">x</a>Введены неверные данные!!!
</div>


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

