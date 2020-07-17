<?php
    session_start();
    ini_set('session.gc.maxlifetime', 3600);
    $connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '' );
    $admin = $connection->query("SELECT * FROM `admin`");

    if ($_POST['full_name'] && $_POST['login'] && $_POST['password'] && $_POST['email']) {
        $userFullName = $_POST['full_name'];
        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];
        $userEmail = $_POST['email'];
        $connection->query("INSERT INTO `admin` (`full_name`, `login`, `password`, `email`) VALUES ('$userFullName', '$userLogin', '$userPassword', '$userEmail')");
        if ($connection == true) {
            session_destroy();
            header("Location: index.php");
        }
    }

    if ($_POST['aut']) {
        header("Location: index.php");
    }



?>

<style>
    body {
        margin: 200px 300px;
        background-color: chartreuse;
    }
    input, p {
        font-size: 30px;
        margin: 10px;
    }
</style>

<form method="POST">
    <p>Регистрация на сайте</p>
    <input type="text" name="full_name" required placeholder="Введите ФИО"> <br>
    <input type="text" name="login" required placeholder="Введите логин" > <br>
    <input type="password" name="password" required placeholder="Введите пароль"> <br>
    <input type="text" name="email" required placeholder="Введите email"> <br>
    <input type="submit" value="Зарегистрироваться">
</form>

<form method="POST" style=" font-size: 40px; margin-top: 50px;">
    <input type="submit" style="font-size: 30px;" name="aut" value="Перейти на странницу авторизации" >
</form>
