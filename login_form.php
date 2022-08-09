<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel ="stylesheet" href ="css/style.css">
</head>
<body>
<?php
session_start();
function output_error($key) {
    if(array_key_exists($key, $_SESSION))
        echo $_SESSION[$key];
    else
        return '';
}
?>
<div class="login">
    <div class="elem_log">
        <form action="login.php" method="post">
            <div><?=output_error('error_login')?></div><br>
            <input type="text" class="form-control" name="username" placeholder="Введите имя"><br>
            <input type="email" class="form-control" name="email" value="<?=output_error('email')?>"  placeholder="Введите email"><br>
            <input type="password" class="form-control" name="password"  placeholder="Введите пароль"><br>
            <button type="submit" class="button_form">Войти</button>
        </form>
    </div>
</div>
</body>
</html>
