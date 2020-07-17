<?php
session_start();
include "config.php";

if (!$_SESSION['login'] || !$_SESSION['password']) {
    header("Location: index.php");
    die();
}

if ($_POST['unlogin']) {
    session_destroy();
    header("Location: index.php");
}

$login = $_SESSION['login'];

if ($_SESSION['login']) {
     $query_order = mysqli_query( $link, "SELECT * FROM `admin` WHERE login = '$login'" );
     $order = mysqli_fetch_assoc( $query_order );
     $fullName = $order['full_name'];
     $password = $order['password'];
     $login = $order['login'];
     $email = $order['email'];
}

if ($_POST['full_name'] && $_POST['password'] ) {
    $fullNamePost = $_POST['full_name'];
    $passwordPost = $_POST['password'];
    $query_orders = mysqli_query( $link, "UPDATE `admin` SET full_name = '$fullNamePost', password = $passwordPost WHERE login = '$login'" );
    header("Location: content.php");
}

?>
<style>
    body {
        margin: 10px 300px;
        background-color: chartreuse;
    }
    input, p {
        font-size: 30px;
        margin: 10px;
    }
    .label {
        width: 80px;
        display: inline-block;
        font-size: 26px;
        margin-left: 10px;
    }
</style>

<body style="font-size: 40px; background-color: <?php echo $_SESSION['color']?>;">
<p>Сайт только для авторизированных пользователей!</p>
<?php echo "Привет, " . $_SESSION['login'] . "<br>" ?>
<img src="priroda.jpg" alt="Picture" width="700" style="display: block">

<form method="POST">
    <p>Ваши личные данные</p>
    <label class="label">ФИО</label>
    <input type="text" value="<?echo $fullName?>" name="full_name" required> <br>
    <label class="label">Пароль</label>
    <input type="text" value="<?echo $password?>" name="password" required> <br>
    <input type="submit" value="Изменить">
</form>

<form method="POST" style="font-size: 40px;">
    <input type="submit" style="font-size: 30px;" name="unlogin" value="На странницу авторизации" >
</form>
</body>