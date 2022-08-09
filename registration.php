<?php
    session_start();
    function redirect($location){
        header("Location: $location");
    }

    unset($_SESSION['username']);
    unset($_SESSION['password']);

    unset($_SESSION['error_username']);
    unset($_SESSION['error_password']);


    $user_name = htmlspecialchars(trim($_POST['username']));
    $email= htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $password_2 = htmlspecialchars(trim($_POST['password_2']));


    if (strlen($user_name) < 5 || strlen($user_name) > 50 ){
        $_SESSION['error_username'] = "Недопустимая длина логина";
        redirect('registration_form.php');
    }
    else if (strlen($password) <= 7){
        $_SESSION['error_password'] = "Пароль должен содержать как минимум 8 символов";
        redirect('registration_form.php');
    }
    else if ($password != $password_2){
        $_SESSION['error_password'] = "Пароль не совпадает";
        redirect('registration_form.php');
    }
    else {
        $mysql = new mysqli('localhost', 'root', 'root', 'onlyonephoto');
        $mysql->query("SET NAMES 'utf8'");

        $password = hash('gost',$password.'Uewqfjnsd23rf');


        $mysql->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES('$user_name', '$email', '$password')");

        //$result = $mysql->query("SELECT * FROM `users`");
        //print_r($result);
        $mysql->close();
        redirect('index.php');
    }

