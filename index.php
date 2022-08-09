<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel ="stylesheet" href ="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OnlyOnePhoto</title>
    <style>
        @font-face {
            font-family: Rosario;
            src: url(fonts/Rosario/Rosario-Italic.ttf)
        }
    </style>
</head>
<!--<script>-->
<!--    function ShowForm(elId) {-->
<!--        var modalAll = document.getElementById(elId);-->
<!--        modalAll.style.display = "flex";-->
<!--    }-->
<!--    function HideForm(ell) {-->
<!--        document.getElementById(ell).style.display = "none";-->
<!--    }-->
<!--</script>-->
<body>
<div class="wrapper">
    <div class="content">
        <div class="hi">
            <div class="container">
                <div class="block_row">
                    <h1 class="text-head">OnlyOnePhoto</h1>
                    <?php
                        error_reporting(E_ERROR | E_PARSE);
                        if($_COOKIE['user'] ==''):
                    ?>
                    <button type="button" onclick="window.location.href='registration_form.php'" class="button_reg">Регистрация</button>
                    <button class="button_log" onclick="window.location.href='login_form.php'">Войти</button>
                     <?php else: ?>
                        <p>Привет <?=$_COOKIE['user']?></p>
                            <button type="button" onclick="window.location.href='exit.php'" class="button_reg">Выйти</button>
                     <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        if($_COOKIE['user'] ==''):
    ?>
    <div class="container_body">
        <div class="container">
        <?php else: ?>
            <div class="image_row">
                <image class="image"></image>
                <form enctype="multipart/form-data" method="post">
                    <p><input type="file" name="photo" multiple accept="image/*">
                        <input type="submit" value="Отправить"></p>
                </form>
            </div>
        </div>
        <?php endif;?>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer_row">
                <div class="footer_text">&copy Все права защищены OnlyOnePhoto  2030</div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>