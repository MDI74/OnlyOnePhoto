<?php
    session_start();
    function redirect($location){
        header("Location: $location");
    }

    unset($_SESSION['error_login']);

    $user_name = htmlspecialchars(trim($_POST['username']));
    $email= htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $password = hash('gost',$password.'Uewqfjnsd23rf');

    $mysql = new mysqli('localhost', 'root', 'root', 'onlyonephoto');
    $mysql->query("SET NAMES 'utf8'");

    $result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$user_name' AND `email` = '$email' AND `password` = '$password'");

    $user = $result->fetch_assoc();
     if(count($user) == 0 ){
        $_SESSION['error_login'] = "Такой пользователь не найден";
        redirect('login_form.php');
    }

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close();
    redirect('index.php');