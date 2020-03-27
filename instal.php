<?php
include("config.php");
//Соединение с MySQL
$link=mysqli_connect($host, $logname, $password)
or die ("Не могу соединиться с MYSQL:".mysqli_error(0));
//Cоздание БД
$result = mysqli_query ($link,"CREATE DATABASE `$database`;")
or die ("Не могу создать базу данных: " . mysqli_error(0));
//Выбор БД
mysqli_select_db ($link,$database)
or die ("Не могу выбрать базу данных:" . mysqli_error(0));
//Создание таблицы
$result = mysqli_query ($link,
    "CREATE TABLE `guestbook` (`text` text, `name` varchar(50));")
    or die ("Не могу создать таблицу:" . mysqli_error(0));
?>