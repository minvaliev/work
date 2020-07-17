<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'academy';   // Имя базы данных
header("Content-Type: text/html; charset=utf-8");
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
mysqli_query( $link, "SET NAMES utf8" );