<?php
session_start();
include("fun.php");
include("connect.php");
include("add.php");
include("show.php");
mysqli_close($link);
?>
<form method="POST" action="">
    <textarea rows="4" name="txt" cols="20"></textarea><br>
    <input type="text" name="nik" size="20"><br>
    <input type="submit" value="Отправить" >
    <input type="reset" value="Сброс" >
    </form>
    <A href="<?php echo $_SERVER['PHP_SELF'];?>">Обновить</a>