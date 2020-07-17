<?php
    session_start();
    ini_set('session.gc.maxlifetime', 3600);
    $connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '' );
    $login = $connection->query("SELECT * FROM `admin`");

    if ($_POST['login']) {
        foreach ($login as $admins) {
            if ($_POST['login'] == $admins['login'] && $_POST['password'] == $admins['password']) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['color'] = $_POST['colour'];
                header("Location: content.php");
            }
        }
        echo "Неверный логин или пароль!";
    }


    foreach ($login as $admins) {
        if ($_SESSION['login'] == $admins['login'] && $_SESSION['password'] == $admins['password']) {
            header("Location: content.php");
        }
    }



    if ($_POST['but']) {
        header("Location: registr.php");
    }

?>

<style>
    body {
        margin: 200px 300px;
        background-color: darkorange;
    }
    input, p {
        font-size: 30px;
        margin: 10px;
    }
</style>

<form method="POST">
    <p>Авторизируйтесь пожалуйста!</p>
    <input type="text" name="login" required placeholder="Введите логин" > <br>
    <input type="password" name="password" required placeholder="Введите пароль"> <br>
    <select  name="colour" style="font-size: 30px; margin: 10px; ">
        <option selected style="display:none; " value="Не выбран цвет"  >Выберите нужный цвет</option>
        <option style="background-color:#cccccc" value="#cccccc">Серый</option>
        <option style="background-color:#ffff00" value="#ffff00">Желтый</option>
        <option style="background-color:#ff0000" value="#ff0000">Красный</option>
        <option style="background-color:#8099E8" value="#8099E8">Голубой</option>
    </select> <br>
    <input type="submit">
</form>

<form method="POST" style=" font-size: 40px; padding-top: 50px;">
    <p style="font-size: 18px;">Если вы не зарегистрированы на сайте, то перейдите на страницу регистрации:</p>
    <input type="submit" style="font-size: 30px;" name="but" value="Перейти на странницу регистрации" >
</form>
