<?php
include("config.php");
//Соединение с MySQL
$link=mysqli_connect($host, $logname, $password)
or die ("Не могу соединиться с MYSQL");
//Выбор БД
mysqli_select_db ($link,$database)
or die ("Не могу выбрать базу данных");
?>